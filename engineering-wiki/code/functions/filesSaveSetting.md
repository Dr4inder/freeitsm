# filesSaveSetting()

Saves one Files setting to system_settings (insert or update).

```php
function filesSaveSetting(PDO $conn, string $key, ?string $value): void
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 38.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |
| `$value` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 40 | `filesSaveSetting` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Called from

- [api/files/settings.php](/code/files/api/files/settings.php.md)

