# mcpToolProjectBudget()

The budget stays MCP-only: Warbot answers in a channel everyone in it can read.

```php
function mcpToolProjectBudget(PDO $conn, array $args, int $analystId, array $apiKey): string
```

Defined in [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), line 266.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |
| `$apiKey` | `array` |  |  |

**Returns:** `string`

## Calls

[mcpProjectScopeSql()](/code/functions/mcpProjectScopeSql.md), [projectAssistFind()](/code/functions/projectAssistFind.md), [projectAssistMoney()](/code/functions/projectAssistMoney.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md), [projectBudgetReady()](/code/functions/projectBudgetReady.md)

*Nothing calls this function by name.*

