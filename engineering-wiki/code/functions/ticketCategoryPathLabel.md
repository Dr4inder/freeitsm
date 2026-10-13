# ticketCategoryPathLabel()

One category's full path, for display next to a ticket.

Resolves against the WHOLE table rather than a company's visible list, and
ignores is_active — a closed ticket must still render the label it was closed
with, even after that category has been retired or hidden from a company.

```php
function ticketCategoryPathLabel(PDO $conn, ?int $categoryId): ?string
```

Defined in [includes/ticket_categories.php](/code/files/includes/ticket_categories.php.md), line 199.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$categoryId` | `?int` |  |  |

**Returns:** ?string null when the id is unknown

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 209 | `ticketCategoryPathLabel` | read [ticket_categories](/code/tables/ticket_categories.md) |  |

## Called from

- [includes/services/tickets.php](/code/files/includes/services/tickets.php.md) - in `TicketsService::updateTicket`

