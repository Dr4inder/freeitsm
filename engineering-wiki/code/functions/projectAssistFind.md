# projectAssistFind()

One project inside `$scope`, by code (PRJ-0042), id or a unique part of its name. Throws ServiceError.

```php
function projectAssistFind(PDO $conn, array $scope, $ref): array
```

Defined in [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), line 50.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$scope` | `array` |  |  |
| `$ref` |  |  |  |

**Returns:** `array`

## Calls

[projectAssistRows()](/code/functions/projectAssistRows.md)

## Called from

- [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md) - in [mcpToolProjectBudget()](/code/functions/mcpToolProjectBudget.md)
- [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md) - in [projectAssistOverview()](/code/functions/projectAssistOverview.md), [projectAssistRaid()](/code/functions/projectAssistRaid.md), [projectAssistTasks()](/code/functions/projectAssistTasks.md)

