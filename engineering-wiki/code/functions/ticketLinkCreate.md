# ticketLinkCreate()

Create a link. `$uiRelation` is one of related|duplicate_of|parent_of|child_of, expressed from `$sourceId`'s perspective. Returns ['success'=>bool, 'error'=>?].

```php
function ticketLinkCreate(
    PDO $conn,
    int $analystId,
    int $sourceId,
    int $targetId,
    string $uiRelation
): array
```

Defined in [includes/ticket_links.php](/code/files/includes/ticket_links.php.md), line 54.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$sourceId` | `int` |  |  |
| `$targetId` | `int` |  |  |
| `$uiRelation` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 101 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 110 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 117 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 127 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 137 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 144 | `ticketLinkCreate` | **insert** [ticket_links](/code/tables/ticket_links.md) (`source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime`) |  |

## Calls

[analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [ticketLinkAudit()](/code/functions/ticketLinkAudit.md), [ticketLinkLoad()](/code/functions/ticketLinkLoad.md), [ticketLinkNum()](/code/functions/ticketLinkNum.md)

## Called from

- [api/tickets/create_ticket_link.php](/code/files/api/tickets/create_ticket_link.php.md)

