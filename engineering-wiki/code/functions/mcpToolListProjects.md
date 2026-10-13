# mcpToolListProjects()

MCP tool: lists the projects the API key may see.

```php
function mcpToolListProjects(PDO $conn, array $args, int $analystId, array $apiKey): string
```

Defined in [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), line 242.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$apiKey` | `array` |  |  |

**Returns:** `string`

## Calls

[mcpProjectScopeSql()](/code/functions/mcpProjectScopeSql.md), [projectAssistList()](/code/functions/projectAssistList.md)

*Nothing calls this function by name.*

