# mcpReply()

Sends an HTTP status and, when given, a JSON body, then stops.

```php
function mcpReply(int $status, ?array $body = null): void
```

Defined in [api/mcp/index.php](/code/files/api/mcp/index.php.md), line 46.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$status` | `int` |  |  |
| `$body` | `?array` | `null` |  |

**Returns:** `void`

## Called from

- [api/mcp/index.php](/code/files/api/mcp/index.php.md) - in [mcpResult()](/code/functions/mcpResult.md), [mcpRpcError()](/code/functions/mcpRpcError.md)

