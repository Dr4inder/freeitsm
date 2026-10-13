# leaseScheduleDelete()

Delete a schedule and its asset rows (the assets keep their dates). The last schedule cannot go.

```php
function leaseScheduleDelete(PDO $conn, ActorContext $ctx, int $id): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 460.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 463 | `leaseScheduleDelete` | read [lease_schedules](/code/tables/lease_schedules.md) |  |
| 468 | `leaseScheduleDelete` | **delete** [lease_schedules](/code/tables/lease_schedules.md) |  |

## Calls

[leaseLoadSchedule()](/code/functions/leaseLoadSchedule.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)

## Called from

- [api/assets/leases/schedule_delete.php](/code/files/api/assets/leases/schedule_delete.php.md)

