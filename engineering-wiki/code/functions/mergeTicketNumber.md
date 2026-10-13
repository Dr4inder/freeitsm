# mergeTicketNumber()

```php
function mergeTicketNumber(PDO $conn, int $ticketId): string
```

Defined in [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), line 612.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 614 | `mergeTicketNumber` | read [tickets](/code/tables/tickets.md) |  |

## Called from

- [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md) - in [unmergeTicket()](/code/functions/unmergeTicket.md), [mergeOneTicket()](/code/functions/mergeOneTicket.md)

