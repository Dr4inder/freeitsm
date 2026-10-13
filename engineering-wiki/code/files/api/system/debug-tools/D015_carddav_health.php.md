# api/system/debug-tools/D015_carddav_health.php

> API endpoint - 260 lines

Debug Tool D015 — Is the CardDAV connection healthy, in both directions?

D011 asks whether a directory is CONFIGURED to import. This asks whether an
address book actually WORKS right now — and, unlike D011, it does contact the
server, because "can we reach it" is the whole question here rather than a
distraction from it.

🔑 It walks the same path a real write takes, in order: reach the server,
authenticate, read the chosen book, and ask whether this account may write to
it. Each rung is reported separately, because they fail for entirely different
reasons and an operator told only "it does not work" has four things to check.

🔴 IT WRITES NOTHING. The write rung is a PROPFIND for
`current-user-privilege-set`, which asks the server what the account is
allowed to do. Proving it by creating a card and deleting it again is worse
than it sounds — the delete can fail, and the operator is left with a contact
called "FreeITSM test" in a real address book.

Also reports what only FreeITSM's own side can answer: how many people this
book manages, how many are missing the card URL a write-back needs, and what
the write log has recorded lately.

Output: plain text, section-delimited with === HEADERS ===.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D015_carddav_health.php` |
| Protected by | Signed-in analyst (session check) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 55 |  |
| [yn()](/code/functions/yn.md) | 59 |  |
| [maskUrl()](/code/functions/maskUrl.md) | 61 | Hide the host and the account, keep the shape. Reports get sent on. |
| [maskUser()](/code/functions/maskUser.md) | 67 |  |
| [emit_and_exit()](/code/functions/emit_and_exit.md) | 71 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 87 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 88 |  | read [user_sso_identities](/code/tables/user_sso_identities.md) |  |
| 101 |  | read [auth_providers](/code/tables/auth_providers.md) |  |
| 200 |  | read [users](/code/tables/users.md) |  |
| 202 |  | read [user_sso_identities](/code/tables/user_sso_identities.md) |  |
| 203 |  | read [user_sso_identities](/code/tables/user_sso_identities.md) |  |
| 223 |  | read [carddav_write_log](/code/tables/carddav_write_log.md) |  |
| 228 |  | read [carddav_write_log](/code/tables/carddav_write_log.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/encryption.php](/code/files/includes/encryption.php.md), [includes/carddav_write.php](/code/files/includes/carddav_write.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [cardDavCanWrite()](/code/functions/cardDavCanWrite.md), [cardDavConfigFromProvider()](/code/functions/cardDavConfigFromProvider.md), [cardDavListAddressBooks()](/code/functions/cardDavListAddressBooks.md), [cardDavScanBook()](/code/functions/cardDavScanBook.md), [connectToDatabase()](/code/functions/connectToDatabase.md)

