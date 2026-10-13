# leaseLoadAssetRow()

Load a lease_assets row the actor may touch. `@return` array{0:array,1:array,2:array} [row, schedule, lease]

```php
function leaseLoadAssetRow(PDO $conn, int $analystId, int $id): array
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 518.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$id` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 520 | `leaseLoadAssetRow` | read [lease_assets](/code/tables/lease_assets.md) |  |

## Calls

[leaseLoadSchedule()](/code/functions/leaseLoadSchedule.md)

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseAssetUpdate()](/code/functions/leaseAssetUpdate.md), [leaseAssetRemove()](/code/functions/leaseAssetRemove.md)

