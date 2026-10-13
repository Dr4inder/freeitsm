# api/system/debug-tools/D003_selfservice_sso.php

> API endpoint - 477 lines

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
| [addSection()](/code/functions/addSection.md) | 30 |  |
| [yn()](/code/functions/yn.md) | 34 |  |
| [okbad()](/code/functions/okbad.md) | 35 |  |
| [endpointLine()](/code/functions/endpointLine.md) | 49 | One discovery-endpoint line, printing the ADDRESS the provider published. |
| [maskMiddle()](/code/functions/maskMiddle.md) | 72 |  |
| [maskGuids()](/code/functions/maskGuids.md) | 82 | Identifiers (client IDs, tenant GUIDs) aren't secrets, but this report is made to be shared with support — so partially mask them: enough to eyeball- verify, not the full value. Diagnostic signals (match/reachability) are computed on the real values and shown as YES/NO, so nothing is lost. |
| [maskId()](/code/functions/maskId.md) | 87 |  |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 95 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 226 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 227 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 228 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 229 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 230 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 231 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 242 |  | read [tenants](/code/tables/tenants.md) |  |
| 252 |  | read [freemail_domains](/code/tables/freemail_domains.md) |  |
| 255 |  | read [tenant_sender_addresses](/code/tables/tenant_sender_addresses.md) |  |
| 256 |  | read [tenant_domains](/code/tables/tenant_domains.md) |  |
| 259 |  | read [tenants](/code/tables/tenants.md) |  |
| 271 |  | read [users](/code/tables/users.md) |  |
| 279 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 280 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 281 |  | read [user_sso_identities](/code/tables/user_sso_identities.md), read [auth_providers](/code/tables/auth_providers.md) |  |
| 308 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 310 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 313 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 342 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 344 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 368 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 371 |  | read [tenants](/code/tables/tenants.md) |  |
| 442 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 446 |  | read [auth_providers](/code/tables/auth_providers.md) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [dbConnectionOptions()](/code/functions/dbConnectionOptions.md), [requestScheme()](/code/functions/requestScheme.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

