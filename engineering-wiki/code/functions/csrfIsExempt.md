# csrfIsExempt()

True when the path is on CSRF_EXEMPT_PATHS - an exact file, or anything under an entry ending in '/'.

```php
function csrfIsExempt(string $path): bool
```

Defined in [includes/csrf.php](/code/files/includes/csrf.php.md), line 74.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/csrf.php](/code/files/includes/csrf.php.md) - in [csrfEnforce()](/code/functions/csrfEnforce.md)

