# api/v1/resources/tickets.php

> API endpoint - 486 lines

FreeITSM REST API v1 — tickets resource.

Mirrors the behaviour of the internal ticket endpoints so a ticket touched
via the API is indistinguishable from one touched in the UI:
  - create mirrors api/tickets/create_ticket.php (initial email row, audit
    row, workflow ticket.created)
  - update mirrors api/tickets/assign_ticket.php (closed_datetime handling,
    owner sync, template emails, CSAT auto-trigger, workflow events) and
    additionally writes the ticket_audit rows the UI writes from JS —
    status audit rows use the status NAME, which the SLA engine parses.
  - delete/restore mirror the trash endpoints (soft delete).

All writes are attributed to the analyst the API key acts as.

The WRITES (create / update / delete / restore / notes / time entries) are
delegated to TicketsService — the same rules the UI's api/tickets/*.php
endpoints now call, gated by ctx->companyScope. The API passes writeAudit=true
so its server-side audit trail is byte-identical; the UI update endpoints pass
writeAudit=false (they audit client-side). The reads, serialisers, list filter
and SLA/thread views below are API-only and stay here. (TicketsService
requires the workflow engine for the ticket.* events.)

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/tickets.php` |
| Protected by | REST API key |
| Reads | `GET deleted`, `GET state`, `GET status`, `GET priority`, `GET requester_email`, `GET unassigned`, `GET q`, `GET company_id`, `GET sort` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiTicketSelect()](/code/functions/apiTicketSelect.md) | 33 |  |
| [apiSerializeTicket()](/code/functions/apiSerializeTicket.md) | 54 |  |
| [apiLoadTicket()](/code/functions/apiLoadTicket.md) | 99 | Load one ticket (with joins) enforcing the key's company scope; 404s if not visible. |
| [apiTicketsList()](/code/functions/apiTicketsList.md) | 120 | GET /tickets |
| [apiTicketsGet()](/code/functions/apiTicketsGet.md) | 242 | GET /tickets/{id} |
| [apiTicketsCreate()](/code/functions/apiTicketsCreate.md) | 260 | POST /tickets |
| [apiTicketsUpdate()](/code/functions/apiTicketsUpdate.md) | 294 | PATCH /tickets/{id} |
| [apiTicketsDelete()](/code/functions/apiTicketsDelete.md) | 304 | DELETE /tickets/{id} + POST /tickets/{id}/restore (soft delete / trash) |
| [apiTicketsRestore()](/code/functions/apiTicketsRestore.md) | 311 |  |
| [apiTicketNotesList()](/code/functions/apiTicketNotesList.md) | 321 | Notes |
| [apiTicketNotesCreate()](/code/functions/apiTicketNotesCreate.md) | 341 |  |
| [apiTicketThreadList()](/code/functions/apiTicketThreadList.md) | 356 | Thread (emails / channel messages) |
| [apiTicketAuditList()](/code/functions/apiTicketAuditList.md) | 385 | Audit log |
| [apiTicketSlaGet()](/code/functions/apiTicketSlaGet.md) | 410 | SLA (compute-on-read via includes/sla.php) |
| [apiRequireTimeTracking()](/code/functions/apiRequireTimeTracking.md) | 432 | Refuse if this ticket's company has switched time tracking off FOR THE API (discussion #72). |
| [apiTicketTimeEntriesList()](/code/functions/apiTicketTimeEntriesList.md) | 439 |  |
| [apiTicketTimeEntriesCreate()](/code/functions/apiTicketTimeEntriesCreate.md) | 462 |  |
| [apiTicketTimeEntriesDelete()](/code/functions/apiTicketTimeEntriesDelete.md) | 479 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 34 | `apiTicketSelect` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [ticket_types](/code/tables/ticket_types.md), read [ticket_origins](/code/tables/ticket_origins.md), read [departments](/code/tables/departments.md), read [analysts](/code/tables/analysts.md), read [users](/code/tables/users.md), read [tenants](/code/tables/tenants.md) |  |
| 218 | `apiTicketsList` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [users](/code/tables/users.md) |  |
| 248 | `apiTicketsGet` | read [emails](/code/tables/emails.md) |  |
| 324 | `apiTicketNotesList` | read [ticket_notes](/code/tables/ticket_notes.md), read [analysts](/code/tables/analysts.md) |  |
| 359 | `apiTicketThreadList` | read [emails](/code/tables/emails.md) |  |
| 388 | `apiTicketAuditList` | read [ticket_audit](/code/tables/ticket_audit.md), read [analysts](/code/tables/analysts.md) |  |
| 443 | `apiTicketTimeEntriesList` | read [ticket_time_entries](/code/tables/ticket_time_entries.md), read [analysts](/code/tables/analysts.md) |  |
| 468 | `apiTicketTimeEntriesCreate` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [includes/sla.php](/code/files/includes/sla.php.md), [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md), [api/workflow/webhook_test.php](/code/files/api/workflow/webhook_test.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiKeyTicketFilter()](/code/functions/apiKeyTicketFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [sla_get_state()](/code/functions/sla_get_state.md), [ticketTenantId()](/code/functions/ticketTenantId.md), [timeTrackingApiOn()](/code/functions/timeTrackingApiOn.md)

