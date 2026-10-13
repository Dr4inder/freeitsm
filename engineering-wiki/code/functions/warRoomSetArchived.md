# warRoomSetArchived()

Archive or restore a custom channel. Team and all-hands channels cannot be archived — they are derived, so the way to remove one is to remove the team.

```php
function warRoomSetArchived(PDO $conn, int $channelId, bool $archived): bool
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 339.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$channelId` | `int` |  |  |
| `$archived` | `bool` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 342 | `warRoomSetArchived` | **update** [warroom_channels](/code/tables/warroom_channels.md) (`archived_datetime`) |  |

## Called from

- [api/war-room/channels.php](/code/files/api/war-room/channels.php.md)

