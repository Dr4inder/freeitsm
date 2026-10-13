# rpSoftwareKpis()

Software block: KPI tiles - applications, machines and installs in the inventory, and licence renewals in the period.

```php
function rpSoftwareKpis(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md), line 62.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 65 | `rpSoftwareKpis` | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 70 | `rpSoftwareKpis` | read [software_licences](/code/tables/software_licences.md) |  |

## Calls

[rpSoftwareScope()](/code/functions/rpSoftwareScope.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

