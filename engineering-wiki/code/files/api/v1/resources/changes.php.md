# api/v1/resources/changes.php

> API endpoint - 519 lines

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
| [apiChangeNumber()](/code/functions/apiChangeNumber.md) | 43 |  |
| [apiChangeSelect()](/code/functions/apiChangeSelect.md) | 47 |  |
| [apiSerializeChange()](/code/functions/apiSerializeChange.md) | 73 | Summary shape (lists). Detail adds the longtext bodies, PIR, attachments, links. |
| [apiLoadChange()](/code/functions/apiLoadChange.md) | 119 |  |
| [apiChangesList()](/code/functions/apiChangesList.md) | 141 |  |
| [apiChangesGet()](/code/functions/apiChangesGet.md) | 264 |  |
| [apiChangesCreate()](/code/functions/apiChangesCreate.md) | 324 |  |
| [apiChangesUpdate()](/code/functions/apiChangesUpdate.md) | 347 |  |
| [apiChangesDelete()](/code/functions/apiChangesDelete.md) | 357 |  |
| [apiChangeCommentsList()](/code/functions/apiChangeCommentsList.md) | 367 |  |
| [apiChangeCommentsCreate()](/code/functions/apiChangeCommentsCreate.md) | 385 |  |
| [apiChangeCommentsDelete()](/code/functions/apiChangeCommentsDelete.md) | 392 |  |
| [apiChangeAuditList()](/code/functions/apiChangeAuditList.md) | 402 |  |
| [apiChangeCabGet()](/code/functions/apiChangeCabGet.md) | 427 |  |
| [apiChangeCabSave()](/code/functions/apiChangeCabSave.md) | 460 | POST /changes/{id}/cab — replace the roster (diff-sync + audit, like save_cab_members.php). |
| [apiChangeCabVote()](/code/functions/apiChangeCabVote.md) | 468 | POST /changes/{id}/cab/vote — the key's acts-as analyst votes; mirrors submit_cab_vote.php. |
| [apiChangeLookupList()](/code/functions/apiChangeLookupList.md) | 478 |  |
| [apiChangeStatusesList()](/code/functions/apiChangeStatusesList.md) | 496 |  |
| [apiChangeTypesList()](/code/functions/apiChangeTypesList.md) | 499 |  |
| [apiChangePrioritiesList()](/code/functions/apiChangePrioritiesList.md) | 502 |  |
| [apiChangeImpactsList()](/code/functions/apiChangeImpactsList.md) | 505 |  |
| [apiChangeCategoriesList()](/code/functions/apiChangeCategoriesList.md) | 508 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 48 | `apiChangeSelect` | read [changes](/code/tables/changes.md), read [change_types](/code/tables/change_types.md), read [change_statuses](/code/tables/change_statuses.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md), read [change_categories](/code/tables/change_categories.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |
| 239 | `apiChangesList` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md), read [change_types](/code/tables/change_types.md), read [change_priorities](/code/tables/change_priorities.md), read [change_impacts](/code/tables/change_impacts.md) |  |
| 283 | `apiChangesGet` | read [change_attachments](/code/tables/change_attachments.md) |  |
| 301 | `apiChangesGet` | read [change_relations](/code/tables/change_relations.md), read [problems](/code/tables/problems.md) |  |
| 370 | `apiChangeCommentsList` | read [change_comments](/code/tables/change_comments.md), read [analysts](/code/tables/analysts.md) |  |
| 405 | `apiChangeAuditList` | read [change_audit](/code/tables/change_audit.md), read [analysts](/code/tables/analysts.md) |  |
| 430 | `apiChangeCabGet` | read [change_cab_members](/code/tables/change_cab_members.md), read [analysts](/code/tables/analysts.md) |  |
| 509 | `apiChangeCategoriesList` | read [change_categories](/code/tables/change_categories.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/changes.php](/code/files/includes/services/changes.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md)

