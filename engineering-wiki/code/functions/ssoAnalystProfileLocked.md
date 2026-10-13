# ssoAnalystProfileLocked()

Does the given analyst's sign-in provider lock their My details fields? Safe before Database Verification (answers false).

```php
function ssoAnalystProfileLocked(PDO $conn, int $analystId): bool
```

Defined in [includes/sso_identity.php](/code/files/includes/sso_identity.php.md), line 90.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 93 | `ssoAnalystProfileLocked` | read [analysts](/code/tables/analysts.md), read [auth_providers](/code/tables/auth_providers.md) |  |

## Calls

[ssoJitColumnsReady()](/code/functions/ssoJitColumnsReady.md), [ssoProfileSyncLocks()](/code/functions/ssoProfileSyncLocks.md)

## Called from

- [api/myaccount/get_signatures.php](/code/files/api/myaccount/get_signatures.php.md)
- [api/myaccount/save_profile.php](/code/files/api/myaccount/save_profile.php.md)

