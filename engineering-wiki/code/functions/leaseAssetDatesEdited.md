# leaseAssetDatesEdited()

Called by AssetsService after an asset's lease_start / lease_expiry change. On an asset that is out on lease, the asset's dates become its OWN dates on the schedule (blank when they match the schedule). Never writes the asset, so it cannot loop with `leaseSyncAsset()`.

```php
function leaseAssetDatesEdited(PDO $conn, int $assetId): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 637.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$assetId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 641 | `leaseAssetDatesEdited` | read [assets](/code/tables/assets.md) |  |
| 648 | `leaseAssetDatesEdited` | **update** [lease_assets](/code/tables/lease_assets.md) (`start_date`, `end_date`, `updated_datetime`) |  |

## Calls

[leaseActiveRowForAsset()](/code/functions/leaseActiveRowForAsset.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)

## Called from

- [includes/services/assets.php](/code/files/includes/services/assets.php.md) - in `AssetsService::updateFields`

