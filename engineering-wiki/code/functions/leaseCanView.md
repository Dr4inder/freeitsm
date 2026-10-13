# leaseCanView()

True when the lease is in a company the analyst may read.

```php
function leaseCanView(PDO $conn, int $analystId, int $leaseId): bool
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 63.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$leaseId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 66 | `leaseCanView` | read [leases](/code/tables/leases.md) |  |

## Calls

[leaseVisibilitySql()](/code/functions/leaseVisibilitySql.md)

## Called from

- [asset-management/leases/view.php](/code/files/asset-management/leases/view.php.md)
- [includes/documents.php](/code/files/includes/documents.php.md) - in [documentEntityRegistry()](/code/functions/documentEntityRegistry.md)

