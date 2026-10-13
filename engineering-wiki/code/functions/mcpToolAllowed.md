# mcpToolAllowed()

May this key run this tool? (permission is checked once, by the endpoint)

```php
function mcpToolAllowed(PDO $conn, array $apiKey, array $t): bool
```

Defined in [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), line 163.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$t` | `array` |  |  |

**Returns:** `bool`

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [analystHasCapability()](/code/functions/analystHasCapability.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md) - in [mcpToolsFor()](/code/functions/mcpToolsFor.md), [mcpRunTool()](/code/functions/mcpRunTool.md)

