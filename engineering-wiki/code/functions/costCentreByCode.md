# costCentreByCode()

A cost centre of company `$tenantId` by its CODE (ignoring case), or null.

```php
function costCentreByCode(PDO $conn, int $tenantId, string $code): ?array
```

Defined in [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), line 86.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$code` | `string` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 90 | `costCentreByCode` | read [cost_centres](/code/tables/cost_centres.md) |  |

## Called from

- [includes/services/asset_import.php](/code/files/includes/services/asset_import.php.md) - in `AssetImportService::resolveLookups`
- [includes/services/contracts.php](/code/files/includes/services/contracts.php.md) - in `ContractsService::costCentreFor`

