# portalPrefSet()

Store one preference. Returns false if it could not be stored — the caller decides whether that is worth telling anybody, and for a layout toggle it is not: the layout still changed, only the memory of it failed.

```php
function portalPrefSet(PDO $conn, int $userId, string $key, string $value): bool
```

Defined in [includes/portal_preferences.php](/code/files/includes/portal_preferences.php.md), line 50.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$userId` | `int` |  |  |
| `$key` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 57 | `portalPrefSet` | read [portal_user_preferences](/code/tables/portal_user_preferences.md) |  |
| 62 | `portalPrefSet` | **update** [portal_user_preferences](/code/tables/portal_user_preferences.md) (`preference_value`, `updated_datetime`) |  |
| 66 | `portalPrefSet` | **insert** [portal_user_preferences](/code/tables/portal_user_preferences.md) (`user_id`, `preference_key`, `preference_value`, `updated_datetime`) |  |

## Called from

- [api/self-service/preference.php](/code/files/api/self-service/preference.php.md)

