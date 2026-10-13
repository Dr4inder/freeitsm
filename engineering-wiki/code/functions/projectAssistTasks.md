# projectAssistTasks()

args: project, open_only (default true). Overdue first, then by due date.

```php
function projectAssistTasks(PDO $conn, array $scope, array $args): string
```

Defined in [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), line 227.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$scope` | `array` |  |  |
| `$args` | `array` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 231 | `projectAssistTasks` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md), read [project_stages](/code/tables/project_stages.md) |  |

## Calls

[projectAssistFind()](/code/functions/projectAssistFind.md)

## Called from

- [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md) - in [mcpToolProjectTasks()](/code/functions/mcpToolProjectTasks.md)
- [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) - in [warbotToolProjectTasks()](/code/functions/warbotToolProjectTasks.md)

