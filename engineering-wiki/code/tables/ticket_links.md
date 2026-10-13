# ticket_links

Ticket-to-ticket links (self-referential, typed): related / duplicate / parent.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `source_ticket_id` | `INT NOT NULL` |  |
| `target_ticket_id` | `INT NOT NULL` |  |
| `relation_type` | `VARCHAR(20) NOT NULL DEFAULT 'related'` |  |
| `created_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/ticket_links.php](/code/files/includes/ticket_links.php.md):137 | `ticketLinkCreate` | insert | `source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime` |  |
| [includes/ticket_links.php](/code/files/includes/ticket_links.php.md):174 | `ticketLinkRemove` | delete |  |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md):254 | `unmergeTicket` | delete |  |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md):536 | `mergeOneTicket` | update | `source_ticket_id` |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md):537 | `mergeOneTicket` | update | `target_ticket_id` |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md):538 | `mergeOneTicket` | delete |  |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md):540 | `mergeOneTicket` | delete |  |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md):596 | `mergeOneTicket` | insert | `source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime` |  |
| [includes/ticket_split.php](/code/files/includes/ticket_split.php.md):225 | `splitTicket` | insert | `source_ticket_id`, `target_ticket_id`, `relation_type`, `created_by_id`, `created_datetime` |  |
| [includes/ticket_split.php](/code/files/includes/ticket_split.php.md):433 | `undoSplit` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/ticket_links.php](/code/files/includes/ticket_links.php.md) | ticketLinkCreate L94, ticketLinkCreate L103, ticketLinkCreate L110, ticketLinkCreate L120, ticketLinkCreate L130, ticketLinkRemove L161 ... |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolRelatedTickets L846 |  |

