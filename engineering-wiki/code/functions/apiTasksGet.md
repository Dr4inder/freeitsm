# apiTasksGet()

```php
function apiTasksGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 291.

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
| 298 | `apiTasksGet` | read [tasks](/code/tables/tasks.md) |  |
| 308 | `apiTasksGet` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 327 | `apiTasksGet` | read [tickets](/code/tables/tickets.md) |  |
| 340 | `apiTasksGet` | read [changes](/code/tables/changes.md) |  |
| 351 | `apiTasksGet` | read [task_comments](/code/tables/task_comments.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiLoadTask()](/code/functions/apiLoadTask.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTask()](/code/functions/apiSerializeTask.md)

*Nothing calls this function by name.*

