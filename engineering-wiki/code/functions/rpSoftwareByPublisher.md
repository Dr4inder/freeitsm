# rpSoftwareByPublisher()

Software block: a chart of how many machines have software from each publisher. A snapshot of today.

```php
function rpSoftwareByPublisher(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md), line 24.

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
| 27 | `rpSoftwareByPublisher` | read [software_inventory_apps](/code/tables/software_inventory_apps.md), read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |

## Calls

[rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpSoftwareScope()](/code/functions/rpSoftwareScope.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

