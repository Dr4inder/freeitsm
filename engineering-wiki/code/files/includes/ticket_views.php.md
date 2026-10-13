# includes/ticket_views.php

> PHP - 144 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [ticketViewsReady()](/code/functions/ticketViewsReady.md) | 31 | Who has looked at a ticket (discussion #62, step 2). |
| [ticketViewRecord()](/code/functions/ticketViewRecord.md) | 51 | Record that someone opened a ticket. Never throws: a view that fails to be recorded must not stop the ticket from opening. |
| [ticketViewsAsAuditRows()](/code/functions/ticketViewsAsAuditRows.md) | 79 | Views shaped as audit-trail rows, so the analyst's Audit window (desktop and phone alike, both fed by api/tickets/get_ticket_audit.php) shows them with no change of its own. One row per viewer per day, dated at their LAST view. |
| [ticketViewsForRequester()](/code/functions/ticketViewsForRequester.md) | 126 | Portal viewers of a ticket OTHER than its requester, newest first - what the requester is shown under "Who has seen this ticket". Analysts are deliberately absent (see the header). |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 36 | `ticketViewsReady` | read [ticket_views](/code/tables/ticket_views.md) |  |
| 61 | `ticketViewRecord` | **insert** [ticket_views](/code/tables/ticket_views.md) (`ticket_id`, `viewer_type`, `viewer_id`, `view_date`, `first_viewed_datetime`, `last_viewed_datetime`, `view_count`) |  |
| 85 | `ticketViewsAsAuditRows` | read [ticket_views](/code/tables/ticket_views.md), read [analysts](/code/tables/analysts.md), read [users](/code/tables/users.md) |  |
| 132 | `ticketViewsForRequester` | read [ticket_views](/code/tables/ticket_views.md), read [users](/code/tables/users.md) |  |

## How it hangs together

**Included by:** [api/self-service/get_ticket_detail.php](/code/files/api/self-service/get_ticket_detail.php.md), [api/tickets/get_email_detail.php](/code/files/api/tickets/get_email_detail.php.md), [api/tickets/get_ticket_audit.php](/code/files/api/tickets/get_ticket_audit.php.md), [includes/managers.php](/code/files/includes/managers.php.md)

