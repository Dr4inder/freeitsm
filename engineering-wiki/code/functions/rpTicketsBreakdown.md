# rpTicketsBreakdown()

```php
function rpTicketsBreakdown(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 59.

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
| 64 | `rpTicketsBreakdown` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[rpChartFromRows()](/code/functions/rpChartFromRows.md), [rpTicketWhere()](/code/functions/rpTicketWhere.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

