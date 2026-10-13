# rpTicketsList()

Tickets block: a table of the tickets in the period, with the columns the block asks for, up to its limit.

```php
function rpTicketsList(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 212.

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
| 215 | `rpTicketsList` | read [tickets](/code/tables/tickets.md) |  |
| 219 | `rpTicketsList` | read [analysts](/code/tables/analysts.md), read [ticket_categories](/code/tables/ticket_categories.md) |  |

## Calls

[rpFmtDateTime()](/code/functions/rpFmtDateTime.md), [rpTicketWhere()](/code/functions/rpTicketWhere.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

