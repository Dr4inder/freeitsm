# projectFlow()

The flow for one project's chart: statuses [{id, name, closed}] in board order (the install's task statuses) points [{d, counts: {status_id|'open'|'done': n}, recorded: bool}] from the first recorded day (null = none yet)

```php
function projectFlow(PDO $conn, array $project): array
```

Defined in [includes/projects/flow.php](/code/files/includes/projects/flow.php.md), line 53.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$project` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 57 | `projectFlow` | read [task_statuses](/code/tables/task_statuses.md) |  |
| 60 | `projectFlow` | read [project_task_flow](/code/tables/project_task_flow.md) |  |
| 67 | `projectFlow` | read [tasks](/code/tables/tasks.md) |  |
| 76 | `projectFlow` | read [tasks](/code/tables/tasks.md) |  |

## Calls

[projectFlowReady()](/code/functions/projectFlowReady.md)

## Called from

- [api/projects/get.php](/code/files/api/projects/get.php.md)

