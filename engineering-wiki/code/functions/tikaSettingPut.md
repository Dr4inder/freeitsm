# tikaSettingPut()

Write one system_settings row.

```php
function tikaSettingPut(PDO $conn, string $key, string $value): void
```

Defined in [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md), line 24.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 26 | `tikaSettingPut` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Called from

- [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md)

