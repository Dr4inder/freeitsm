# rpIntuneBreakdown()

```php
function rpIntuneBreakdown(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_assets.php](/code/files/includes/report_packs/blocks_assets.php.md), line 94.

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
| 97 | `rpIntuneBreakdown` | read [intune_devices](/code/tables/intune_devices.md) |  |

## Calls

[rpChartFromRows()](/code/functions/rpChartFromRows.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

