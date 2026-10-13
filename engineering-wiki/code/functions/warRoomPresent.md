# warRoomPresent()

Who has polled recently, and whether they are in THIS channel or elsewhere in the war room. "Here" versus "around" is a genuinely useful distinction during an incident — it is the difference between nobody is reading this and everybody is in the other room.

```php
function warRoomPresent(PDO $conn, int $excludeAnalystId, int $channelId): array
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 1088.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$excludeAnalystId` | `int` |  |  |
| `$channelId` | `int` |  |  |

**Returns:** array{here:string[],elsewhere:string[]}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1091 | `warRoomPresent` | read [warroom_presence](/code/tables/warroom_presence.md), read [analysts](/code/tables/analysts.md) |  |

## Called from

- [api/system/debug-tools/D008_war_room.php](/code/files/api/system/debug-tools/D008_war_room.php.md)
- [api/war-room/poll.php](/code/files/api/war-room/poll.php.md)

