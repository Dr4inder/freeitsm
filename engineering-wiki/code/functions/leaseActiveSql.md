# leaseActiveSql()

SQL: this lease_assets row (alias `$la`, outcome alias `$lo`) is still out on lease.

```php
function leaseActiveSql(string $la = 'la', string $lo = 'lo'): string
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 98.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$la` | `string` | `'la'` |  |
| `$lo` | `string` | `'lo'` |  |

**Returns:** `string`

## Called from

- [api/assets/leases/asset_search.php](/code/files/api/assets/leases/asset_search.php.md)
- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseGoneBackSql()](/code/functions/leaseGoneBackSql.md), [leaseList()](/code/functions/leaseList.md), [leaseAssetsAdd()](/code/functions/leaseAssetsAdd.md), [leaseAssetUpdate()](/code/functions/leaseAssetUpdate.md), [leaseActiveRowForAsset()](/code/functions/leaseActiveRowForAsset.md), [leaseSyncSchedule()](/code/functions/leaseSyncSchedule.md), [leaseHistoryForAsset()](/code/functions/leaseHistoryForAsset.md), [leaseDueBack()](/code/functions/leaseDueBack.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)
- [includes/services/assets.php](/code/files/includes/services/assets.php.md) - in `AssetsService::moveToCompany`

