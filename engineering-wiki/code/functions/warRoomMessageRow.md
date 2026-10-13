# warRoomMessageRow()

One message row, raw. Callers do their own access checks.

```php
function warRoomMessageRow(PDO $conn, int $messageId): ?array
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 616.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$messageId` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 618 | `warRoomMessageRow` | read [warroom_messages](/code/tables/warroom_messages.md) |  |

## Called from

- [api/war-room/warbot.php](/code/files/api/war-room/warbot.php.md)
- [includes/warroom.php](/code/files/includes/warroom.php.md) - in [warRoomEditMessage()](/code/functions/warRoomEditMessage.md), [warRoomDeleteMessage()](/code/functions/warRoomDeleteMessage.md)

