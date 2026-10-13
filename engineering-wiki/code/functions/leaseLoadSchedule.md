# leaseLoadSchedule()

A schedule and its lease, both visible to the analyst. `@return` array{0:array,1:array} [schedule, lease]

```php
function leaseLoadSchedule(PDO $conn, int $analystId, int $scheduleId): array
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 89.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$scheduleId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 91 | `leaseLoadSchedule` | read [lease_schedules](/code/tables/lease_schedules.md) |  |

## Calls

[leaseLoad()](/code/functions/leaseLoad.md)

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseScheduleSave()](/code/functions/leaseScheduleSave.md), [leaseScheduleDelete()](/code/functions/leaseScheduleDelete.md), [leaseAssetsAdd()](/code/functions/leaseAssetsAdd.md), [leaseLoadAssetRow()](/code/functions/leaseLoadAssetRow.md)

