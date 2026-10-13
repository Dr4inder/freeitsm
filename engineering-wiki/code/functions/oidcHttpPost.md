# oidcHttpPost()

POSTs form fields to an OIDC endpoint and returns the body whatever the status, so the caller can read an error reply.

Throws only on a network error.

```php
function oidcHttpPost(string $url, array $fields): string
```

Defined in [includes/oidc.php](/code/files/includes/oidc.php.md), line 235.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$fields` | `array` |  |  |

**Returns:** `string`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/oidc.php](/code/files/includes/oidc.php.md) - in [oidcExchangeCode()](/code/functions/oidcExchangeCode.md)

