# ticketResolutionCodeName()

One resolution code's name, ignoring is_active.

Same reasoning as ticketCategoryPathLabel: a closed ticket keeps the label it
was closed with, whatever has happened to the list since.

```php
function ticketResolutionCodeName(PDO $conn, ?int $codeId): ?string
```

Defined in [includes/ticket_categories.php](/code/files/includes/ticket_categories.php.md), line 343.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$codeId` | `?int` |  |  |

**Returns:** `?string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 349 | `ticketResolutionCodeName` | read [ticket_resolution_codes](/code/tables/ticket_resolution_codes.md) |  |

## Called from

- [includes/services/tickets.php](/code/files/includes/services/tickets.php.md) - in `TicketsService::updateTicket`

