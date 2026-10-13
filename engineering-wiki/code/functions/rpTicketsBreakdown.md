# rpTicketsBreakdown()

Tickets block: a chart of tickets grouped by the chosen dimension (status, priority, category...).

```php
function rpTicketsBreakdown(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 60.

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
| 65 | `rpTicketsBreakdown` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpTicketWhere()](/code/functions/rpTicketWhere.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

