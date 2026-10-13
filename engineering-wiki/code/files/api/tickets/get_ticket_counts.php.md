# api/tickets/get_ticket_counts.php

> API endpoint - 545 lines

API Endpoint: Get ticket counts by department and status Returns hierarchical count data for folder view Respects team-based filtering for users with team assignments

## The endpoint

| | |
|---|---|
| URL | `api/tickets/get_ticket_counts.php` |
| Protected by | Module access: tickets (requireModuleAccessJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 28 |  | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 72 |  | read [department_teams](/code/tables/department_teams.md), read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 92 |  | read [tickets](/code/tables/tickets.md) |  |
| 101 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md) |  |
| 117 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 132 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 147 |  | read [tickets](/code/tables/tickets.md) |  |
| 155 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md) |  |
| 171 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 186 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 200 |  | read [tickets](/code/tables/tickets.md) |  |
| 212 |  | read [tickets](/code/tables/tickets.md) |  |
| 221 |  | read [tickets](/code/tables/tickets.md) |  |
| 239 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 254 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 267 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 305 |  | read [analysts](/code/tables/analysts.md), read [tickets](/code/tables/tickets.md) |  |
| 316 |  | read [analysts](/code/tables/analysts.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 330 |  | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 453 |  | read [teams](/code/tables/teams.md), read [tickets](/code/tables/tickets.md) |  |
| 464 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 496 |  | read [tickets](/code/tables/tickets.md) |  |
| 508 |  | read [tickets](/code/tables/tickets.md) |  |
| 517 |  | read [tickets](/code/tables/tickets.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/ticket_snooze.php](/code/files/includes/ticket_snooze.php.md), [includes/inbox_view_filter.php](/code/files/includes/inbox_view_filter.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [inboxViewFilterFromRequest()](/code/functions/inboxViewFilterFromRequest.md), [inboxViewFilterSql()](/code/functions/inboxViewFilterSql.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [snoozeHiddenSql()](/code/functions/snoozeHiddenSql.md), [snoozeOnlySql()](/code/functions/snoozeOnlySql.md), [ticketTenantFilter()](/code/functions/ticketTenantFilter.md)

