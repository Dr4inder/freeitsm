# costCentreOptions()

What a picker offers for a record in company `$tenantId`: its active cost centres, plus `$keepId` when that is the record's current one and inactive.

```php
function costCentreOptions(PDO $conn, int $tenantId, ?int $keepId = null): array
```

Defined in [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), line 47.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `int` |  |  |
| `$keepId` | `?int` | `null` |  |

**Returns:** array<int,array{id:int,code:string,name:string,is_active:bool}>

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 50 | `costCentreOptions` | read [cost_centres](/code/tables/cost_centres.md) |  |

## Called from

- [api/assets/leases/options.php](/code/files/api/assets/leases/options.php.md)
- [api/cost-centres/options.php](/code/files/api/cost-centres/options.php.md)

