# filesSavePref()

Saves one of the analyst's own Files preferences (insert or update).

```php
function filesSavePref(PDO $conn, int $analystId, string $key, string $value): void
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 135.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$key` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `void`

**Writes:** user_preferences(preference_value) - per-analyst choices such as the view

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 137 | `filesSavePref` | **insert** [user_preferences](/code/tables/user_preferences.md) (`analyst_id`, `preference_key`, `preference_value`, `updated_datetime`) |  |

## Called from

- [api/files/prefs.php](/code/files/api/files/prefs.php.md)

