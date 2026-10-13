# ticket_time_entries

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `ticket_id` | `INT NOT NULL` |  |
| `analyst_id` | `INT NOT NULL` |  |
| `notes` | `LONGTEXT NULL` |  |
| `time_spent_minutes` | `INT NOT NULL` |  |
| `entry_datetime` | `DATETIME NOT NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/debug-tools/D002_delete_ticket.php](/code/files/api/system/debug-tools/D002_delete_ticket.php.md):369 |  | delete |  |  |
| [api/tickets/empty_trash.php](/code/files/api/tickets/empty_trash.php.md):77 |  | delete |  |  |
| [api/tickets/permanently_delete_ticket.php](/code/files/api/tickets/permanently_delete_ticket.php.md):93 |  | delete |  |  |
| [includes/services/tickets.php](/code/files/includes/services/tickets.php.md):952 | `TicketsService::createTimeEntry` | insert | `ticket_id`, `analyst_id`, `notes`, `time_spent_minutes`, `entry_datetime` |  |
| [includes/services/tickets.php](/code/files/includes/services/tickets.php.md):980 | `TicketsService::updateTimeEntry` | update | `notes`, `time_spent_minutes`, `entry_datetime` |  |
| [includes/services/tickets.php](/code/files/includes/services/tickets.php.md):1013 | `TicketsService::deleteTimeEntry` | update | `is_active` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/system/debug-tools/D002_delete_ticket.php](/code/files/api/system/debug-tools/D002_delete_ticket.php.md) | L330 |  |
| [api/tickets/get_time_entries.php](/code/files/api/tickets/get_time_entries.php.md) | L47 |  |
| [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md) | apiTicketTimeEntriesList L460, apiTicketTimeEntriesCreate L489 |  |
| [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) | gapBulkRichness L377 |  |
| [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md) | writeupTicketBundle L267 |  |
| [includes/services/tickets.php](/code/files/includes/services/tickets.php.md) | TicketsService::updateTimeEntry L971, TicketsService::deleteTimeEntry L993, TicketsService::deleteTimeEntry L1000 |  |

