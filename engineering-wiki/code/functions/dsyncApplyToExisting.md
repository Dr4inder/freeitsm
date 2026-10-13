# dsyncApplyToExisting()

```php
function dsyncApplyToExisting(
    PDO $conn,
    array $provider,
    array $existing,
    array $p,
    bool $preview
): string
```

Defined in [includes/directory_sync.php](/code/files/includes/directory_sync.php.md), line 689.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$provider` | `array` |  |  |
| `$existing` | `array` |  |  |
| `$p` | `array` |  |  |
| `$preview` | `bool` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 742 | `dsyncApplyToExisting` | **update** [users](/code/tables/users.md) |  |

## Calls

[dsyncFieldLabel()](/code/functions/dsyncFieldLabel.md), [dsyncLinkIdentity()](/code/functions/dsyncLinkIdentity.md)

## Called from

- [includes/carddav_sync.php](/code/files/includes/carddav_sync.php.md) - in [cardDavSyncRun()](/code/functions/cardDavSyncRun.md)
- [includes/directory_sync.php](/code/files/includes/directory_sync.php.md) - in [directorySyncRun()](/code/functions/directorySyncRun.md)

