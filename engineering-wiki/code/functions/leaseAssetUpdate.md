# leaseAssetUpdate()

Change one asset on a schedule: outcome_id, outcome_date, start_date / end_date (its own dates - blank = the schedule's), notes. Moving it to a CLOSED outcome stamps today as the outcome date if none is given.

```php
function leaseAssetUpdate(PDO $conn, ActorContext $ctx, int $id, array $in): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 533.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 542 | `leaseAssetUpdate` | read [lease_outcomes](/code/tables/lease_outcomes.md) |  |
| 563 | `leaseAssetUpdate` | read [lease_outcomes](/code/tables/lease_outcomes.md) |  |
| 566 | `leaseAssetUpdate` | read [lease_assets](/code/tables/lease_assets.md), read [lease_outcomes](/code/tables/lease_outcomes.md) |  |
| 571 | `leaseAssetUpdate` | **update** [lease_assets](/code/tables/lease_assets.md) (`outcome_id`, `start_date`, `end_date`, `outcome_date`, `notes`, `updated_datetime`) |  |

## Calls

[leaseActiveSql()](/code/functions/leaseActiveSql.md), [leaseDate()](/code/functions/leaseDate.md), [leaseLoadAssetRow()](/code/functions/leaseLoadAssetRow.md), [leaseSyncAllCalendar()](/code/functions/leaseSyncAllCalendar.md), [leaseSyncAsset()](/code/functions/leaseSyncAsset.md), [leaseText()](/code/functions/leaseText.md)

## Called from

- [api/assets/leases/asset_update.php](/code/files/api/assets/leases/asset_update.php.md)

