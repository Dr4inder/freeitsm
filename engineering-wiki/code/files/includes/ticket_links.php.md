# includes/ticket_links.php

> PHP - 253 lines

Ticket-to-ticket linking (issue #38). Self-referential, typed links stored in `ticket_links`. Three stored relation types: 'related' — symmetric (order irrelevant; reciprocal duplicates blocked) 'duplicate' — source is a DUPLICATE OF target (target is the master) 'parent' — source is the PARENT OF target (target is the child)

The UI expresses direction from the acting ticket's point of view with four
choices (related / duplicate_of / parent_of / child_of); we canonicalise to
the three stored types (child_of is stored as the inverse 'parent').

v1 is informational only — links display and are audited, nothing changes
ticket state automatically. Multi-tenancy: links are same-company only.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [ticketLinkLoad()](/code/functions/ticketLinkLoad.md) | 20 | Load the minimal ticket row we need (or null if missing/deleted). |
| [ticketLinkNum()](/code/functions/ticketLinkNum.md) | 28 |  |
| [ticketLinkAudit()](/code/functions/ticketLinkAudit.md) | 35 |  |
| [ticketLinkCreate()](/code/functions/ticketLinkCreate.md) | 47 | Create a link. `$uiRelation` is one of related\|duplicate_of\|parent_of\|child_of, expressed from `$sourceId`'s perspective. Returns ['success'=>bool, 'error'=>?]. |
| [ticketLinkRemove()](/code/functions/ticketLinkRemove.md) | 159 | Remove a link by id. |
| [ticketLinksFor()](/code/functions/ticketLinksFor.md) | 186 | All of a ticket's links, grouped for display from THIS ticket's perspective. Returns parent (0/1), children[], duplicate_of (0/1), duplicates[], related[]. |
| [ticketLinkableList()](/code/functions/ticketLinkableList.md) | 225 | Ticket search for the link picker — scoped to the source ticket's company. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 22 | `ticketLinkLoad` | read [tickets](/code/tables/tickets.md) |  |
| 30 | `ticketLinkNum` | read [tickets](/code/tables/tickets.md) |  |
| 38 | `ticketLinkAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |
| 94 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 103 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 110 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 120 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 130 | `ticketLinkCreate` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 137 | `ticketLinkCreate` | **insert** [ticket_links](/code/tables/ticket_links.md) (`source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime`) |  |
| 161 | `ticketLinkRemove` | read [ticket_links](/code/tables/ticket_links.md) |  |
| 174 | `ticketLinkRemove` | **delete** [ticket_links](/code/tables/ticket_links.md) |  |
| 189 | `ticketLinksFor` | read [ticket_links](/code/tables/ticket_links.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 246 | `ticketLinkableList` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## How it hangs together

**Includes:** [includes/tenancy.php](/code/files/includes/tenancy.php.md)

**Included by:** [api/tickets/create_ticket_link.php](/code/files/api/tickets/create_ticket_link.php.md), [api/tickets/delete_ticket_link.php](/code/files/api/tickets/delete_ticket_link.php.md), [api/tickets/get_email_detail.php](/code/files/api/tickets/get_email_detail.php.md), [api/tickets/list_linkable_tickets.php](/code/files/api/tickets/list_linkable_tickets.php.md)

**Calls:** [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

