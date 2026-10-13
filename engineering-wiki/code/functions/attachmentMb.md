# attachmentMb()

A whole number of MB from a setting, clamped to something sane (0 allowed only where it means "no limit").

```php
function attachmentMb($v, int $default, bool $zeroMeansNone): int
```

Defined in [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md), line 58.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$default` | `int` |  |  |
| `$zeroMeansNone` | `bool` |  |  |

**Returns:** `int`

## Called from

- [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md) - in [attachmentMaxBytes()](/code/functions/attachmentMaxBytes.md), [oversizeRules()](/code/functions/oversizeRules.md), [oversizeNormalisePolicy()](/code/functions/oversizeNormalisePolicy.md)

