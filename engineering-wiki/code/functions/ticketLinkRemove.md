# ticketLinkRemove()

Remove a link by id.

```php
function ticketLinkRemove(PDO $conn, int $analystId, int $linkId): array
```

Defined in [includes/ticket_links.php](/code/files/includes/ticket_links.php.md), line 159.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$linkId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 161 | `ticketLinkRemove` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 174 | `ticketLinkRemove` | **delete** [ticket_links](/code/tables/ticket_links.md) |  |

## Calls

[analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [ticketLinkAudit()](/code/functions/ticketLinkAudit.md), [ticketLinkNum()](/code/functions/ticketLinkNum.md)

## Called from

- [api/tickets/delete_ticket_link.php](/code/files/api/tickets/delete_ticket_link.php.md)

