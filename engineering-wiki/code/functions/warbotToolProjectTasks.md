# warbotToolProjectTasks()

project_tasks: one project's tasks via `projectAssistTasks()`, scoped to the projects the asker may see.

```php
function warbotToolProjectTasks(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 987.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Calls

[projectAssistTasks()](/code/functions/projectAssistTasks.md), [warbotProjectAnswer()](/code/functions/warbotProjectAnswer.md), [warbotProjectScope()](/code/functions/warbotProjectScope.md)

*Nothing calls this function by name.*

