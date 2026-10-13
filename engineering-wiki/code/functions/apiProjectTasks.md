# apiProjectTasks()

GET /projects/{id}/tasks - its top-level tasks. Change them through /tasks.

```php
function apiProjectTasks(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 564.

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
| 567 | `apiProjectTasks` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiLoadProject()](/code/functions/apiLoadProject.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

