# leaseSyncAsset()

Write the effective dates onto the asset (audited, through AssetsService).

```php
function leaseSyncAsset(PDO $conn, ActorContext $ctx, int $assetId): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 611.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$assetId` | `int` |  |  |

**Returns:** `void`

## Calls

[leaseActiveRowForAsset()](/code/functions/leaseActiveRowForAsset.md)

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseAssetsAdd()](/code/functions/leaseAssetsAdd.md), [leaseAssetUpdate()](/code/functions/leaseAssetUpdate.md), [leaseSyncSchedule()](/code/functions/leaseSyncSchedule.md)

