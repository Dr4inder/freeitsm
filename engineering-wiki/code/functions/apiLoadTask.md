# apiLoadTask()

```php
function apiLoadTask(PDO $conn, int $taskId, ?array $apiKey = null): array
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 127.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |
| `$apiKey` | `?array` | `null` |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiTaskSelect()](/code/functions/apiTaskSelect.md)

## Called from

- [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md) - in [apiTasksGet()](/code/functions/apiTasksGet.md), [apiTasksCreate()](/code/functions/apiTasksCreate.md), [apiTasksUpdate()](/code/functions/apiTasksUpdate.md), [apiTasksMove()](/code/functions/apiTasksMove.md), [apiTaskCommentsList()](/code/functions/apiTaskCommentsList.md)

