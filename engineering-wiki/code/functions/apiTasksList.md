# apiTasksList()

GET /tasks

```php
function apiTasksList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 158.

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
| 210 | `apiTasksList` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 214 | `apiTasksList` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 229 | `apiTasksList` | read [task_tag_map](/code/tables/task_tag_map.md), read [task_tags](/code/tables/task_tags.md) |  |
| 275 | `apiTasksList` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [task_priorities](/code/tables/task_priorities.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDateOnly()](/code/functions/apiParseDateOnly.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTask()](/code/functions/apiSerializeTask.md), [apiTaskSelect()](/code/functions/apiTaskSelect.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

*Nothing calls this function by name.*

