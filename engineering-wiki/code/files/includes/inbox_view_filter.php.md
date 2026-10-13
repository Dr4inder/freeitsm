# includes/inbox_view_filter.php

> PHP - 55 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [inboxViewFilterFromRequest()](/code/functions/inboxViewFilterFromRequest.md) | 24 | Read the filter from the request. Absent means off, so every existing caller of either endpoint keeps exactly the behaviour it had. |
| [inboxViewFilterSql()](/code/functions/inboxViewFilterSql.md) | 44 | The SQL fragment for a filter, against the tickets alias given. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 50 | `inboxViewFilterSql` | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## How it hangs together

**Included by:** [api/tickets/get_emails.php](/code/files/api/tickets/get_emails.php.md), [api/tickets/get_ticket_counts.php](/code/files/api/tickets/get_ticket_counts.php.md)

