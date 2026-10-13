# mcpRunTool()

tools/call. Returns [text, isError]. An unknown or forbidden tool is null - the endpoint answers that as a protocol error, not as tool output.

```php
function mcpRunTool(PDO $conn, array $apiKey, string $name, array $args): ?array
```

Defined in [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md), line 194.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$apiKey` | `array` |  |  |
| `$name` | `string` |  |  |
| `$args` | `array` |  |  |

**Returns:** `?array`

## Calls

[mcpToolAllowed()](/code/functions/mcpToolAllowed.md), [mcpTools()](/code/functions/mcpTools.md)

## Called from

- [api/mcp/index.php](/code/files/api/mcp/index.php.md)

