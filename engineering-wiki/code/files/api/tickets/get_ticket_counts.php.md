# api/tickets/get_ticket_counts.php

> API endpoint - 579 lines

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
| 89 |  | read [tickets](/code/tables/tickets.md) |  |
| 98 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 112 |  | read [tickets](/code/tables/tickets.md) |  |
| 121 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md) |  |
| 137 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 152 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 167 |  | read [tickets](/code/tables/tickets.md) |  |
| 175 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md) |  |
| 191 |  | read [departments](/code/tables/departments.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 206 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 220 |  | read [tickets](/code/tables/tickets.md) |  |
| 230 |  | read [tickets](/code/tables/tickets.md) |  |
| 237 |  | read [tickets](/code/tables/tickets.md) |  |
| 246 |  | read [tickets](/code/tables/tickets.md) |  |
| 264 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 277 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 288 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 301 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 339 |  | read [analysts](/code/tables/analysts.md), read [tickets](/code/tables/tickets.md) |  |
| 350 |  | read [analysts](/code/tables/analysts.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 364 |  | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 487 |  | read [teams](/code/tables/teams.md), read [tickets](/code/tables/tickets.md) |  |
| 498 |  | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 530 |  | read [tickets](/code/tables/tickets.md) |  |
| 542 |  | read [tickets](/code/tables/tickets.md) |  |
| 551 |  | read [tickets](/code/tables/tickets.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/ticket_snooze.php](/code/files/includes/ticket_snooze.php.md), [includes/inbox_view_filter.php](/code/files/includes/inbox_view_filter.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [inboxViewFilterFromRequest()](/code/functions/inboxViewFilterFromRequest.md), [inboxViewFilterSql()](/code/functions/inboxViewFilterSql.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [snoozeHiddenSql()](/code/functions/snoozeHiddenSql.md), [snoozeOnlySql()](/code/functions/snoozeOnlySql.md), [ticketTenantFilter()](/code/functions/ticketTenantFilter.md)

