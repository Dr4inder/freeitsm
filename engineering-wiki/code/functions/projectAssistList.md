# projectAssistList()

args: status (live | all | a status), health, q, limit.

```php
function projectAssistList(PDO $conn, array $scope, array $args): string
```

Defined in [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), line 105.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$scope` | `array` |  |  |
| `$args` | `array` |  |  |

**Returns:** `string`

## Calls

[projectAssistLine()](/code/functions/projectAssistLine.md), [projectAssistRows()](/code/functions/projectAssistRows.md), [projectStatuses()](/code/functions/projectStatuses.md)

## Called from

- [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md) - in [mcpToolListProjects()](/code/functions/mcpToolListProjects.md)
- [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) - in [warbotToolListProjects()](/code/functions/warbotToolListProjects.md)

