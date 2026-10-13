# projectChatRead()

Run a READ tool, as text. Never throws.

```php
function projectChatRead(PDO $conn, int $pid, string $name, array $a): string
```

Defined in [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), line 223.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$pid` | `int` |  |  |
| `$name` | `string` |  |  |
| `$a` | `array` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 231 | `projectChatRead` | read [suppliers](/code/tables/suppliers.md) |  |
| 232 | `projectChatRead` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [project_stages](/code/tables/project_stages.md), read [analysts](/code/tables/analysts.md) |  |
| 242 | `projectChatRead` | read [project_stages](/code/tables/project_stages.md) |  |
| 248 | `projectChatRead` | read [project_raid](/code/tables/project_raid.md), read [analysts](/code/tables/analysts.md) |  |
| 255 | `projectChatRead` | read [project_milestones](/code/tables/project_milestones.md), read [project_stages](/code/tables/project_stages.md) |  |
| 270 | `projectChatRead` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[tasksContractorChoices()](/code/functions/tasksContractorChoices.md), [tasksContractorReady()](/code/functions/tasksContractorReady.md), [tasksSupplierNameSql()](/code/functions/tasksSupplierNameSql.md)

## Called from

- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatTurn()](/code/functions/projectChatTurn.md)

