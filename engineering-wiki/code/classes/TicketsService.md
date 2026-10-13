# TicketsService

> Class in [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), line 46

## Methods

| Method | What it does |
|---|---|
| [createTicket()](#createticket) | Create a ticket (with its initial email row + audit + ticket.created). `$tenantId` is the adapter-resolved acting company. `$defaultAnalystId` is the assignee when the caller sends none (UI: the creator; API: null). Returns the new ticket id. |
| [updateTicket()](#updateticket) | Apply a partial update to a ticket. `$writeAudit` toggles the server-side audit trail (API: true; UI: false — it audits client-side). Returns void; the adapter reloads for its response. |
| [deleteTicket()](#deleteticket) | Move a ticket to the trash. `$writeAudit` -> the 'Trash' audit row (UI: true; API: false). |
| [restoreTicket()](#restoreticket) | Restore a ticket from the trash. `$writeAudit` -> the 'Trash' audit row. |
| [eventTicket()](#eventticket) | The canonical ticket workflow payload, built from a loaded (joined) row. |
| [createNote()](#createnote) | Add a note. Returns the note id; touches the ticket's updated_datetime. |
| [createTimeEntry()](#createtimeentry) | Log time on a ticket. Returns the entry id. |
| [updateTimeEntry()](#updatetimeentry) | Edit a time entry (UI-only; only the owning analyst may edit). |
| [deleteTimeEntry()](#deletetimeentry) | Soft-delete a time entry. `$ticketId` scopes it (API route); pass null to resolve the ticket from the entry (the UI passes only the entry id). `$restrictToOwner` enforces the UI's "only your own entry" rule. |
| [rowAfterUpdates()](#rowafterupdates) | The ticket row as it will be once an UPDATE built by `updateTicket()` lands. |
| [loadTicket()](#loadticket) | Load the joined ticket row, enforcing the actor's company scope; 404 otherwise. |
| [canAccessTicket()](#canaccessticket) | May the actor access this ticket (by its company)? Mirror of apiKeyCanAccessTenantRow. |
| [auditWrite()](#auditwrite) |  |
| [resolveStatus()](#resolvestatus) | Resolve a status by name or id. Returns [id, name, is_closed] or null. |
| [resolvePriority()](#resolvepriority) | Resolve a priority by name or id. Empty string/null id = clear. |
| [teamName()](#teamname) | A team's name for the audit trail, or null. Never throws — this is a label. |
| [categoryEffectiveTypeId()](#categoryeffectivetypeid) |  |
| [validateLookupId()](#validatelookupid) |  |
| [parseDate()](#parsedate) | Parse a date to UTC 'Y-m-d H:i:s' (mirrors apiParseDate; 400 on garbage). |

### createTicket

*public static* - line 70

Create a ticket (with its initial email row + audit + ticket.created). `$tenantId` is the adapter-resolved acting company. `$defaultAnalystId` is the assignee when the caller sends none (UI: the creator; API: null). Returns the new ticket id.

```php
function createTicket(
    PDO $conn,
    ActorContext $ctx,
    int $tenantId,
    array $in,
    ?int $defaultAnalystId,
    string $creationNote
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$tenantId` | `int` |  |  |
| `$in` | `array` |  |  |
| `$defaultAnalystId` | `?int` |  |  |
| `$creationNote` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 112 | `TicketsService::createTicket` | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 117 | `TicketsService::createTicket` | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 160 | `TicketsService::createTicket` | read [analysts](/code/tables/analysts.md) |  |
| 167 | `TicketsService::createTicket` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |
| 187 | `TicketsService::createTicket` | read [users](/code/tables/users.md) |  |
| 199 | `TicketsService::createTicket` | read [users](/code/tables/users.md) |  |
| 217 | `TicketsService::createTicket` | **insert** [users](/code/tables/users.md) (`email`, `display_name`, `tenant_id`, `created_at`) |  |
| 231 | `TicketsService::createTicket` | **insert** [tickets](/code/tables/tickets.md) (`tenant_id`, `ticket_number`, `subject`, `status_id`, `priority_id`, `department_id`, `ticket_type_id`, `category_id`, `origin_id`, `assigned_team_id`, `assigned_analyst_id`, `owner_id`) |  |
| 247 | `TicketsService::createTicket` | **insert** [emails](/code/tables/emails.md) (`mailbox_id`, `subject`, `from_address`, `from_name`, `to_recipients`, `received_datetime`, `body_preview`, `body_content`, `body_type`, `has_attachments`, `importance`, `is_read`) |  |

**Called from:** [api/tickets/create_ticket.php](/code/files/api/tickets/create_ticket.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### updateTicket

*public static* - line 288

Apply a partial update to a ticket. `$writeAudit` toggles the server-side audit trail (API: true; UI: false — it audits client-side). Returns void; the adapter reloads for its response.

```php
function updateTicket(
    PDO $conn,
    ActorContext $ctx,
    int $ticketId,
    array $in,
    bool $writeAudit
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |
| `$in` | `array` |  |  |
| `$writeAudit` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 461 | `TicketsService::updateTicket` | read [teams](/code/tables/teams.md) |  |
| 489 | `TicketsService::updateTicket` | read [analysts](/code/tables/analysts.md) |  |
| 638 | `TicketsService::updateTicket` | **update** [tickets](/code/tables/tickets.md) |  |
| 730 | `TicketsService::updateTicket` | read [tickets](/code/tables/tickets.md), read [users](/code/tables/users.md) |  |

**Called from:** [api/self-service/close_ticket.php](/code/files/api/self-service/close_ticket.php.md), [api/tickets/assign_ticket.php](/code/files/api/tickets/assign_ticket.php.md), [api/tickets/bulk_update_tickets.php](/code/files/api/tickets/bulk_update_tickets.php.md), [api/tickets/schedule_ticket.php](/code/files/api/tickets/schedule_ticket.php.md), [api/tickets/update_ticket_owner.php](/code/files/api/tickets/update_ticket_owner.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md)

### deleteTicket

*public static* - line 800

Move a ticket to the trash. `$writeAudit` -> the 'Trash' audit row (UI: true; API: false).

```php
function deleteTicket(PDO $conn, ActorContext $ctx, int $ticketId, bool $writeAudit): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |
| `$writeAudit` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 806 | `TicketsService::deleteTicket` | **update** [tickets](/code/tables/tickets.md) (`deleted_datetime`, `deleted_by`) |  |

**Called from:** [api/tickets/bulk_delete_tickets.php](/code/files/api/tickets/bulk_delete_tickets.php.md), [api/tickets/delete_ticket.php](/code/files/api/tickets/delete_ticket.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), [includes/ticket_split.php](/code/files/includes/ticket_split.php.md)

### restoreTicket

*public static* - line 818

Restore a ticket from the trash. `$writeAudit` -> the 'Trash' audit row.

```php
function restoreTicket(PDO $conn, ActorContext $ctx, int $ticketId, bool $writeAudit): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |
| `$writeAudit` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 824 | `TicketsService::restoreTicket` | **update** [tickets](/code/tables/tickets.md) (`deleted_datetime`, `deleted_by`) |  |

**Called from:** [api/tickets/restore_ticket.php](/code/files/api/tickets/restore_ticket.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md)

### eventTicket

*private static* - line 835

The canonical ticket workflow payload, built from a loaded (joined) row.

```php
function eventTicket(array $r): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |

### createNote

*public static* - line 857

Add a note. Returns the note id; touches the ticket's updated_datetime.

```php
function createNote(PDO $conn, ActorContext $ctx, int $ticketId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 878 | `TicketsService::createNote` | **insert** [ticket_notes](/code/tables/ticket_notes.md) (`ticket_id`, `analyst_id`, `note_text`, `is_internal`, `created_datetime`) |  |
| 881 | `TicketsService::createNote` | **update** [tickets](/code/tables/tickets.md) (`updated_datetime`) |  |

**Called from:** [api/tickets/save_note.php](/code/files/api/tickets/save_note.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md)

### createTimeEntry

*public static* - line 940

Log time on a ticket. Returns the entry id.

```php
function createTimeEntry(PDO $conn, ActorContext $ctx, int $ticketId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 952 | `TicketsService::createTimeEntry` | **insert** [ticket_time_entries](/code/tables/ticket_time_entries.md) (`ticket_id`, `analyst_id`, `notes`, `time_spent_minutes`, `entry_datetime`) |  |

**Called from:** [api/tickets/save_time_entry.php](/code/files/api/tickets/save_time_entry.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md)

### updateTimeEntry

*public static* - line 959

Edit a time entry (UI-only; only the owning analyst may edit).

```php
function updateTimeEntry(PDO $conn, ActorContext $ctx, int $entryId, int $ticketId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$entryId` | `int` |  |  |
| `$ticketId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 971 | `TicketsService::updateTimeEntry` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 980 | `TicketsService::updateTimeEntry` | **update** [ticket_time_entries](/code/tables/ticket_time_entries.md) (`notes`, `time_spent_minutes`, `entry_datetime`) |  |

**Called from:** [api/tickets/save_time_entry.php](/code/files/api/tickets/save_time_entry.php.md)

### deleteTimeEntry

*public static* - line 989

Soft-delete a time entry. `$ticketId` scopes it (API route); pass null to resolve the ticket from the entry (the UI passes only the entry id). `$restrictToOwner` enforces the UI's "only your own entry" rule.

```php
function deleteTimeEntry(
    PDO $conn,
    ActorContext $ctx,
    int $entryId,
    ?int $ticketId,
    bool $restrictToOwner
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$entryId` | `int` |  |  |
| `$ticketId` | `?int` |  |  |
| `$restrictToOwner` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 993 | `TicketsService::deleteTimeEntry` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 1000 | `TicketsService::deleteTimeEntry` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 1013 | `TicketsService::deleteTimeEntry` | **update** [ticket_time_entries](/code/tables/ticket_time_entries.md) (`is_active`) |  |

**Called from:** [api/tickets/delete_time_entry.php](/code/files/api/tickets/delete_time_entry.php.md), [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md)

### rowAfterUpdates

*private static* - line 1032

The ticket row as it will be once an UPDATE built by `updateTicket()` lands.

Read back out of the SET list rather than re-derived from the input, so it
includes what the service decides on its own - the category a type change
clears, the owner written alongside the analyst - and cannot drift from what
is actually written. Entries with no placeholder (closed_datetime =
`UTC_TIMESTAMP()`) consume no argument.

```php
function rowAfterUpdates(array $current, array $updates, array $args): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$current` | `array` |  |  |
| `$updates` | `array` |  | "column = ?" / "column = <expr>" fragments |
| `$args` | `array` |  | the placeholder values, in order |

### loadTicket

*public static* - line 1058

Load the joined ticket row, enforcing the actor's company scope; 404 otherwise.

PUBLIC rather than private since #912: the merge engine (includes/ticket_merge.php)
has to check every ticket in a merge before moving a single row, and it must use
THIS scope rule rather than its own copy. A second implementation of "may this
actor see this ticket" is exactly the duplication that goes wrong silently —
nothing breaks when the copies drift, one of them just quietly shows more.
Read-only and side-effect free, so widening it changes no behaviour.

```php
function loadTicket(PDO $conn, ActorContext $ctx, int $ticketId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1061 | `TicketsService::loadTicket` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [ticket_types](/code/tables/ticket_types.md), read [ticket_origins](/code/tables/ticket_origins.md), read [departments](/code/tables/departments.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |

**Called from:** [api/tickets/get_mandatory_fields_check.php](/code/files/api/tickets/get_mandatory_fields_check.php.md), [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), [includes/ticket_split.php](/code/files/includes/ticket_split.php.md)

### canAccessTicket

*private static* - line 1094

May the actor access this ticket (by its company)? Mirror of apiKeyCanAccessTenantRow.

```php
function canAccessTicket(PDO $conn, ActorContext $ctx, int $ticketId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1099 | `TicketsService::canAccessTicket` | read [tickets](/code/tables/tickets.md) |  |

### auditWrite

*private static* - line 1112

```php
function auditWrite(
    PDO $conn,
    int $ticketId,
    int $analystId,
    string $field,
    ?string $old,
    ?string $new
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$field` | `string` |  |  |
| `$old` | `?string` |  |  |
| `$new` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1115 | `TicketsService::auditWrite` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

### resolveStatus

*private static* - line 1133

Resolve a status by name or id. Returns [id, name, is_closed] or null.

```php
function resolveStatus(PDO $conn, array $in): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1136 | `TicketsService::resolveStatus` | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 1139 | `TicketsService::resolveStatus` | read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

### resolvePriority

*private static* - line 1152

Resolve a priority by name or id. Empty string/null id = clear.

```php
function resolvePriority(PDO $conn, array $in): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1158 | `TicketsService::resolvePriority` | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |
| 1161 | `TicketsService::resolvePriority` | read [ticket_priorities](/code/tables/ticket_priorities.md) |  |

### teamName

*private static* - line 1182

A team's name for the audit trail, or null. Never throws — this is a label.

```php
function teamName(PDO $conn, ?int $teamId): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$teamId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1186 | `TicketsService::teamName` | read [teams](/code/tables/teams.md) |  |

### categoryEffectiveTypeId

*private static* - line 1195

```php
function categoryEffectiveTypeId(PDO $conn, int $categoryId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$categoryId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1200 | `TicketsService::categoryEffectiveTypeId` | read [ticket_categories](/code/tables/ticket_categories.md) |  |

### validateLookupId

*private static* - line 1219

```php
function validateLookupId(PDO $conn, string $table, $id, string $label): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |
| `$id` |  |  |  |
| `$label` | `string` |  |  |

### parseDate

*private static* - line 1234

Parse a date to UTC 'Y-m-d H:i:s' (mirrors apiParseDate; 400 on garbage).

```php
function parseDate(string $value, string $field): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` | `string` |  |  |
| `$field` | `string` |  |  |

