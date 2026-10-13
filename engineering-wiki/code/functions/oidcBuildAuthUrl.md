# oidcBuildAuthUrl()

Build the authorization URL to redirect the user's browser to.

```php
function oidcBuildAuthUrl(
    array $provider,
    array $disco,
    string $state,
    string $nonce,
    string $codeChallenge
): string
```

Defined in [includes/oidc.php](/code/files/includes/oidc.php.md), line 126.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$provider` | `array` |  |  |
| `$disco` | `array` |  |  |
| `$state` | `string` |  |  |
| `$nonce` | `string` |  |  |
| `$codeChallenge` | `string` |  |  |

**Returns:** `string`

## Calls

[oidcRedirectUri()](/code/functions/oidcRedirectUri.md)

## Called from

- [api/auth/oidc_login.php](/code/files/api/auth/oidc_login.php.md)

