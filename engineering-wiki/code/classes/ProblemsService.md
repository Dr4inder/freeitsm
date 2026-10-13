# ProblemsService

> Class in [includes/services/problems.php](/code/files/includes/services/problems.php.md), line 31

## Methods

| Method | What it does |
|---|---|
| [createProblem()](#createproblem) | Create a problem in the given (adapter-resolved) tenant. Returns the id. The adapter has already resolved + scope-checked `$tenantId`. |
| [updateProblem()](#updateproblem) | Apply a partial set of updates to a problem. Returns void; adapter reloads. |
| [deleteProblem()](#deleteproblem) | Delete a problem permanently (tidies change_relations, cascades children). |
| [addNote()](#addnote) | Append a journal note. Returns the note id (read AFTER touch, mirroring the API). |
| [linkTicket()](#linkticket) | Link an incident. Returns [problem_id, ticket_id, ticket_number, linked]. |
| [unlinkTicket()](#unlinkticket) | Unlink an incident. 404 if not linked. |
| [linkChange()](#linkchange) | Link the change that fixes a problem. Returns [problem_id, change_id, title, linked]. |
| [unlinkChange()](#unlinkchange) | Unlink a change. 404 if not linked. |
| [loadProblem()](#loadproblem) | Load the joined problem row, enforcing the actor's company scope; 404 if the problem is unknown OR outside scope (indistinguishable, by design). |
| [canAccessTenantRow()](#canaccesstenantrow) | May the actor access this row of a tenant-scoped table (by its company)? Generic mirror of apiKeyCanAccessTenantRow / analystCanAccessTicket. `$table` is a developer literal, never user input. |
| [auditWrite()](#auditwrite) | Records one action or field change in the problem's audit trail. |
| [touch()](#touch) | Sets the problem's updated time to now. |
| [resolveStatus()](#resolvestatus) | Resolve a problem status by name or id. Returns [id, name, is_closed] or null. |
| [resolvePriority()](#resolvepriority) | Resolve a problem priority by name or id. Explicit null/'' clears. |
| [resolveAnalyst()](#resolveanalyst) | Validate an analyst id (active); returns full_name. |

### createProblem

*public static* - line 41

Create a problem in the given (adapter-resolved) tenant. Returns the id. The adapter has already resolved + scope-checked `$tenantId`.

```php
function createProblem(PDO $conn, ActorContext $ctx, int $tenantId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$tenantId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 52 | `ProblemsService::createProblem` | read [problem_statuses](/code/tables/problem_statuses.md) |  |
| 70 | `ProblemsService::createProblem` | **insert** [problems](/code/tables/problems.md) (`tenant_id`, `title`, `description`, `status_id`, `priority_id`, `assigned_analyst_id`, `root_cause`, `workaround`, `is_known_error`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 81 | `ProblemsService::createProblem` | **update** [problems](/code/tables/problems.md) (`problem_number`) |  |

**Called from:** [api/problem-management/save.php](/code/files/api/problem-management/save.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### updateProblem

*public static* - line 107

Apply a partial set of updates to a problem. Returns void; adapter reloads.

```php
function updateProblem(PDO $conn, ActorContext $ctx, int $problemId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 202 | `ProblemsService::updateProblem` | **update** [problems](/code/tables/problems.md) |  |

**Called from:** [api/problem-management/save.php](/code/files/api/problem-management/save.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### deleteProblem

*public static* - line 228

Delete a problem permanently (tidies change_relations, cascades children).

```php
function deleteProblem(PDO $conn, ActorContext $ctx, int $problemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 232 | `ProblemsService::deleteProblem` | **delete** [change_relations](/code/tables/change_relations.md) |  |
| 235 | `ProblemsService::deleteProblem` | **delete** [problems](/code/tables/problems.md) |  |

**Called from:** [api/problem-management/delete.php](/code/files/api/problem-management/delete.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### addNote

*public static* - line 244

Append a journal note. Returns the note id (read AFTER touch, mirroring the API).

```php
function addNote(PDO $conn, ActorContext $ctx, int $problemId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 251 | `ProblemsService::addNote` | **insert** [problem_notes](/code/tables/problem_notes.md) (`problem_id`, `analyst_id`, `note`, `created_datetime`) |  |

**Called from:** [api/problem-management/add_note.php](/code/files/api/problem-management/add_note.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### linkTicket

*public static* - line 262

Link an incident. Returns [problem_id, ticket_id, ticket_number, linked].

```php
function linkTicket(PDO $conn, ActorContext $ctx, int $problemId, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 275 | `ProblemsService::linkTicket` | read [tickets](/code/tables/tickets.md) |  |
| 292 | `ProblemsService::linkTicket` | read [problem_tickets](/code/tables/problem_tickets.md) |  |
| 298 | `ProblemsService::linkTicket` | **insert** [problem_tickets](/code/tables/problem_tickets.md) (`problem_id`, `ticket_id`, `created_by_id`, `created_datetime`) |  |

**Called from:** [api/problem-management/link_ticket.php](/code/files/api/problem-management/link_ticket.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### unlinkTicket

*public static* - line 307

Unlink an incident. 404 if not linked.

```php
function unlinkTicket(PDO $conn, ActorContext $ctx, int $problemId, int $ticketId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |
| `$ticketId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 310 | `ProblemsService::unlinkTicket` | **delete** [problem_tickets](/code/tables/problem_tickets.md) |  |

**Called from:** [api/problem-management/unlink_ticket.php](/code/files/api/problem-management/unlink_ticket.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### linkChange

*public static* - line 324

Link the change that fixes a problem. Returns [problem_id, change_id, title, linked].

```php
function linkChange(PDO $conn, ActorContext $ctx, int $problemId, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 334 | `ProblemsService::linkChange` | read [changes](/code/tables/changes.md) |  |
| 344 | `ProblemsService::linkChange` | read [change_relations](/code/tables/change_relations.md) |  |
| 351 | `ProblemsService::linkChange` | **insert** [change_relations](/code/tables/change_relations.md) (`change_id`, `related_type`, `related_id`, `relation_type`, `created_by_id`, `created_datetime`) |  |

**Called from:** [api/problem-management/link_change.php](/code/files/api/problem-management/link_change.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### unlinkChange

*public static* - line 361

Unlink a change. 404 if not linked.

```php
function unlinkChange(PDO $conn, ActorContext $ctx, int $problemId, int $changeId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |
| `$changeId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 365 | `ProblemsService::unlinkChange` | **delete** [change_relations](/code/tables/change_relations.md) |  |

**Called from:** [api/problem-management/unlink_change.php](/code/files/api/problem-management/unlink_change.php.md), [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md)

### loadProblem

*private static* - line 385

Load the joined problem row, enforcing the actor's company scope; 404 if the problem is unknown OR outside scope (indistinguishable, by design).

```php
function loadProblem(PDO $conn, ActorContext $ctx, int $problemId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$problemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 388 | `ProblemsService::loadProblem` | read [problems](/code/tables/problems.md), read [problem_statuses](/code/tables/problem_statuses.md), read [problem_priorities](/code/tables/problem_priorities.md), read [analysts](/code/tables/analysts.md) |  |

### canAccessTenantRow

*private static* - line 417

May the actor access this row of a tenant-scoped table (by its company)? Generic mirror of apiKeyCanAccessTenantRow / analystCanAccessTicket. `$table` is a developer literal, never user input.

```php
function canAccessTenantRow(PDO $conn, ActorContext $ctx, string $table, int $rowId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$table` | `string` |  |  |
| `$rowId` | `int` |  |  |

### auditWrite

*private static* - line 436

Records one action or field change in the problem's audit trail.

```php
function auditWrite(
    PDO $conn,
    int $problemId,
    int $analystId,
    string $actionType,
    ?string $field,
    ?string $old,
    ?string $new
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$problemId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$actionType` | `string` |  |  |
| `$field` | `?string` |  |  |
| `$old` | `?string` |  |  |
| `$new` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 439 | `ProblemsService::auditWrite` | **insert** [problem_audit](/code/tables/problem_audit.md) (`problem_id`, `analyst_id`, `action_type`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

### touch

*private static* - line 449

Sets the problem's updated time to now.

```php
function touch(PDO $conn, int $problemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$problemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 451 | `ProblemsService::touch` | **update** [problems](/code/tables/problems.md) (`updated_datetime`) |  |

### resolveStatus

*private static* - line 455

Resolve a problem status by name or id. Returns [id, name, is_closed] or null.

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
| 458 | `ProblemsService::resolveStatus` | read [problem_statuses](/code/tables/problem_statuses.md) |  |
| 461 | `ProblemsService::resolveStatus` | read [problem_statuses](/code/tables/problem_statuses.md) |  |

### resolvePriority

*private static* - line 474

Resolve a problem priority by name or id. Explicit null/'' clears.

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
| 480 | `ProblemsService::resolvePriority` | read [problem_priorities](/code/tables/problem_priorities.md) |  |
| 483 | `ProblemsService::resolvePriority` | read [problem_priorities](/code/tables/problem_priorities.md) |  |

### resolveAnalyst

*private static* - line 496

Validate an analyst id (active); returns full_name.

```php
function resolveAnalyst(PDO $conn, int $analystId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 498 | `ProblemsService::resolveAnalyst` | read [analysts](/code/tables/analysts.md) |  |

