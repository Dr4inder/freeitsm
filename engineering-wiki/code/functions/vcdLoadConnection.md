# vcdLoadConnection()

```php
function vcdLoadConnection(PDO $conn, int $connectionId): array
```

Defined in [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md), line 33.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$connectionId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 35 | `vcdLoadConnection` | read [vcloud_connections](/code/tables/vcloud_connections.md) |  |

## Calls

[decryptValue()](/code/functions/decryptValue.md)

## Called from

- [api/assets/vcloud_sync.php](/code/files/api/assets/vcloud_sync.php.md)
- [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md) - in [vcdSyncConnection()](/code/functions/vcdSyncConnection.md)

