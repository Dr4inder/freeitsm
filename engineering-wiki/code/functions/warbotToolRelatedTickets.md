# warbotToolRelatedTickets()

```php
function warbotToolRelatedTickets(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 832.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 838 | `warbotToolRelatedTickets` | read [tickets](/code/tables/tickets.md) |  |
| 846 | `warbotToolRelatedTickets` | read [ticket_links](/code/tables/ticket_links.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## Calls

[ticketAiSubjectSql()](/code/functions/ticketAiSubjectSql.md)

*Nothing calls this function by name.*

