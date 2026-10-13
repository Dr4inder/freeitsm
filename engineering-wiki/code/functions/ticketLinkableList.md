# ticketLinkableList()

Ticket search for the link picker — scoped to the source ticket's company.

```php
function ticketLinkableList(PDO $conn, int $analystId, int $sourceId, string $q): array
```

Defined in [includes/ticket_links.php](/code/files/includes/ticket_links.php.md), line 225.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$sourceId` | `int` |  |  |
| `$q` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 246 | `ticketLinkableList` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## Calls

[analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [ticketLinkLoad()](/code/functions/ticketLinkLoad.md)

## Called from

- [api/tickets/list_linkable_tickets.php](/code/files/api/tickets/list_linkable_tickets.php.md)

