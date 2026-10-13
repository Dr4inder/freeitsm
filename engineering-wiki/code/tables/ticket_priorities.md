# ticket_priorities

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `name` | `VARCHAR(50) NOT NULL` |  |
| `colour` | `VARCHAR(20) NULL` |  |
| `is_default` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `display_order` | `INT NOT NULL DEFAULT 0` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `sla_response_minutes` | `INT NULL` |  |
| `sla_resolution_minutes` | `INT NULL` |  |
| `sla_calendar_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):794 |  | insert | `name`, `colour`, `is_default`, `display_order` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):2206 |  | insert | `name`, `display_order` |  |
| [api/tickets/delete_ticket_priority.php](/code/files/api/tickets/delete_ticket_priority.php.md):44 |  | delete |  |  |
| [api/tickets/save_priority_sla.php](/code/files/api/tickets/save_priority_sla.php.md):43 |  | update | `sla_response_minutes`, `sla_resolution_minutes`, `sla_calendar_id` |  |
| [api/tickets/save_ticket_priority.php](/code/files/api/tickets/save_ticket_priority.php.md):40 |  | update | `is_default` |  |
| [api/tickets/save_ticket_priority.php](/code/files/api/tickets/save_ticket_priority.php.md):46 |  | update | `name`, `colour`, `is_default`, `display_order`, `is_active` |  |
| [api/tickets/save_ticket_priority.php](/code/files/api/tickets/save_ticket_priority.php.md):52 |  | insert | `name`, `colour`, `is_default`, `display_order`, `is_active` |  |
| [api/tickets/save_ticket_priority.php](/code/files/api/tickets/save_ticket_priority.php.md):60 |  | update | `is_default` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/get_asset_tickets.php](/code/files/api/assets/get_asset_tickets.php.md) | L50 |  |
| [api/cmdb/generate_object_summary.php](/code/files/api/cmdb/generate_object_summary.php.md) | L183 |  |
| [api/cmdb/get_object_tickets.php](/code/files/api/cmdb/get_object_tickets.php.md) | L45 |  |
| [api/integrations/escalate_ticket.php](/code/files/api/integrations/escalate_ticket.php.md) | L83 |  |
| [api/integrations/get_mapping.php](/code/files/api/integrations/get_mapping.php.md) | L67 |  |
| [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md) | L61, L135 |  |
| [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md) | L80 |  |
| [api/self-service/get_team_tickets.php](/code/files/api/self-service/get_team_tickets.php.md) | L101 |  |
| [api/self-service/get_ticket_detail.php](/code/files/api/self-service/get_ticket_detail.php.md) | L48 |  |
| [api/self-service/get_tickets.php](/code/files/api/self-service/get_tickets.php.md) | L30 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L792, L2206, L2212, L2220, L2240 |  |
| [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) | saveEmailToDatabase L1128 |  |
| [api/tickets/delete_sla_calendar.php](/code/files/api/tickets/delete_sla_calendar.php.md) | L31 |  |
| [api/tickets/delete_ticket_priority.php](/code/files/api/tickets/delete_ticket_priority.php.md) | L30, L43 |  |
| [api/tickets/get_email_detail.php](/code/files/api/tickets/get_email_detail.php.md) | L49 |  |
| [api/tickets/get_emails.php](/code/files/api/tickets/get_emails.php.md) | L56 |  |
| [api/tickets/get_scheduled_tickets.php](/code/files/api/tickets/get_scheduled_tickets.php.md) | L45 |  |
| [api/tickets/get_sla_settings.php](/code/files/api/tickets/get_sla_settings.php.md) | L44 |  |
| [api/tickets/get_ticket_priorities.php](/code/files/api/tickets/get_ticket_priorities.php.md) | L20 |  |
| [api/tickets/get_ticket_widget_data.php](/code/files/api/tickets/get_ticket_widget_data.php.md) | getCategoricalData L241, getCategoricalWithSeries L309, getTimeData L376, getTimeWithSeries L404, getCreatedVsClosedData L476 |  |
| [api/tickets/get_user_tickets.php](/code/files/api/tickets/get_user_tickets.php.md) | L31 |  |
| [api/tickets/save_ticket_priority.php](/code/files/api/tickets/save_ticket_priority.php.md) | L58 |  |
| [api/tickets/schedule_feed.php](/code/files/api/tickets/schedule_feed.php.md) | L76 |  |
| [api/v1/resources/reference.php](/code/files/api/v1/resources/reference.php.md) | apiPrioritiesList L72 |  |
| [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md) | apiTicketSelect L34, apiTicketsList L218 |  |
| [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md) | calendarSyncReconcileTicket L51 |  |
| [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) | ingestInboundMessage L157 |  |
| [includes/people.php](/code/files/includes/people.php.md) | peopleTickets L321 |  |
| [includes/record_preview.php](/code/files/includes/record_preview.php.md) | recordPreviewTicket L127 |  |
| [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md) | L35 |  |
| [includes/services/tickets.php](/code/files/includes/services/tickets.php.md) | TicketsService::createTicket L117, TicketsService::loadTicket L1061, TicketsService::resolvePriority L1158, TicketsService::resolvePriority L1161 |  |
| [includes/sla.php](/code/files/includes/sla.php.md) | sla_get_state L77 |  |
| [includes/template_email.php](/code/files/includes/template_email.php.md) | buildTicketMergeData L334 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolOpenIncidents L393, warbotToolOpenIncidents L405 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L193, getWatchtowerData L198, getWatchtowerData L211, getWatchtowerData L213 |  |
| [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) | webchatOpenTicket L201 |  |
| [self-service/new-ticket.php](/code/files/self-service/new-ticket.php.md) | L1081 |  |
| [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) | WorkflowEngine::action_set_ticket_priority L2148 |  |

