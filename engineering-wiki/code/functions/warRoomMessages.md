# warRoomMessages()

Messages in a channel, oldest first, each with its attachments.

`$sinceId` drives the poll: the page asks for everything newer than the last id
it holds, so a quiet channel costs one indexed lookup that returns nothing.
On the first load `$sinceId` is 0 and we return the tail rather than the lot.

A NULL analyst_id is a deleted account, rendered as "Former analyst" rather
than blank or "Unknown" so the reader can tell WHICH case it is.

```php
function warRoomMessages(PDO $conn, int $channelId, int $sinceId = 0, int $limit = 200): array
```

Defined in [includes/warroom.php](/code/files/includes/warroom.php.md), line 450.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$channelId` | `int` |  |  |
| `$sinceId` | `int` | `0` |  |
| `$limit` | `int` | `200` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 469 | `warRoomMessages` | read [analysts](/code/tables/analysts.md) |  |
| 473 | `warRoomMessages` | read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 481 | `warRoomMessages` | read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 527 | `warRoomMessages` | read [warroom_attachments](/code/tables/warroom_attachments.md) |  |

## Calls

[attachmentServeRules()](/code/functions/attachmentServeRules.md), [t()](/code/functions/t.md)

## Called from

- [api/system/debug-tools/D008_war_room.php](/code/files/api/system/debug-tools/D008_war_room.php.md)
- [api/war-room/poll.php](/code/files/api/war-room/poll.php.md)
- [api/war-room/warbot.php](/code/files/api/war-room/warbot.php.md)

