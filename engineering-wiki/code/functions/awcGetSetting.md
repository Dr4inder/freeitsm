# awcGetSetting()

Reads one system_settings value, returning `$default` when it is missing, empty or unreadable.

```php
function awcGetSetting(PDO $conn, string $key, string $default): string
```

Defined in [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md), line 269.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$default` | `string` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 272 | `awcGetSetting` | read [system_settings](/code/tables/system_settings.md) |  |

## Called from

- [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) - in [syncAssetWarrantyCalendar()](/code/functions/syncAssetWarrantyCalendar.md), [awcEnsureCategory()](/code/functions/awcEnsureCategory.md), [awcAdoptExistingCategory()](/code/functions/awcAdoptExistingCategory.md)
- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)
- [includes/software_licence_calendar.php](/code/files/includes/software_licence_calendar.php.md) - in [syncSoftwareLicenceCalendar()](/code/functions/syncSoftwareLicenceCalendar.md)

