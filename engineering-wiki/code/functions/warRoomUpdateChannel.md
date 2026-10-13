# warRoomUpdateChannel()

Rename / re-topic a custom channel. Team and DM names are derived, never stored.

```php
function warRoomUpdateChannel(PDO $conn, int $channelId, string $name, string $topic): bool
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 352.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$channelId` | `int` |  |  |
| `$name` | `string` |  |  |
| `$topic` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 357 | `warRoomUpdateChannel` | **update** [warroom_channels](/code/tables/warroom_channels.md) (`name`, `topic`) |  |

## Called from

- [api/war-room/channels.php](/code/files/api/war-room/channels.php.md)

