# apiTasksGet()

GET /tasks/{id}

```php
function apiTasksGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), line 300.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$apiKey` | `array` |  | The API key that authenticated the call - its scopes and company limit. *([standard](/handbook/standard-parameters.md))* |
| `$params` | `array` |  | The ids captured from the URL path, in order, as integers. *([standard](/handbook/standard-parameters.md))* |
| `$body` | `array` |  | The request's JSON body, decoded. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 307 | `apiTasksGet` | read [tasks](/code/tables/tasks.md) |  |
| 317 | `apiTasksGet` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 336 | `apiTasksGet` | read [tickets](/code/tables/tickets.md) |  |
| 349 | `apiTasksGet` | read [changes](/code/tables/changes.md) |  |
| 360 | `apiTasksGet` | read [task_comments](/code/tables/task_comments.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiLoadTask()](/code/functions/apiLoadTask.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTask()](/code/functions/apiSerializeTask.md)

*Nothing calls this function by name.*

