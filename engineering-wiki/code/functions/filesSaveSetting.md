# filesSaveSetting()

```php
function filesSaveSetting(PDO $conn, string $key, ?string $value): void
```

Defined in [includes/files/storage.php](/code/files/includes/files/storage.php.md), line 36.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$value` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `filesSaveSetting` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Called from

- [api/files/settings.php](/code/files/api/files/settings.php.md)

