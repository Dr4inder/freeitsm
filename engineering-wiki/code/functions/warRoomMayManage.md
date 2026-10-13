# warRoomMayManage()

Who may reshape this channel: its creator, or someone with war_room.manage.

```php
function warRoomMayManage(PDO $conn, int $analystId, array $channel): bool
```

Defined in [api/war-room/channels.php](/code/files/api/war-room/channels.php.md), line 35.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$channel` | `array` |  |  |

**Returns:** `bool`

## Calls

[analystHasCapability()](/code/functions/analystHasCapability.md)

## Called from

- [api/war-room/channels.php](/code/files/api/war-room/channels.php.md)

