# syncAssetWarrantyCalendar()

```php
function syncAssetWarrantyCalendar(PDO $conn): array
```

Defined in [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md), line 30.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** array{success:bool, synced?:int, error?:string}

## Calls

[awcColumnExists()](/code/functions/awcColumnExists.md), [awcGetSetting()](/code/functions/awcGetSetting.md), [awcSyncKind()](/code/functions/awcSyncKind.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)

## Called from

- [api/assets/sync_warranty_calendar.php](/code/files/api/assets/sync_warranty_calendar.php.md)
- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseSyncAllCalendar()](/code/functions/leaseSyncAllCalendar.md)
- [includes/services/assets.php](/code/files/includes/services/assets.php.md) - in `AssetsService::syncWarranty`

