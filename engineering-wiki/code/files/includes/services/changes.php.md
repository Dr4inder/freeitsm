# includes/services/changes.php

> PHP - 857 lines

ChangesService — the shared write rules for Change Management: create/update a change (with the per-field audit trail + the change.approved workflow event), delete, comments (append/remove), and the CAB roster + voting (with the auto-transition into Approved / back to Draft).

Shared by the UI endpoints (api/change-management/*.php) and the REST API
(api/v1/resources/changes.php). Each adapter distils its caller into an
ActorContext + canonical input; this layer validates + writes and returns the
affected id(s) / a small result array, or throws ServiceError. It never emits
HTTP.

Canonical behaviour = the API resource's, so the API stays byte-identical
while the UI's looser writes converge to it:
  - people (Requester/Assigned To/Approver) are audited by NAME, not raw id;
  - a category_id change is audited (the UI only audited the legacy free-text
    category);
  - the creation audit reads "Created as <status>" (was hard-coded "Draft");
  - lookups are strict (unknown name/id → 422 rather than a silent fall-back);
  - analysts must exist and be active; dates are validated;
  - a missing change / comment is a 404 (was a silent success).

Two UI conveniences map onto the same methods: the single-field inline edit
(update_field.php) is just `updateChange()` with one key, and delete_comment.php
deletes unscoped (no change id) via the optional `$changeId` argument.

TENANCY (Phase 3) — changes are company-scoped like problems. Every by-id
write goes through `loadJoined()`, which gates on the actor's company scope
(ctx->companyScope; null = all companies) and 404s a change outside scope
(NULL tenant_id normalises to the Default company). The "acting company" for
a create is resolved by the adapter (the API's explicit company_id / key
default, the UI's active company) and passed in as `$tenantId`, like actorId.
All no-ops at N=1 (isMultiTenant() false).

## Classes

- [ChangesService](/code/classes/ChangesService.md) (class, line 41)

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 72 | `ChangesService::createChange` | read [change_categories](/code/tables/change_categories.md) |  |
| 113 | `ChangesService::createChange` | **insert** [changes](/code/tables/changes.md) (`tenant_id`, `title`, `change_type_id`, `status_id`, `priority_id`, `impact_id`, `category`, `category_id`, `requester_id`, `assigned_to_id`, `approver_id`, `work_start_datetime`) |  |
| 221 | `ChangesService::updateChange` | read [change_categories](/code/tables/change_categories.md) |  |
| 359 | `ChangesService::updateChange` | **update** [changes](/code/tables/changes.md) |  |
| 378 | `ChangesService::deleteChange` | read [change_attachments](/code/tables/change_attachments.md) |  |
| 386 | `ChangesService::deleteChange` | **delete** [change_attachments](/code/tables/change_attachments.md) |  |
| 387 | `ChangesService::deleteChange` | **delete** [changes](/code/tables/changes.md) |  |
| 409 | `ChangesService::createComment` | **insert** [change_comments](/code/tables/change_comments.md) (`change_id`, `analyst_id`, `comment_text`, `is_internal`, `created_datetime`) |  |
| 429 | `ChangesService::deleteComment` | read [change_comments](/code/tables/change_comments.md) |  |
| 438 | `ChangesService::deleteComment` | **delete** [change_comments](/code/tables/change_comments.md) |  |
| 468 | `ChangesService::saveCab` | read [change_cab_members](/code/tables/change_cab_members.md) |  |
| 476 | `ChangesService::saveCab` | read [analysts](/code/tables/analysts.md) |  |
| 484 | `ChangesService::saveCab` | **insert** [change_cab_members](/code/tables/change_cab_members.md) (`change_id`, `analyst_id`, `is_required`, `added_by_id`, `added_datetime`) |  |
| 490 | `ChangesService::saveCab` | **update** [change_cab_members](/code/tables/change_cab_members.md) (`is_required`) |  |
| 498 | `ChangesService::saveCab` | **delete** [change_cab_members](/code/tables/change_cab_members.md) |  |
| 521 | `ChangesService::voteCab` | read [change_cab_members](/code/tables/change_cab_members.md) |  |
| 532 | `ChangesService::voteCab` | **update** [change_cab_members](/code/tables/change_cab_members.md) (`vote`, `vote_comment`, `vote_datetime`) |  |
| 536 | `ChangesService::voteCab` | read [analysts](/code/tables/analysts.md) |  |
| 551 | `ChangesService::voteCab` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md) |  |
| 558 | `ChangesService::voteCab` | read [change_statuses](/code/tables/change_statuses.md) |  |
| 565 | `ChangesService::voteCab` | read [change_cab_members](/code/tables/change_cab_members.md) |  |
| 574 | `ChangesService::voteCab` | **update** [changes](/code/tables/changes.md) (`status_id`, `modified_datetime`) |  |
| 582 | `ChangesService::voteCab` | **update** [changes](/code/tables/changes.md) (`status_id`, `approval_datetime`, `modified_datetime`) |  |
| 622 | `ChangesService::linkTicket` | read [tickets](/code/tables/tickets.md) |  |
| 639 | `ChangesService::linkTicket` | read [change_tickets](/code/tables/change_tickets.md) |  |
| 645 | `ChangesService::linkTicket` | **insert** [change_tickets](/code/tables/change_tickets.md) (`change_id`, `ticket_id`, `created_by_id`, `created_datetime`) |  |
| 648 | `ChangesService::linkTicket` | **update** [changes](/code/tables/changes.md) (`modified_datetime`) |  |
| 658 | `ChangesService::unlinkTicket` | read [tickets](/code/tables/tickets.md) |  |
| 662 | `ChangesService::unlinkTicket` | **delete** [change_tickets](/code/tables/change_tickets.md) |  |
| 668 | `ChangesService::unlinkTicket` | **update** [changes](/code/tables/changes.md) (`modified_datetime`) |  |
| 707 | `ChangesService::loadJoined` | read [changes](/code/tables/changes.md), read [change_types](/code/tables/change_types.md), read [change_statuses](/code/tables/change_statuses.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md), read [change_categories](/code/tables/change_categories.md), read [analysts](/code/tables/analysts.md) |  |
| 744 | `ChangesService::auditWrite` | **insert** [change_audit](/code/tables/change_audit.md) (`change_id`, `analyst_id`, `action_type`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |
| 823 | `ChangesService::resolveAnalyst` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Included by:** [api/change-management/delete.php](/code/files/api/change-management/delete.php.md), [api/change-management/delete_comment.php](/code/files/api/change-management/delete_comment.php.md), [api/change-management/link_ticket.php](/code/files/api/change-management/link_ticket.php.md), [api/change-management/save.php](/code/files/api/change-management/save.php.md), [api/change-management/save_cab_members.php](/code/files/api/change-management/save_cab_members.php.md), [api/change-management/save_comment.php](/code/files/api/change-management/save_comment.php.md), [api/change-management/submit_cab_vote.php](/code/files/api/change-management/submit_cab_vote.php.md), [api/change-management/unlink_ticket.php](/code/files/api/change-management/unlink_ticket.php.md), [api/change-management/update_field.php](/code/files/api/change-management/update_field.php.md), [api/v1/resources/changes.php](/code/files/api/v1/resources/changes.php.md)

**Calls:** [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

