# rpAssetsBreakdown()

Assets block: a chart of how many assets there are, grouped by the chosen dimension. A snapshot of today, not the period.

```php
function rpAssetsBreakdown(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_assets.php](/code/files/includes/report_packs/blocks_assets.php.md), line 35.

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
| 39 | `rpAssetsBreakdown` | read [assets](/code/tables/assets.md) |  |

## Calls

[rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpTenantClause()](/code/functions/rpTenantClause.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

