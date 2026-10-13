# warRoomIsMember()

```php
function warRoomIsMember(PDO $conn, int $analystId, int $channelId): bool
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 258.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$channelId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 260 | `warRoomIsMember` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |

## Called from

- [includes/warroom.php](/code/files/includes/warroom.php.md) - in [warRoomCanAccessChannel()](/code/functions/warRoomCanAccessChannel.md)

