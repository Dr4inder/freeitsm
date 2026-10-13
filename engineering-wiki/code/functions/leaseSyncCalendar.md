# leaseSyncCalendar()

```php
function leaseSyncCalendar(PDO $conn): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 735.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 741 | `leaseSyncCalendar` | **delete** [calendar_events](/code/tables/calendar_events.md) |  |
| 745 | `leaseSyncCalendar` | read [lease_schedules](/code/tables/lease_schedules.md), read [leases](/code/tables/leases.md), read [lease_assets](/code/tables/lease_assets.md), read [lease_outcomes](/code/tables/lease_outcomes.md) |  |
| 754 | `leaseSyncCalendar` | **insert** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `created_by`, `source`) |  |
| 760 | `leaseSyncCalendar` | read [assets](/code/tables/assets.md) |  |

## Calls

[awcColumnExists()](/code/functions/awcColumnExists.md), [awcEnsureCategory()](/code/functions/awcEnsureCategory.md), [awcGetSetting()](/code/functions/awcGetSetting.md), [leaseActiveSql()](/code/functions/leaseActiveSql.md), [leaseReady()](/code/functions/leaseReady.md)

## Called from

- [api/assets/save_lease_outcome.php](/code/files/api/assets/save_lease_outcome.php.md)
- [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) - in [syncAssetWarrantyCalendar()](/code/functions/syncAssetWarrantyCalendar.md)
- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseSave()](/code/functions/leaseSave.md), [leaseDelete()](/code/functions/leaseDelete.md), [leaseScheduleSave()](/code/functions/leaseScheduleSave.md), [leaseScheduleDelete()](/code/functions/leaseScheduleDelete.md), [leaseAssetsAdd()](/code/functions/leaseAssetsAdd.md), [leaseAssetDatesEdited()](/code/functions/leaseAssetDatesEdited.md)

