# api/system/debug-tools/D010_signin_methods.php

> API endpoint - 444 lines

Debug Tool D010 — Sign-in methods, and how you are actually signed in

Answers three questions that get confused with each other constantly:

  1. What sign-in methods exist, and what state is each one in?
  2. What will the login page actually OFFER a visitor right now?
  3. How did the person running this diagnostic get in?

(3) matters more than it looks. An administrator looking at the Authentication
screen has, by definition, already signed in — so "nobody can sign in" and
"everything is fine" look identical from that chair. Naming the route they
personally used turns an argument into a fact.

Written to be SENT TO SOMEBODY. Every username, email address, bind account and
DN is masked; secrets are reported present/absent and never printed. All the
diagnostic comparisons are computed on the real values and reported as
YES/NO/OK, so masking costs nothing.

Read-only: makes no network calls and writes nothing.

Output: plain text, section-delimited with === HEADERS ===.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D010_signin_methods.php` |
| Protected by | Signed-in analyst (session check) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 50 |  |
| [yn()](/code/functions/yn.md) | 54 |  |
| [mask()](/code/functions/mask.md) | 61 |  |
| [maskEmail()](/code/functions/maskEmail.md) | 70 | Local part masked, domain kept — the domain is the diagnostic half. |
| [maskDn()](/code/functions/maskDn.md) | 85 | A DN carries a person's name in its leading component and the directory's shape in the rest. The shape is what you need to diagnose, the name is not — so mask every attribute VALUE and keep every attribute NAME and the commas. "CN=svc_freeitsm,OU=Service Accounts,DC=cnss,DC=local" -> "CN=sv******m,OU=Se******s,DC=cn***,DC=lo***" |
| [maskGuids()](/code/functions/maskGuids.md) | 102 | A tenant GUID in an issuer URL names the ORGANISATION, which is more than this report needs to be useful — and D003 already masks them for the same reason. The rest of the URL (which IdP, which realm shape) is the diagnostic half. |
| [maskHost()](/code/functions/maskHost.md) | 109 | A hostname is infrastructure, not a person — but strip any user@ prefix. |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 116 |  |
| [colExists()](/code/functions/colExists.md) | 146 |  |
| [tableExists()](/code/functions/tableExists.md) | 154 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 211 |  | read [analysts](/code/tables/analysts.md) |  |
| 246 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 259 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 295 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 389 |  | read [analysts](/code/tables/analysts.md) |  |
| 390 |  | read [analysts](/code/tables/analysts.md) |  |
| 391 |  | read [analysts](/code/tables/analysts.md) |  |
| 392 |  | read [analysts](/code/tables/analysts.md) |  |
| 394 |  | read [analysts](/code/tables/analysts.md) |  |
| 401 |  | read [users](/code/tables/users.md) |  |
| 402 |  | read [users](/code/tables/users.md) |  |
| 403 |  | read [users](/code/tables/users.md) |  |
| 405 |  | read [users](/code/tables/users.md) |  |
| 408 |  | read [user_sso_identities](/code/tables/user_sso_identities.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md)

