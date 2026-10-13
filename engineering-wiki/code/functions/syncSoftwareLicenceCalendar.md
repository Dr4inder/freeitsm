# syncSoftwareLicenceCalendar()

```php
function syncSoftwareLicenceCalendar(PDO $conn): array
```

Defined in [includes/software_licence_calendar.php](/code/files/includes/software_licence_calendar.php.md), line 41.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** array{success:bool, synced?:int, error?:string}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 54 | `syncSoftwareLicenceCalendar` | **delete** [calendar_events](/code/tables/calendar_events.md) |  |
| 66 | `syncSoftwareLicenceCalendar` | read [software_licences](/code/tables/software_licences.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 78 | `syncSoftwareLicenceCalendar` | **insert** [calendar_events](/code/tables/calendar_events.md) (`title`, `description`, `category_id`, `start_datetime`, `end_datetime`, `all_day`, `created_by`, `source`) |  |

## Calls

[awcColumnExists()](/code/functions/awcColumnExists.md), [awcGetSetting()](/code/functions/awcGetSetting.md), [slcEnsureRenewalCategory()](/code/functions/slcEnsureRenewalCategory.md)

## Called from

- [api/software/sync_renewal_calendar.php](/code/files/api/software/sync_renewal_calendar.php.md)
- [includes/services/software.php](/code/files/includes/services/software.php.md) - in `SoftwareService::resyncRenewalCalendar`

