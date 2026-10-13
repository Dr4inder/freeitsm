# prettyBody()

JSON pretty-printed for reading; anything else as it came, trimmed to a length.

```php
function prettyBody(?string $s, int $max = 4000): string
```

Defined in [api/system/debug-tools/D014_ai_connections.php](/code/files/api/system/debug-tools/D014_ai_connections.php.md), line 74.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `?string` |  |  |
| `$max` | `int` | `4000` |  |

**Returns:** `string`

## Called from

- [api/system/debug-tools/D014_ai_connections.php](/code/files/api/system/debug-tools/D014_ai_connections.php.md) - in [traceLines()](/code/functions/traceLines.md)

