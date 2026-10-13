# leaseScheduleSave()

Create or update a schedule. `$in`: id? | lease_id, name, reference, start_date, end_date, cost, cost_period, currency, order_number, notes.

```php
function leaseScheduleSave(PDO $conn, ActorContext $ctx, array $in): int
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 386.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 420 | `leaseScheduleSave` | read [lease_assets](/code/tables/lease_assets.md) |  |
| 430 | `leaseScheduleSave` | **update** [lease_schedules](/code/tables/lease_schedules.md) (`name`, `reference`, `start_date`, `end_date`, `cost`, `cost_period`, `currency`, `order_number`, `notes`) |  |
| 438 | `leaseScheduleSave` | read [lease_schedules](/code/tables/lease_schedules.md) |  |
| 441 | `leaseScheduleSave` | read [lease_schedules](/code/tables/lease_schedules.md) |  |
| 445 | `leaseScheduleSave` | **insert** [lease_schedules](/code/tables/lease_schedules.md) (`lease_id`, `name`, `reference`, `start_date`, `end_date`, `cost`, `cost_period`, `currency`, `order_number`, `notes`, `display_order`) |  |

## Calls

[leaseDate()](/code/functions/leaseDate.md), [leaseLoad()](/code/functions/leaseLoad.md), [leaseLoadSchedule()](/code/functions/leaseLoadSchedule.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md), [leaseSyncSchedule()](/code/functions/leaseSyncSchedule.md), [leaseText()](/code/functions/leaseText.md)

## Called from

- [api/assets/leases/schedule_save.php](/code/files/api/assets/leases/schedule_save.php.md)

