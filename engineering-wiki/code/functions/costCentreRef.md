# costCentreRef()

{id, code, name} for display and the API, or null.

```php
function costCentreRef(PDO $conn, $id): ?array
```

Defined in [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), line 97.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` |  |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 100 | `costCentreRef` | read [cost_centres](/code/tables/cost_centres.md) |  |

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseGet()](/code/functions/leaseGet.md)
- [includes/services/assets.php](/code/files/includes/services/assets.php.md) - in `AssetsService::auditDisplay`

