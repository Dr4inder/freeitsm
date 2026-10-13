# api/v1/resources/changes.php

> API endpoint - 535 lines

FreeITSM REST API v1 — changes resource (Change Management).

Mirrors the module's internal endpoints so a change touched via the API is
indistinguishable from one touched in the UI:
  - create/update mirror api/change-management/save.php: per-field audit
    with the SAME human field labels ('Title', 'Status', 'Work Start', …),
    display NAMES for lookups, '(empty)' placeholders, 200-char truncation,
    action_type 'status_change' for status else 'field_change', longtext
    bodies deliberately NOT audited, and the change.approved workflow event
    on a genuine transition into Approved.
  - risk is computed server-side exactly like the UI: score = likelihood ×
    impact (1-5 each), banded Low ≤4 / Medium ≤9 / High ≤15 / Very High ≤20
    / Critical.
  - CAB voting mirrors submit_cab_vote.php: the key's acts-as analyst must
    be an un-voted member; any required Reject sends the change back to
    Draft; the all/majority threshold on required members auto-approves
    (with approval_datetime + audit + workflow dispatch).
  - comments are append + delete (no edit), always internal — like the UI.
  - DELETE removes the change, its attachment files, and cascades children.

Changes ARE company-scoped (changes.tenant_id, Phase 3), so the key's company
scope restricts every list + by-id read/write (apiKeyTenantFilter on the list,
apiKeyCanAccessTenantRow via apiLoadChange). A change outside scope is a 404;
NULL tenant_id normalises to the Default company. Invisible at N=1. CHG-####
references are derived from the id, exactly as the UI renders them.

The WRITES (create / update / delete / comments / CAB roster + vote) are
delegated to ChangesService — the same rules the UI's
api/change-management/*.php endpoints now call. The reads, serialisers, list
filters, CAB roster read, and reference lookups below are API-only and stay
here. (ChangesService requires the workflow engine for change.approved.)

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/changes.php` |
| Protected by | REST API key |
| Reads | `GET company_id`, `GET state`, `GET cab_required`, `GET q`, `GET sort` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiChangeNumber()](/code/functions/apiChangeNumber.md) | 44 | The display reference of a change, such as CHG-0042. |
| [apiChangeSelect()](/code/functions/apiChangeSelect.md) | 52 | The SELECT for changes, with the names of the type, status, priority, impact, category, the people involved and the company. |
| [apiSerializeChange()](/code/functions/apiSerializeChange.md) | 78 | Summary shape (lists). Detail adds the longtext bodies, PIR, attachments, links. |
| [apiLoadChange()](/code/functions/apiLoadChange.md) | 128 | Loads one change row (apiChangeSelect), or answers 404 and stops - including for a change in a company the key cannot reach. |
| [apiChangesList()](/code/functions/apiChangesList.md) | 150 | GET /changes |
| [apiChangesGet()](/code/functions/apiChangesGet.md) | 273 | GET /changes/{id} — detail incl. bodies, PIR, attachments, linked problems |
| [apiChangesCreate()](/code/functions/apiChangesCreate.md) | 333 | POST /changes |
| [apiChangesUpdate()](/code/functions/apiChangesUpdate.md) | 356 | PATCH /changes/{id} |
| [apiChangesDelete()](/code/functions/apiChangesDelete.md) | 366 | DELETE /changes/{id} — permanent; removes attachment files, cascades children |
| [apiChangeCommentsList()](/code/functions/apiChangeCommentsList.md) | 376 | Comments — append + delete (no edit), always internal, like the UI |
| [apiChangeCommentsCreate()](/code/functions/apiChangeCommentsCreate.md) | 395 | POST /changes/{id}/comments - adds a comment to the change through ChangesService. |
| [apiChangeCommentsDelete()](/code/functions/apiChangeCommentsDelete.md) | 403 | DELETE /changes/{id}/comments/{commentId} - deletes a comment through ChangesService. |
| [apiChangeAuditList()](/code/functions/apiChangeAuditList.md) | 413 | GET /changes/{id}/audit |
| [apiChangeCabGet()](/code/functions/apiChangeCabGet.md) | 438 | CAB — roster + votes |
| [apiChangeCabSave()](/code/functions/apiChangeCabSave.md) | 471 | POST /changes/{id}/cab — replace the roster (diff-sync + audit, like save_cab_members.php). |
| [apiChangeCabVote()](/code/functions/apiChangeCabVote.md) | 479 | POST /changes/{id}/cab/vote — the key's acts-as analyst votes; mirrors submit_cab_vote.php. |
| [apiChangeLookupList()](/code/functions/apiChangeLookupList.md) | 489 | Reference lookups |
| [apiChangeStatusesList()](/code/functions/apiChangeStatusesList.md) | 508 | GET /change-statuses - the change statuses, with is_closed. |
| [apiChangeTypesList()](/code/functions/apiChangeTypesList.md) | 512 | GET /change-types - the change types. |
| [apiChangePrioritiesList()](/code/functions/apiChangePrioritiesList.md) | 516 | GET /change-priorities - the change priorities. |
| [apiChangeImpactsList()](/code/functions/apiChangeImpactsList.md) | 520 | GET /change-impacts - the change impact levels. |
| [apiChangeCategoriesList()](/code/functions/apiChangeCategoriesList.md) | 524 | GET /change-categories - the change categories, in display order. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 53 | `apiChangeSelect` | read [changes](/code/tables/changes.md), read [change_types](/code/tables/change_types.md), read [change_statuses](/code/tables/change_statuses.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md), read [change_categories](/code/tables/change_categories.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |
| 248 | `apiChangesList` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md), read [change_types](/code/tables/change_types.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md) |  |
| 292 | `apiChangesGet` | read [change_attachments](/code/tables/change_attachments.md) |  |
| 310 | `apiChangesGet` | read [change_relations](/code/tables/change_relations.md), read [problems](/code/tables/problems.md) |  |
| 379 | `apiChangeCommentsList` | read [change_comments](/code/tables/change_comments.md), read [analysts](/code/tables/analysts.md) |  |
| 416 | `apiChangeAuditList` | read [change_audit](/code/tables/change_audit.md), read [analysts](/code/tables/analysts.md) |  |
| 441 | `apiChangeCabGet` | read [change_cab_members](/code/tables/change_cab_members.md), read [analysts](/code/tables/analysts.md) |  |
| 525 | `apiChangeCategoriesList` | read [change_categories](/code/tables/change_categories.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/changes.php](/code/files/includes/services/changes.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md)

