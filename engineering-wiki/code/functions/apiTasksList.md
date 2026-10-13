# apiTasksList()

```php
function apiTasksList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 149.

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
| 201 | `apiTasksList` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 205 | `apiTasksList` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 220 | `apiTasksList` | read [task_tag_map](/code/tables/task_tag_map.md), read [task_tags](/code/tables/task_tags.md) |  |
| 266 | `apiTasksList` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [task_priorities](/code/tables/task_priorities.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDateOnly()](/code/functions/apiParseDateOnly.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTask()](/code/functions/apiSerializeTask.md), [apiTaskSelect()](/code/functions/apiTaskSelect.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

*Nothing calls this function by name.*

