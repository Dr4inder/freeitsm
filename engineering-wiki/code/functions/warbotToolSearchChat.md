# warbotToolSearchChat()

search_chat: up to eight War Room messages matching the query, through `warRoomSearch()` so only channels the asker can read are searched.

```php
function warbotToolSearchChat(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 845.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `string`

## Calls

[warRoomSearch()](/code/functions/warRoomSearch.md)

*Nothing calls this function by name.*

