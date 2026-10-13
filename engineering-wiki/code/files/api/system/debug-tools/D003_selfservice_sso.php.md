# api/system/debug-tools/D003_selfservice_sso.php

> API endpoint - 495 lines

Debug Tool D003 — Self-Service SSO check (by email)

Enter a requester's email address; this tool reports — end to end — whether
self-service sign-in is correctly wired for them:
  - schema readiness for the self-service login + SSO tables/columns,
  - global SSO config (sso_enabled / local_login_enabled, provider counts),
  - single- vs multi-tenant mode,
  - how the email resolves to a company (domain / specific-sender / freemail),
  - the user account state (exists / passwordless / TOTP / provider pin),
  - the predicted login outcome (local / sso / choose) — mirrors resolve_login,
  - provider health + a live, secret-free OIDC discovery test,
  - the exact redirect URI to register in the IdP.

READ-ONLY. Writes nothing. NEVER prints secrets (client secrets, TOTP
secrets and password hashes are reported only as present / absent).

Output: plain text, section-delimited with === HEADERS === for easy skimming.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D003_selfservice_sso.php` |
| Protected by | Signed-in analyst (session check) |
| Reads | `GET email`, `POST email` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 34 | Adds one titled section ("=== TITLE ===" and its lines) to the report; `$body` is a string or an array of lines. |
| [yn()](/code/functions/yn.md) | 39 | Formats a boolean as YES or NO for the report. |
| [okbad()](/code/functions/okbad.md) | 41 | Formats a boolean as one of two words - OK or MISSING unless others are given. |
| [endpointLine()](/code/functions/endpointLine.md) | 55 | One discovery-endpoint line, printing the ADDRESS the provider published. |
| [maskMiddle()](/code/functions/maskMiddle.md) | 82 | Shortens a value to its first and last four characters (the first two for a short one), so a shared report shows enough to recognise it but not the whole value. |
| [maskGuids()](/code/functions/maskGuids.md) | 92 | Identifiers (client IDs, tenant GUIDs) aren't secrets, but this report is made to be shared with support — so partially mask them: enough to eyeball- verify, not the full value. Diagnostic signals (match/reachability) are computed on the real values and shown as YES/NO, so nothing is lost. |
| [maskId()](/code/functions/maskId.md) | 101 | Partially masks a client or tenant id - GUIDs and long opaque ids through `maskMiddle()`, short readable names shown as they are. |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 113 | Prints every section, separated by blank lines, and stops - the end of the report, and the early exit when a check cannot go on. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 244 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 245 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 246 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 247 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 248 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 249 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 260 |  | read [tenants](/code/tables/tenants.md) |  |
| 270 |  | read [freemail_domains](/code/tables/freemail_domains.md) |  |
| 273 |  | read [tenant_sender_addresses](/code/tables/tenant_sender_addresses.md) |  |
| 274 |  | read [tenant_domains](/code/tables/tenant_domains.md) |  |
| 277 |  | read [tenants](/code/tables/tenants.md) |  |
| 289 |  | read [users](/code/tables/users.md) |  |
| 297 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 298 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 299 |  | read [user_sso_identities](/code/tables/user_sso_identities.md), read [auth_providers](/code/tables/auth_providers.md) |  |
| 326 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 328 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 331 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 360 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 362 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 386 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 389 |  | read [tenants](/code/tables/tenants.md) |  |
| 460 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 464 |  | read [auth_providers](/code/tables/auth_providers.md) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [dbConnectionOptions()](/code/functions/dbConnectionOptions.md), [requestScheme()](/code/functions/requestScheme.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

