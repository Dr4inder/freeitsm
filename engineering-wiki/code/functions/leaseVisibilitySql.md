# leaseVisibilitySql()

" AND (...)" - leases in any company this analyst can reach. For links, the asset panel, documents.

```php
function leaseVisibilitySql(PDO $conn, int $analystId, string $l = 'l'): array
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 49.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$l` | `string` | `'l'` |  |

**Returns:** `array`

## Calls

[allAccessibleTenantsFilter()](/code/functions/allAccessibleTenantsFilter.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseCanView()](/code/functions/leaseCanView.md), [leaseLoad()](/code/functions/leaseLoad.md), [leaseHistoryForAsset()](/code/functions/leaseHistoryForAsset.md)

