# ChangesService

> Class in [includes/services/changes.php](/code/files/includes/services/changes.php.md), line 41

## Methods

| Method | What it does |
|---|---|
| [createChange()](#createchange) | Create a change in the given (adapter-resolved) company. Returns the new id. The adapter has already resolved + scope-checked `$tenantId`. |
| [updateChange()](#updatechange) | Apply a partial set of updates to a change (a full-form save just sends every key). Writes the UI's exact per-field audit rows, recomputes risk, and fires change.approved on a genuine manual transition into Approved. Returns void; the adapter reloads for its response. |
| [deleteChange()](#deletechange) | Delete a change permanently: attachment files + rows, cascade children. |
| [createComment()](#createcomment) | Append an internal comment to a change. Returns the comment id. |
| [deleteComment()](#deletecomment) | Delete a comment. `$changeId` scopes the delete (API route); pass null to delete by comment id alone (the UI's delete_comment.php has no change id). |
| [saveCab()](#savecab) | Replace the CAB roster (diff-sync add/remove/change-required + audit). |
| [voteCab()](#votecab) | The acting analyst casts a CAB vote; any required Reject sends the change back to Draft, the all/majority threshold on required members auto-approves. Returns [change_id, vote, status_changed, new_status]. |
| [linkTicket()](#linkticket) | Link an incident (ticket) to a change. Returns [change_id, ticket_id, ticket_number, linked]. |
| [unlinkTicket()](#unlinkticket) | Unlink an incident from a change. 404 if not linked. Audited. |
| [canAccessTenantRow()](#canaccesstenantrow) | May the actor access this row of a tenant-scoped table (by its company)? Generic mirror of ProblemsService::canAccessTenantRow. `$table` is a developer literal, never user input. |
| [loadJoined()](#loadjoined) | Load the joined change row (with lookup + people display names), enforcing the actor's company scope; 404 if the change is unknown OR outside scope (indistinguishable, by design). NULL tenant_id normalises to the Default company. No-op at N=1. |
| [auditWrite()](#auditwrite) |  |
| [riskLevel()](#risklevel) | The risk banding (score = likelihood × impact). |
| [resolveLookup()](#resolvelookup) | Resolve a change lookup (type/status/priority/impact) by name or id from input keys "<key>" / "<key>_id". Strict: unknown values are a 422. Returns [id, name, extraCol?] or null when neither key was sent. |
| [lookupDefault()](#lookupdefault) | The default row of a change lookup table: [id, name] or [null, null]. |
| [riskInput()](#riskinput) | Validate a 1-5 risk input. Null/'' clears. |
| [resolveAnalyst()](#resolveanalyst) | Resolve an analyst id to its name; 422 if unknown/inactive (mirrors apiResolveAnalyst). |
| [parseDate()](#parsedate) | Parse a date to UTC 'Y-m-d H:i:s' (mirrors the API's apiParseDate; 400 on garbage). |
| [approvedDispatch()](#approveddispatch) | Fire change.approved (best-effort; the engine swallows its own errors). |

### createChange

*public static* - line 51

Create a change in the given (adapter-resolved) company. Returns the new id. The adapter has already resolved + scope-checked `$tenantId`.

```php
function createChange(PDO $conn, ActorContext $ctx, int $tenantId, array $in): int
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
| 72 | `ChangesService::createChange` | read [change_categories](/code/tables/change_categories.md) |  |
| 113 | `ChangesService::createChange` | **insert** [changes](/code/tables/changes.md) (`tenant_id`, `title`, `change_type_id`, `status_id`, `priority_id`, `impact_id`, `category`, `category_id`, `requester_id`, `assigned_to_id`, `approver_id`, `work_start_datetime`) |  |

**Called from:** [api/change-management/save.php](/code/files/api/change-management/save.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### updateChange

*public static* - line 165

Apply a partial set of updates to a change (a full-form save just sends every key). Writes the UI's exact per-field audit rows, recomputes risk, and fires change.approved on a genuine manual transition into Approved. Returns void; the adapter reloads for its response.

```php
function updateChange(PDO $conn, ActorContext $ctx, int $changeId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 221 | `ChangesService::updateChange` | read [change_categories](/code/tables/change_categories.md) |  |
| 359 | `ChangesService::updateChange` | **update** [changes](/code/tables/changes.md) |  |

**Called from:** [api/change-management/save.php](/code/files/api/change-management/save.php.md), [api/change-management/update_field.php](/code/files/api/change-management/update_field.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### deleteChange

*public static* - line 374

Delete a change permanently: attachment files + rows, cascade children.

```php
function deleteChange(PDO $conn, ActorContext $ctx, int $changeId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 378 | `ChangesService::deleteChange` | read [change_attachments](/code/tables/change_attachments.md) |  |
| 386 | `ChangesService::deleteChange` | **delete** [change_attachments](/code/tables/change_attachments.md) |  |
| 387 | `ChangesService::deleteChange` | **delete** [changes](/code/tables/changes.md) |  |

**Called from:** [api/change-management/delete.php](/code/files/api/change-management/delete.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### createComment

*public static* - line 400

Append an internal comment to a change. Returns the comment id.

```php
function createComment(PDO $conn, ActorContext $ctx, int $changeId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 409 | `ChangesService::createComment` | **insert** [change_comments](/code/tables/change_comments.md) (`change_id`, `analyst_id`, `comment_text`, `is_internal`, `created_datetime`) |  |

**Called from:** [api/change-management/save_comment.php](/code/files/api/change-management/save_comment.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### deleteComment

*public static* - line 424

Delete a comment. `$changeId` scopes the delete (API route); pass null to delete by comment id alone (the UI's delete_comment.php has no change id).

```php
function deleteComment(PDO $conn, ActorContext $ctx, int $commentId, ?int $changeId = null): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$commentId` | `int` |  |  |
| `$changeId` | `?int` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 429 | `ChangesService::deleteComment` | read [change_comments](/code/tables/change_comments.md) |  |
| 438 | `ChangesService::deleteComment` | **delete** [change_comments](/code/tables/change_comments.md) |  |

**Called from:** [api/change-management/delete_comment.php](/code/files/api/change-management/delete_comment.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### saveCab

*public static* - line 450

Replace the CAB roster (diff-sync add/remove/change-required + audit).

```php
function saveCab(PDO $conn, ActorContext $ctx, int $changeId, $members): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |
| `$members` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 468 | `ChangesService::saveCab` | read [change_cab_members](/code/tables/change_cab_members.md) |  |
| 476 | `ChangesService::saveCab` | read [analysts](/code/tables/analysts.md) |  |
| 484 | `ChangesService::saveCab` | **insert** [change_cab_members](/code/tables/change_cab_members.md) (`change_id`, `analyst_id`, `is_required`, `added_by_id`, `added_datetime`) |  |
| 490 | `ChangesService::saveCab` | **update** [change_cab_members](/code/tables/change_cab_members.md) (`is_required`) |  |
| 498 | `ChangesService::saveCab` | **delete** [change_cab_members](/code/tables/change_cab_members.md) |  |

**Called from:** [api/change-management/save_cab_members.php](/code/files/api/change-management/save_cab_members.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### voteCab

*public static* - line 510

The acting analyst casts a CAB vote; any required Reject sends the change back to Draft, the all/majority threshold on required members auto-approves. Returns [change_id, vote, status_changed, new_status].

```php
function voteCab(PDO $conn, ActorContext $ctx, int $changeId, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 521 | `ChangesService::voteCab` | read [change_cab_members](/code/tables/change_cab_members.md) |  |
| 532 | `ChangesService::voteCab` | **update** [change_cab_members](/code/tables/change_cab_members.md) (`vote`, `vote_comment`, `vote_datetime`) |  |
| 536 | `ChangesService::voteCab` | read [analysts](/code/tables/analysts.md) |  |
| 551 | `ChangesService::voteCab` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |
| 558 | `ChangesService::voteCab` | read [change_statuses](/code/tables/change_statuses.md) |  |
| 565 | `ChangesService::voteCab` | read [change_cab_members](/code/tables/change_cab_members.md) |  |
| 574 | `ChangesService::voteCab` | **update** [changes](/code/tables/changes.md) (`status_id`, `modified_datetime`) |  |
| 582 | `ChangesService::voteCab` | **update** [changes](/code/tables/changes.md) (`status_id`, `approval_datetime`, `modified_datetime`) |  |

**Called from:** [api/change-management/submit_cab_vote.php](/code/files/api/change-management/submit_cab_vote.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

### linkTicket

*public static* - line 609

Link an incident (ticket) to a change. Returns [change_id, ticket_id, ticket_number, linked].

```php
function linkTicket(PDO $conn, ActorContext $ctx, int $changeId, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 622 | `ChangesService::linkTicket` | read [tickets](/code/tables/tickets.md) |  |
| 639 | `ChangesService::linkTicket` | read [change_tickets](/code/tables/change_tickets.md) |  |
| 645 | `ChangesService::linkTicket` | **insert** [change_tickets](/code/tables/change_tickets.md) (`change_id`, `ticket_id`, `created_by_id`, `created_datetime`) |  |
| 648 | `ChangesService::linkTicket` | **update** [changes](/code/tables/changes.md) (`modified_datetime`) |  |

**Called from:** [api/change-management/link_ticket.php](/code/files/api/change-management/link_ticket.php.md)

### unlinkTicket

*public static* - line 654

Unlink an incident from a change. 404 if not linked. Audited.

```php
function unlinkTicket(PDO $conn, ActorContext $ctx, int $changeId, int $ticketId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |
| `$ticketId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 658 | `ChangesService::unlinkTicket` | read [tickets](/code/tables/tickets.md) |  |
| 662 | `ChangesService::unlinkTicket` | **delete** [change_tickets](/code/tables/change_tickets.md) |  |
| 668 | `ChangesService::unlinkTicket` | **update** [changes](/code/tables/changes.md) (`modified_datetime`) |  |

**Called from:** [api/change-management/unlink_ticket.php](/code/files/api/change-management/unlink_ticket.php.md)

### canAccessTenantRow

*private static* - line 680

May the actor access this row of a tenant-scoped table (by its company)? Generic mirror of ProblemsService::canAccessTenantRow. `$table` is a developer literal, never user input.

```php
function canAccessTenantRow(PDO $conn, ActorContext $ctx, string $table, int $rowId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$table` | `string` |  |  |
| `$rowId` | `int` |  |  |

### loadJoined

*private static* - line 704

Load the joined change row (with lookup + people display names), enforcing the actor's company scope; 404 if the change is unknown OR outside scope (indistinguishable, by design). NULL tenant_id normalises to the Default company. No-op at N=1.

```php
function loadJoined(PDO $conn, ActorContext $ctx, int $changeId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$changeId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 707 | `ChangesService::loadJoined` | read [changes](/code/tables/changes.md), read [change_types](/code/tables/change_types.md), read [change_statuses](/code/tables/change_statuses.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md), read [change_categories](/code/tables/change_categories.md), read [analysts](/code/tables/analysts.md) |  |

### auditWrite

*private static* - line 741

```php
function auditWrite(
    PDO $conn,
    int $changeId,
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
| `$changeId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$actionType` | `string` |  |  |
| `$field` | `?string` |  |  |
| `$old` | `?string` |  |  |
| `$new` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 744 | `ChangesService::auditWrite` | **insert** [change_audit](/code/tables/change_audit.md) (`change_id`, `analyst_id`, `action_type`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

### riskLevel

*private static* - line 750

The risk banding (score = likelihood × impact).

```php
function riskLevel(?int $score): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$score` | `?int` |  |  |

### resolveLookup

*private static* - line 765

Resolve a change lookup (type/status/priority/impact) by name or id from input keys "<key>" / "<key>_id". Strict: unknown values are a 422. Returns [id, name, extraCol?] or null when neither key was sent.

```php
function resolveLookup(
    PDO $conn,
    array $in,
    string $key,
    string $table,
    string $extraCol = ''
): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |
| `$key` | `string` |  |  |
| `$table` | `string` |  |  |
| `$extraCol` | `string` | `''` |  |

### lookupDefault

*private static* - line 798

The default row of a change lookup table: [id, name] or [null, null].

This one never had the GH #79 name-lookup fault, but it shared the narrower
half: a default that has since been deactivated is absent from the dropdown,
so selecting it produces a change set to something nobody can choose. Same
ordering as the tickets fix and includes/services/tasks.php — is_active
filters, and falling back through display_order means there is always an
answer as long as one active row exists.

```php
function lookupDefault(PDO $conn, string $table): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |

### riskInput

*private static* - line 808

Validate a 1-5 risk input. Null/'' clears.

```php
function riskInput($value, string $field): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

### resolveAnalyst

*private static* - line 821

Resolve an analyst id to its name; 422 if unknown/inactive (mirrors apiResolveAnalyst).

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
| 823 | `ChangesService::resolveAnalyst` | read [analysts](/code/tables/analysts.md) |  |

### parseDate

*private static* - line 833

Parse a date to UTC 'Y-m-d H:i:s' (mirrors the API's apiParseDate; 400 on garbage).

```php
function parseDate(string $value, string $field): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` | `string` |  |  |
| `$field` | `string` |  |  |

### approvedDispatch

*private static* - line 845

Fire change.approved (best-effort; the engine swallows its own errors).

```php
function approvedDispatch(int $changeId, ?string $title, ?string $riskLevel, ?int $approverId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$changeId` | `int` |  |  |
| `$title` | `?string` |  |  |
| `$riskLevel` | `?string` |  |  |
| `$approverId` | `?int` |  |  |

