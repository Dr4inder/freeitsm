# oversizeCleanAddresses()

"a@x.com; b@y.com, junk" -> "a@x.com, b@y.com" - valid addresses only.

```php
function oversizeCleanAddresses(string $raw): string
```

Defined in [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md), line 126.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

**Returns:** `string`

## Called from

- [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md) - in [oversizeNormalisePolicy()](/code/functions/oversizeNormalisePolicy.md)

