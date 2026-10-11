<?php
/* 🔴 NEVER OVER THE WEB. See tests/README.md. */
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }

/**
 * SSO claim mapping (3.5.0) - includes/sso_claims.php.
 *
 *   php tests/sso-claim-mapping.php
 *
 * Reading a group claim the way IdPs really send it (arrays, single strings,
 * nested objects as the ID token decodes them, dotted paths, URL-named claims),
 * the LDAP matching rule, the rules parser, what the rules give, and applying
 * them to an analyst - inside a transaction that is ALWAYS rolled back.
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/sso_claims.php';
require_once __DIR__ . '/../includes/services/analysts.php';

$pass = 0; $fail = 0;
function ok(string $what, bool $cond, string $detail = ''): void {
    global $pass, $fail;
    if ($cond) { $pass++; echo "  PASS  {$what}\n"; }
    else       { $fail++; echo "  FAIL  {$what}" . ($detail ? "  <- {$detail}" : '') . "\n"; }
}

echo "\nSSO claim mapping (3.5.0)\n" . str_repeat('=', 70) . "\n";

echo "\n-- Reading the claim\n";
ok('an array claim', ssoClaimValues(['groups' => ['IT-Staff', 'Sales']], 'groups') === ['IT-Staff', 'Sales']);
ok('a single string', ssoClaimValues(['role' => 'IT-Staff'], 'role') === ['IT-Staff']);
// The ID token decodes top level as an array but nested JSON as stdClass.
$idToken = (array)json_decode('{"realm_access":{"roles":["itsm-staff","offline"]},"groups":["a"]}');
ok('a nested path on an ID token (stdClass inside)', ssoClaimValues($idToken, 'realm_access.roles') === ['itsm-staff', 'offline']);
ok('a claim named like a URL (dots in the name)', ssoClaimValues(['https://example.com/roles' => ['x']], 'https://example.com/roles') === ['x']);
ok('a missing claim is no groups', ssoClaimValues(['groups' => ['a']], 'roles') === [] && ssoClaimValues([], 'a.b') === []);
ok('blanks and objects inside the list are dropped', ssoClaimValues(['g' => ['a', '', ['x' => 1], ' b ']], 'g') === ['a', 'b']);
ok('an empty claim setting reads nothing', ssoClaimValues(['groups' => ['a']], '') === []);

echo "\n-- Matching (LDAP's rule: exact, ignoring case)\n";
ok('ignores case', ssoInGroup(['IT-Staff'], 'it-staff'));
ok('no partial match', !ssoInGroup(['IT-Staff-Old'], 'IT-Staff'));
ok('blank never matches', !ssoInGroup([''], ''));

echo "\n-- Parsing the rules\n";
[$rules, $errs] = ssoParseAccessRules("# comment\n\nIT-Service-Desk = tickets, Knowledge, tickets.manage\nCN=Admins,OU=IT = admin\nEveryone = all-modules\n");
ok('three rules, no errors', count($rules) === 3 && !$errs, json_encode($errs));
ok('modules and capabilities sorted out (case-insensitive)', $rules[0]['modules'] === ['tickets', 'knowledge'] && $rules[0]['capabilities'] === ['tickets.manage']);
ok('a group name with "=" in it (split on the last one)', $rules[1]['group'] === 'CN=Admins,OU=IT' && $rules[1]['admin'] === true);
[, $errs] = ssoParseAccessRules("Staff = tickets, nope\nno equals here\n= tickets\nStaff =\nX = system");
ok('an unknown grant is an error, with its line', count($errs) === 5 && str_contains($errs[0], 'Line 1') && str_contains($errs[0], 'nope'), json_encode($errs));
ok('System is explained', str_contains($errs[4], 'admin'));

echo "\n-- What the rules give\n";
[$rules] = ssoParseAccessRules("Desk = tickets, knowledge\nAssets = assets, assets.leasing\nAll = all-modules");
$p = ssoAccessFromGroups($rules, ['desk', 'assets']);
ok('modules from every matching rule', $p['modules'] === ['assets', 'knowledge', 'tickets'] && $p['all_modules'] === false);
ok('capabilities from the matching rules', $p['capabilities'] === ['assets.leasing']);
ok('admin left alone when no rule mentions it', $p['is_admin'] === null);
$p = ssoAccessFromGroups($rules, ['nobody']);
ok('no match: no modules', $p['modules'] === [] && $p['all_modules'] === false && $p['matched'] === []);
ok('...and, since a rule grants capabilities, none of those either', $p['capabilities'] === []);
[$rules2] = ssoParseAccessRules("Desk = tickets");
ok('capabilities left alone when no rule grants one', ssoAccessFromGroups($rules2, ['Desk'])['capabilities'] === null);
ok('all-modules wins', ssoAccessFromGroups($rules, ['All', 'Desk'])['all_modules'] === true);
[$rules3] = ssoParseAccessRules("Desk = tickets\nAdmins = admin");
ok('admin managed: in the admin group = admin', ssoAccessFromGroups($rules3, ['Admins'])['is_admin'] === true);
ok('admin managed: not in it = not admin', ssoAccessFromGroups($rules3, ['Desk'])['is_admin'] === false);

echo "\n-- Applying them to an analyst\n";
$conn = connectToDatabase();
$conn->beginTransaction();
try {
    $actor = new ActorContext(actorId: 1, companyScope: null, source: 'api');
    $X = AnalystsService::create($conn, $actor, ['email' => 'zzclaims@example.invalid', 'full_name' => 'ZZ Claims']);
    AnalystsService::setAccess($conn, $actor, $X, ['capabilities' => ['tickets.manage']]);
    $provider = ['oidc_access_rules' => "Desk = tickets, knowledge"];
    ssoApplyClaimAccess($conn, $provider, $X, ['desk']);
    $acc = AnalystsService::access($conn, $X, false);
    ok('modules set from the groups', $acc['modules'] === ['knowledge', 'tickets'] && $acc['all_modules'] === false);
    ok('capabilities set elsewhere are left alone (no rule grants one)', $acc['capabilities'] === ['tickets.manage']);
    ssoApplyClaimAccess($conn, $provider, $X, []);
    ok('left the group: modules gone at the next sign-in', AnalystsService::access($conn, $X, false)['modules'] === []);
    ok('no rules: nothing happens', ssoApplyClaimAccess($conn, ['oidc_access_rules' => ''], $X, ['desk']) === null);

    $adminRules = ['oidc_access_rules' => "Admins = admin\nDesk = tickets"];
    ssoApplyClaimAccess($conn, $adminRules, $X, ['Admins']);
    ok('in the admin group: made an administrator', AnalystsService::access($conn, $X, false)['is_admin'] === true);
    ssoApplyClaimAccess($conn, $adminRules, $X, ['Desk']);
    ok('out of it: no longer an administrator', AnalystsService::access($conn, $X, false)['is_admin'] === false);

    // The last active administrator keeps it rather than locking everyone out.
    ssoApplyClaimAccess($conn, $adminRules, $X, ['Admins']);
    $others = $conn->query("SELECT id FROM analysts WHERE is_admin = 1 AND is_active = 1 AND id <> $X")->fetchAll(PDO::FETCH_COLUMN);
    if ($others) $conn->exec("UPDATE analysts SET is_admin = 0 WHERE id IN (" . implode(',', array_map('intval', $others)) . ")");
    $plan = ssoApplyClaimAccess($conn, $adminRules, $X, ['Desk']);
    $acc = AnalystsService::access($conn, $X, false);
    ok('the last admin keeps admin, the rest still applies', $acc['is_admin'] === true && $acc['modules'] === ['tickets'] && $plan['is_admin'] === null, json_encode($acc));
} catch (Throwable $e) {
    $fail++;
    echo "  FAIL  unexpected: " . get_class($e) . ': ' . $e->getMessage() . ' @ ' . basename($e->getFile()) . ':' . $e->getLine() . "\n";
} finally {
    if ($conn->inTransaction()) $conn->rollBack();
}

echo str_repeat('-', 70) . "\n{$pass} passed, {$fail} failed\n";
exit($fail ? 1 : 0);
