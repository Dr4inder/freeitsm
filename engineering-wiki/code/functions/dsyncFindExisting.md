# dsyncFindExisting()

Find the FreeITSM record for a directory person, in order of reliability.

1. the stored GUID          — survives renames AND moves between OUs
  2. the directory username   — for records linked before GUIDs were captured
  3. the email address        — a person who already exists here, see §4.2

Returns [row|null, howMatched].

```php
function dsyncFindExisting(PDO $conn, array $provider, array $p): array
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 383.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$p` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 389 | `dsyncFindExisting` | read [user_sso_identities](/code/tables/user_sso_identities.md), read [users](/code/tables/users.md) |  |
| 398 | `dsyncFindExisting` | read [users](/code/tables/users.md) |  |
| 411 | `dsyncFindExisting` | read [users](/code/tables/users.md) |  |
| 414 | `dsyncFindExisting` | read [users](/code/tables/users.md) |  |

## Called from

- [includes/carddav_sync.php](/code/files/includes/carddav_sync.php.md) - in [cardDavSyncRun()](/code/functions/cardDavSyncRun.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [directorySyncRun()](/code/functions/directorySyncRun.md)

