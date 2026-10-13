# document_links

What each document is attached to. A ROW, deliberately, not a column on `documents` — that is what lets one document belong to several things later without a migration or a rewrite of every query that touches it.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `document_id` | `INT NOT NULL` |  |
| `parent_type` | `VARCHAR(32) NOT NULL` | `documentEntityTypes()` |
| `parent_id` | `INT NOT NULL` |  |
| `linked_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/documents/attach.php](/code/files/api/documents/attach.php.md):62 |  | insert | `document_id`, `parent_type`, `parent_id`, `linked_by_id` |  |
| [api/documents/save.php](/code/files/api/documents/save.php.md):139 |  | insert | `document_id`, `parent_type`, `parent_id`, `linked_by_id` |  |
| [api/documents/unlink.php](/code/files/api/documents/unlink.php.md):61 |  | delete |  |  |
| [includes/documents.php](/code/files/includes/documents.php.md):601 | `documentsDetachParent` | delete |  |  |
| [includes/documents.php](/code/files/includes/documents.php.md):643 | `documentsCollectOrphans` | delete |  |  |
| [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md):720 | `TaskRecurrence::createOccurrence` | insert | `document_id`, `parent_type`, `parent_id`, `linked_by_id`, `created_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/documents/find.php](/code/files/api/documents/find.php.md) | L60 |  |
| [api/documents/links.php](/code/files/api/documents/links.php.md) | L68 |  |
| [api/documents/list.php](/code/files/api/documents/list.php.md) | L58, L66, L81 |  |
| [api/documents/unlink.php](/code/files/api/documents/unlink.php.md) | L65 |  |
| [api/self-service/get_document.php](/code/files/api/self-service/get_document.php.md) | L64 |  |
| [api/self-service/get_ticket_detail.php](/code/files/api/self-service/get_ticket_detail.php.md) | L222 |  |
| [api/system/debug-tools/D012_ticket_attachments.php](/code/files/api/system/debug-tools/D012_ticket_attachments.php.md) | L484, L928, L970 |  |
| [api/system/global_search.php](/code/files/api/system/global_search.php.md) | L482, L685 |  |
| [api/tickets/get_notes.php](/code/files/api/tickets/get_notes.php.md) | L98 |  |
| [includes/documents.php](/code/files/includes/documents.php.md) | documentVisibilityClause L430, documentCanView L473, documentVisibleParents L540, documentsCollectOrphans L663 |  |
| [includes/projects/gatecheck.php](/code/files/includes/projects/gatecheck.php.md) | projectGateDocuments L45 |  |
| [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md) | TaskRecurrence::createOccurrence L720 |  |

