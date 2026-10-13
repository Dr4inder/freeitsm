# rpSoftwareKpis()

```php
function rpSoftwareKpis(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md), line 56.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 59 | `rpSoftwareKpis` | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 64 | `rpSoftwareKpis` | read [software_licences](/code/tables/software_licences.md) |  |

## Calls

[rpSoftwareScope()](/code/functions/rpSoftwareScope.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

