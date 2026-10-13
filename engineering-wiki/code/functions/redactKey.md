# redactKey()

Replace the key wherever it appears with its hint.

```php
function redactKey(string $s, string $key): string
```

Defined in [api/system/debug-tools/D014_ai_connections.php](/code/files/api/system/debug-tools/D014_ai_connections.php.md), line 70.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `string` |  |  |
| `$key` | `string` |  |  |

**Returns:** `string`

## Calls

[keyHint()](/code/functions/keyHint.md)

## Called from

- [api/system/debug-tools/D014_ai_connections.php](/code/files/api/system/debug-tools/D014_ai_connections.php.md) - in [traceLines()](/code/functions/traceLines.md)

