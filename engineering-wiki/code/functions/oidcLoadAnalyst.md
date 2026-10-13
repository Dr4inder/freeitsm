# oidcLoadAnalyst()

Loads one analyst row by id, or null when there is none.

```php
function oidcLoadAnalyst(PDO $conn, int $id): ?array
```

Defined in [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md), line 321.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 322 | `oidcLoadAnalyst` | read [analysts](/code/tables/analysts.md) |  |

## Called from

- [api/auth/oidc_callback.php](/code/files/api/auth/oidc_callback.php.md)

