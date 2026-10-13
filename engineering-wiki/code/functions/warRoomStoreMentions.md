# warRoomStoreMentions()

Record the mentions for a message. Idempotent via the UNIQUE on (message, analyst).

```php
function warRoomStoreMentions(PDO $conn, int $messageId, array $analystIds): void
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 774.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$messageId` | `int` |  |  |
| `$analystIds` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 778 | `warRoomStoreMentions` | **insert** [warroom_mentions](/code/tables/warroom_mentions.md) (`message_id`, `analyst_id`, `created_datetime`) |  |

## Called from

- [includes/warroom.php](/code/files/includes/warroom.php.md) - in [warRoomEditMessage()](/code/functions/warRoomEditMessage.md), [warRoomSend()](/code/functions/warRoomSend.md)

