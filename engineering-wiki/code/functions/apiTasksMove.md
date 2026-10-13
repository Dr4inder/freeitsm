# apiTasksMove()

POST /tasks/{id}/move — kanban move (mirrors reorder.php: NO workflow event)

```php
function apiTasksMove(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 400.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadTask()](/code/functions/apiLoadTask.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTask()](/code/functions/apiSerializeTask.md)

*Nothing calls this function by name.*

