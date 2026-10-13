# awcSetSetting()

Remember a value; best-effort, because losing it only costs one lookup.

```php
function awcSetSetting(PDO $conn, string $key, string $value): void
```

Defined in [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md), line 258.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$key` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 262 | `awcSetSetting` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Called from

- [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) - in [awcEnsureCategory()](/code/functions/awcEnsureCategory.md), [awcAdoptExistingCategory()](/code/functions/awcAdoptExistingCategory.md)

