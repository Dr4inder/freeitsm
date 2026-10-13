# ssoBail()

> [!NOTE]
> Defined in 2 places (each behind a function_exists() check, or in files never loaded together): [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md), [api/auth/oidc_login.php](/code/files/api/auth/oidc_login.php.md)

Bounce back to the originating portal's login page with an error message.

```php
function ssoBail(string $msg): void
```

Defined in [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md), line 23.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$msg` | `string` |  |  |

**Returns:** `void`

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md) - in [completeSelfServiceSso()](/code/functions/completeSelfServiceSso.md)
- [api/auth/oidc_login.php](/code/files/api/auth/oidc_login.php.md)

