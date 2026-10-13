# csrfRefuse()

Refuse, in the shape the caller expects: JSON for the API, a short page for a form post.

```php
function csrfRefuse(string $why): void
```

Defined in [includes/csrf.php](/code/files/includes/csrf.php.md), line 203.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$why` | `string` |  |  |

**Returns:** `void`

## Calls

[csrfRequestPath()](/code/functions/csrfRequestPath.md)

## Called from

- [includes/csrf.php](/code/files/includes/csrf.php.md) - in [csrfEnforce()](/code/functions/csrfEnforce.md), [csrfRequireToken()](/code/functions/csrfRequireToken.md)

