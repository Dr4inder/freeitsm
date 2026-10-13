# mcpToolProjectRaid()

MCP tool: a project's RAID log - risks, assumptions, issues and dependencies.

```php
function mcpToolProjectRaid(PDO $conn, array $args, int $analystId, array $apiKey): string
```

Defined in [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), line 256.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$apiKey` | `array` |  |  |

**Returns:** `string`

## Calls

[mcpProjectScopeSql()](/code/functions/mcpProjectScopeSql.md), [projectAssistRaid()](/code/functions/projectAssistRaid.md)

*Nothing calls this function by name.*

