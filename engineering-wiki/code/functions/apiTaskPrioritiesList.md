# apiTaskPrioritiesList()

GET /task-priorities - the task priorities, in display order.

```php
function apiTaskPrioritiesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 472.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 474 | `apiTaskPrioritiesList` | read [task_priorities](/code/tables/task_priorities.md) |  |

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

