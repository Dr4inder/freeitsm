# leaseSyncSchedule()

Every active asset on a schedule, after its dates change.

```php
function leaseSyncSchedule(PDO $conn, ActorContext $ctx, int $scheduleId): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 623.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$scheduleId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 626 | `leaseSyncSchedule` | read [lease_assets](/code/tables/lease_assets.md), read [lease_outcomes](/code/tables/lease_outcomes.md) |  |

## Calls

[leaseActiveSql()](/code/functions/leaseActiveSql.md), [leaseSyncAsset()](/code/functions/leaseSyncAsset.md)

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseScheduleSave()](/code/functions/leaseScheduleSave.md)

