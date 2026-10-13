# oidcExchangeCode()

Exchange the authorization code for tokens at the token endpoint (server-to-server back-channel). Returns the decoded token response. Throws on HTTP / provider error.

```php
function oidcExchangeCode(array $provider, array $disco, string $code, string $codeVerifier): array
```

Defined in [includes/oidc.php](/code/files/includes/oidc.php.md), line 145.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$provider` | `array` |  |  |
| `$disco` | `array` |  |  |
| `$code` | `string` |  |  |
| `$codeVerifier` | `string` |  |  |

**Returns:** `array`

## Calls

[oidcHttpPost()](/code/functions/oidcHttpPost.md), [oidcRedirectUri()](/code/functions/oidcRedirectUri.md)

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md)

