<?php
/**
 * SSO claim mapping (3.5.0, proposed in PR #174) - the OIDC twin of LDAP's
 * analyst group, plus access that follows the identity provider.
 *
 * An OIDC sign-in carries CLAIMS about the person, one of which is usually their
 * groups or roles ("groups", "roles", Keycloak's "realm_access.roles"). Three
 * settings on an OIDC provider (System -> SSO) use it:
 *
 *   oidc_group_claim    which claim holds the groups (a dotted path is allowed)
 *   oidc_analyst_group  only someone in this group may sign in as an analyst -
 *                       exactly like ldap_analyst_group: an existing analyst who
 *                       has left it is refused, and nobody outside it is created
 *   oidc_access_rules   one rule per line, "group = grants", re-applied at EVERY
 *                       analyst sign-in so access follows the identity provider:
 *
 *       # comments and blank lines are ignored
 *       IT-Service-Desk = tickets, knowledge, tickets.manage
 *       IT-Everyone     = all-modules
 *       IT-Admins       = admin
 *
 *   A grant is a module key, a capability key (has a dot), "all-modules" or
 *   "admin". The right-hand side is split on the LAST "=", so a group name may
 *   contain one (an LDAP-style DN). Group names match ignoring case, like LDAP.
 *
 * What a sign-in with rules does (ssoApplyClaimAccess):
 *   - modules: every module a matching rule grants (all-modules wins);
 *   - capabilities: ONLY if some rule grants one - then they are exactly what
 *     the matching rules grant, held on the analyst's API-managed role (the SAME
 *     role PATCH /api/v1/analysts/{id}/access writes, so use one or the other);
 *   - admin: ONLY if some rule mentions "admin" at all - then matching an admin
 *     rule makes them one and not matching removes it. Rules that never mention
 *     admin leave the flag alone, so adding a modules rule cannot demote anybody.
 *     The last active administrator is never demoted (they keep it, logged).
 *   - companies and team grants are untouched (teams still add to modules).
 *
 * Nothing here runs unless a group claim is set, and every helper is pure apart
 * from the two that write, so tests/sso-claim-mapping.php can feed it claims.
 */

require_once __DIR__ . '/capabilities.php';

/** True once Database Verification has added the claim-mapping columns. */
function ssoClaimsReady(PDO $conn): bool
{
    static $ok = null;
    if ($ok !== null) return $ok;
    try { $conn->query("SELECT oidc_group_claim, oidc_analyst_group, oidc_access_rules, oidc_groups_last_seen FROM auth_providers LIMIT 0"); return $ok = true; }
    catch (Throwable $e) { return $ok = false; }
}

/**
 * The values of claim $path as a list of strings. A dotted path walks nested
 * objects ("realm_access.roles"). A JSON array gives its scalar members; a
 * single string gives itself. Works on the decoded ID token, whose nested parts
 * are stdClass, and on userinfo, whose are arrays.
 * @return string[]
 */
function ssoClaimValues(array $claims, string $path): array
{
    $path = trim($path);
    if ($path === '') return [];
    $node = json_decode(json_encode($claims), true);   // stdClass -> arrays, all the way down
    // An exact key first: some IdPs use claim names with dots in them (URLs).
    if (is_array($node) && array_key_exists($path, $node)) {
        $node = $node[$path];
    } else {
        foreach (explode('.', $path) as $part) {
            if (!is_array($node) || !array_key_exists($part, $node)) return [];
            $node = $node[$part];
        }
    }
    if (is_string($node) || is_int($node)) return [trim((string)$node)];
    if (!is_array($node)) return [];
    $out = [];
    foreach ($node as $v) {
        if (is_string($v) || is_int($v)) {
            $v = trim((string)$v);
            if ($v !== '') $out[] = $v;
        }
    }
    return array_values(array_unique($out));
}

/** Is $wanted among $groups? Exact, ignoring case - LDAP's rule. */
function ssoInGroup(array $groups, string $wanted): bool
{
    $wanted = trim($wanted);
    if ($wanted === '') return false;
    foreach ($groups as $g) {
        if (strcasecmp((string)$g, $wanted) === 0) return true;
    }
    return false;
}

/**
 * Parse the access rules. Returns [rules, errors]; each rule is
 * ['group' => string, 'line' => int, 'modules' => [], 'capabilities' => [],
 *  'all_modules' => bool, 'admin' => bool]. An unknown grant is an ERROR (the
 * save refuses it), never silently dropped - the same rule as the REST API.
 * @return array{0:array,1:string[]}
 */
function ssoParseAccessRules(?string $text): array
{
    $rules = [];
    $errors = [];
    $modules = array_keys(getModuleRegistry());
    foreach (preg_split('/\R/', (string)$text) as $i => $raw) {
        $line = trim($raw);
        if ($line === '' || $line[0] === '#') continue;
        $n = $i + 1;
        $eq = strrpos($line, '=');
        if ($eq === false) { $errors[] = "Line $n: write it as \"group = grants\"."; continue; }
        $group = trim(substr($line, 0, $eq));
        $grants = array_filter(array_map('trim', explode(',', substr($line, $eq + 1))), 'strlen');
        if ($group === '') { $errors[] = "Line $n: the group name is missing."; continue; }
        if (!$grants) { $errors[] = "Line $n: nothing to grant after the \"=\"."; continue; }
        $rule = ['group' => $group, 'line' => $n, 'modules' => [], 'capabilities' => [], 'all_modules' => false, 'admin' => false];
        foreach ($grants as $g) {
            $k = strtolower($g);
            if ($k === 'admin') { $rule['admin'] = true; continue; }
            if ($k === 'all-modules' || $k === 'all_modules') { $rule['all_modules'] = true; continue; }
            if (in_array($k, $modules, true)) { $rule['modules'][] = $k; continue; }
            if (strpos($k, '.') !== false && ($cap = capFromKey($k)) !== null) { $rule['capabilities'][] = $cap; continue; }
            $errors[] = "Line $n: \"$g\" is not a module, a capability, all-modules or admin."
                      . ($k === 'system' ? ' (System comes with admin.)' : '');
        }
        $rules[] = $rule;
    }
    return [$rules, $errors];
}

/**
 * What the rules give someone in $groups: ['all_modules', 'modules',
 * 'capabilities' and 'is_admin' (null = leave it alone), 'matched' => groups].
 */
function ssoAccessFromGroups(array $rules, array $groups): array
{
    $plan = ['all_modules' => false, 'modules' => [], 'capabilities' => null, 'is_admin' => null, 'matched' => []];
    $adminManaged = false;
    $capsManaged = false;
    foreach ($rules as $r) {
        if ($r['admin']) $adminManaged = true;
        if ($r['capabilities']) $capsManaged = true;
        if (!ssoInGroup($groups, $r['group'])) continue;
        $plan['matched'][] = $r['group'];
        $plan['all_modules'] = $plan['all_modules'] || $r['all_modules'];
        $plan['modules'] = array_merge($plan['modules'], $r['modules']);
        $plan['capabilities'] = array_merge($plan['capabilities'] ?? [], $r['capabilities']);
        if ($r['admin']) $plan['is_admin'] = true;
    }
    if ($adminManaged && $plan['is_admin'] === null) $plan['is_admin'] = false;
    $plan['modules'] = array_values(array_unique($plan['modules']));
    sort($plan['modules']);
    // null = no rule grants a capability, so leave theirs alone.
    $plan['capabilities'] = $capsManaged ? array_values(array_unique($plan['capabilities'] ?? [])) : null;
    $plan['matched'] = array_values(array_unique($plan['matched']));
    return $plan;
}

/**
 * Apply the provider's rules to an analyst signing in with $groups. No rules,
 * nothing happens. Returns the plan applied (or null), for the caller to log.
 */
function ssoApplyClaimAccess(PDO $conn, array $provider, int $analystId, array $groups): ?array
{
    [$rules] = ssoParseAccessRules($provider['oidc_access_rules'] ?? '');
    if (!$rules) return null;
    $plan = ssoAccessFromGroups($rules, $groups);
    require_once __DIR__ . '/services/analysts.php';
    $ctx = ActorContext::system('SSO sign-in');
    $set = ['all_modules' => $plan['all_modules'], 'modules' => $plan['modules']];
    if ($plan['capabilities'] !== null) $set['capabilities'] = $plan['capabilities'];
    if ($plan['is_admin'] !== null) $set['is_admin'] = $plan['is_admin'];
    try {
        AnalystsService::setAccess($conn, $ctx, $analystId, $set);
    } catch (ServiceError $e) {
        // The last active administrator: keep them one rather than lock everyone
        // out of System, apply the rest, and say so in the PHP log.
        if ($e->kind !== 'conflict' || !isset($set['is_admin'])) throw $e;
        unset($set['is_admin']);
        $plan['is_admin'] = null;
        AnalystsService::setAccess($conn, $ctx, $analystId, $set);
        error_log("SSO claim mapping: analyst #$analystId kept administrator - they are the last active one.");
    }
    return $plan;
}

/**
 * Remember what the last sign-in sent in the group claim, for System -> SSO -
 * setting this up is guesswork without it. Best effort.
 */
function ssoRememberGroups(PDO $conn, int $providerId, string $who, array $groups): void
{
    try {
        $conn->prepare("UPDATE auth_providers SET oidc_groups_last_seen = ? WHERE id = ?")
             ->execute([json_encode(['at' => gmdate('Y-m-d H:i:s'), 'who' => mb_substr($who, 0, 200), 'groups' => array_slice($groups, 0, 200)]), $providerId]);
    } catch (Throwable $e) { /* never fails a sign-in */ }
}
