# rpTicketsKpis()

Tickets block: KPI tiles - created, closed, open at the end of the period, average time to close and first-time-fix rate.

```php
function rpTicketsKpis(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 178.

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
| 182 | `rpTicketsKpis` | read [tickets](/code/tables/tickets.md) |  |
| 191 | `rpTicketsKpis` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[rpFmtDate()](/code/functions/rpFmtDate.md), [rpHumanDuration()](/code/functions/rpHumanDuration.md), [rpTicketWhere()](/code/functions/rpTicketWhere.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

