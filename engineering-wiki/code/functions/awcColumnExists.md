# awcColumnExists()

```php
function awcColumnExists(PDO $conn, string $table, string $col): bool
```

Defined in [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md), line 273.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |
| `$col` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) - in [syncAssetWarrantyCalendar()](/code/functions/syncAssetWarrantyCalendar.md)
- [includes/domains/calendar.php](/code/files/includes/domains/calendar.php.md) - in [domainSyncExpiryCalendar()](/code/functions/domainSyncExpiryCalendar.md)
- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)
- [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md) - in [projectSyncCalendar()](/code/functions/projectSyncCalendar.md)
- [includes/software_licence_calendar.php](/code/files/includes/software_licence_calendar.php.md) - in [syncSoftwareLicenceCalendar()](/code/functions/syncSoftwareLicenceCalendar.md)

