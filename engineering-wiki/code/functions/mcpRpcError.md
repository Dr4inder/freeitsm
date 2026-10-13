# mcpRpcError()

Sends a JSON-RPC 2.0 error response (code and message) for request `$id` with HTTP 200, as JSON-RPC expects, then stops.

```php
function mcpRpcError($id, int $code, string $message): void
```

Defined in [api/mcp/index.php](/code/files/api/mcp/index.php.md), line 61.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$id` |  |  |  |
| `$code` | `int` |  |  |
| `$message` | `string` |  |  |

**Returns:** `void`

## Calls

[mcpReply()](/code/functions/mcpReply.md)

## Called from

- [api/mcp/index.php](/code/files/api/mcp/index.php.md)

