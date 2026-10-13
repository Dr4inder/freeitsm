# rpStatusKpis()

Service status block: KPI tiles - average uptime, incidents open during the period, services affected and total downtime.

```php
function rpStatusKpis(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_status.php](/code/files/includes/report_packs/blocks_status.php.md), line 230.

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
| 240 | `rpStatusKpis` | read [status_incidents](/code/tables/status_incidents.md) |  |

## Calls

[rpHumanDuration()](/code/functions/rpHumanDuration.md), [rpPercent()](/code/functions/rpPercent.md), [rpStatusServices()](/code/functions/rpStatusServices.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

