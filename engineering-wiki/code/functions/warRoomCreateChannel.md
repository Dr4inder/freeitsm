# warRoomCreateChannel()

Create a custom channel. Any analyst may — during an incident, needing an administrator to make you a room is exactly the wrong dependency.

```php
function warRoomCreateChannel(
    PDO $conn,
    int $analystId,
    string $name,
    string $topic = '',
    bool $isPrivate = false,
    array $memberIds = []
): int
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 287.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$name` | `string` |  |  |
| `$topic` | `string` | `''` |  |
| `$isPrivate` | `bool` | `false` |  |
| `$memberIds` | `array` | `[]` | ignored unless `$isPrivate`; the creator is always added |

**Returns:** int the new channel id

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 298 | `warRoomCreateChannel` | **insert** [warroom_channels](/code/tables/warroom_channels.md) (`kind`, `name`, `topic`, `is_private`, `created_by`, `created_datetime`) |  |

## Calls

[warRoomAddMembers()](/code/functions/warRoomAddMembers.md)

## Called from

- [api/war-room/channels.php](/code/files/api/war-room/channels.php.md)

