# projectSettingWrite()

```php
function projectSettingWrite(PDO $conn, string $key, string $value): void
```

Defined in [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), line 176.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 179 | `projectSettingWrite` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`, `updated_datetime`) |  |

## Called from

- [api/projects/settings.php](/code/files/api/projects/settings.php.md)
- [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md) - in `ProjectTemplatesService::setBuiltinHidden`

