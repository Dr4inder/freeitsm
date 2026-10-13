# oidcValidateIdToken()

Validate an ID token: signature (JWKS), issuer, audience, nonce, expiry. Returns the validated claims as an associative array. Throws on any failure.

```php
function oidcValidateIdToken(
    string $idToken,
    array $disco,
    array $provider,
    string $expectedNonce
): array
```

Defined in [includes/oidc.php](/code/files/includes/oidc.php.md), line 175.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$idToken` | `string` |  |  |
| `$disco` | `array` |  |  |
| `$provider` | `array` |  |  |
| `$expectedNonce` | `string` |  |  |

**Returns:** `array`

## Calls

[oidcHttpGet()](/code/functions/oidcHttpGet.md)

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md)

