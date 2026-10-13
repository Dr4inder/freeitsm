# api/system/debug-tools/D004_local_login.php

> API endpoint - 365 lines

Debug Tool D004 — Local login check (analyst or self-service user)

Diagnoses why a username/email + password sign-in fails for a local account.
Built for the classic "I bulk-imported users with password hashes but they
can't log in" case: PHP's `password_verify()` only understands bcrypt/argon, so
an imported MD5/SHA-1/phpass/Django/etc. hash ALWAYS fails — until the
password is re-set in FreeITSM (which re-hashes with bcrypt).

Pick the account type, enter the username/email, and OPTIONALLY the password.
  - No password  -> account-readiness checks (hash format, lockout, SSO pin…).
  - With password -> additionally runs `password_verify()`, and if that fails on
                     a non-bcrypt hash, tries to identify the foreign format by
                     testing whether the stored hash is e.g. MD5(password).

SAFE: POST only (the password never lands in a URL/log), the password is
NEVER echoed, and the stored hash is NEVER printed (only its format/cost/
length). Read-only — writes nothing.

Output: plain text, section-delimited with === HEADERS ===.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D004_local_login.php` |
| Protected by | Signed-in analyst (session check) |
| Reads | `POST account_type`, `GET account_type`, `POST identifier`, `GET identifier`, `POST password` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 32 |  |
| [yn()](/code/functions/yn.md) | 36 |  |
| [okbad()](/code/functions/okbad.md) | 37 |  |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 38 |  |
| [classifyHash()](/code/functions/classifyHash.md) | 51 | Classify a stored password hash. Returns: ['label','php_native'(bool can password_verify check it),'note','raw_algo'(for foreign match test)] |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 137 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 176 |  | read [analysts](/code/tables/analysts.md) |  |
| 178 |  | read [users](/code/tables/users.md) |  |
| 262 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 302 |  | read [ip_login_bans](/code/tables/ip_login_bans.md) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [dbConnectionOptions()](/code/functions/dbConnectionOptions.md), [decryptValue()](/code/functions/decryptValue.md), [getEncryptionKey()](/code/functions/getEncryptionKey.md)

