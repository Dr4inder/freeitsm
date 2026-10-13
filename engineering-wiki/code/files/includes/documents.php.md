# includes/documents.php

> PHP - 726 lines

Documents — attach files (or links to an external DMS) to anything.

─────────────────────────────────────────────────────────────────────────────
 THE ONE RULE THIS FILE EXISTS TO ENFORCE

 A document has NO permissions of its own. It is visible if — and only if —
 you can see at least one of the things it is attached to.

 Ed's decision, in his words: "if you can see the thing and the thing has
 document(s) attached then you should see those attachments." Which means
 attaching a document somewhere widely visible WIDENS who can read it. That is
 intended, and it is why the attach UI must show what else a document is on.
─────────────────────────────────────────────────────────────────────────────

🔑 WHY THERE IS NO PERMISSIONS TABLE HERE. The obvious design — a generic
per-object ACL table, with principals and groups — would mean building a
permission subsystem FreeITSM does not have, across every module, before the
feature could ship. FreeITSM already answers "can this analyst see X": module
membership (reads are not capability-gated — see api/system/global_search.php)
plus the module's own tenancy filter, plus a handful of per-record rules that
already live in includes/tenancy.php. This file borrows those rather than
inventing a rival to them. Storing visibility on the document would also be a
bug, not just duplication: permissions change after the row is written.

🔑 TWO SHAPES OF THE SAME QUESTION. Downloading asks about ONE document, so it
can afford an exact check. Searching asks about a SET, and checking N documents
one at a time is a loop that gets slower as the product succeeds. So:

    `documentCanView()`          — one document. The download/preview boundary.
    `documentVisibilityClause()` — SQL. Constrains a search to what you may see.

Both read the SAME registry below, so they cannot drift apart.

⚠️ FAIL CLOSED. An analyst with no accessible entity types gets `0=1`, not an
empty filter. An empty filter would return everything.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [documentEntityRegistry()](/code/functions/documentEntityRegistry.md) | 70 | Every kind of thing a document can be attached to. |
| [documentEntityTypes()](/code/functions/documentEntityTypes.md) | 341 | Returns the keys of every record type documents can be attached to. |
| [documentEntityDef()](/code/functions/documentEntityDef.md) | 346 | Returns one record type's registry entry (label, URL, title column, access checks), or null when unknown. |
| [documentAccessibleTypes()](/code/functions/documentAccessibleTypes.md) | 358 | Which entity types this analyst may read at all. |
| [documentCanViewParent()](/code/functions/documentCanViewParent.md) | 375 | Can this analyst see one specific parent record? |
| [documentVisibilityClause()](/code/functions/documentVisibilityClause.md) | 415 | SQL constraining a document query to what this analyst may see. |
| [documentCanView()](/code/functions/documentCanView.md) | 468 | May this analyst see this document? The download/preview boundary. |
| [documentParentName()](/code/functions/documentParentName.md) | 504 | The display name of one parent record. |
| [documentVisibleParents()](/code/functions/documentVisibleParents.md) | 535 | Everywhere a document is attached — that this caller may see. |
| [documentsDetachParent()](/code/functions/documentsDetachParent.md) | 597 | Detach everything from a record that is being deleted. |
| [documentsCollectOrphans()](/code/functions/documentsCollectOrphans.md) | 630 | Remove links whose parent no longer exists, then collect what that orphans. |
| [documentStoragePath()](/code/functions/documentStoragePath.md) | 707 | Absolute path for a stored document. |
| [documentStorageKey()](/code/functions/documentStorageKey.md) | 723 | The key for a newly stored file. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 109 | `documentEntityRegistry` | read [tickets](/code/tables/tickets.md) |  |
| 114 | `documentEntityRegistry` | read [tickets](/code/tables/tickets.md) |  |
| 120 | `documentEntityRegistry` | read [ticket_notes](/code/tables/ticket_notes.md) |  |
| 128 | `documentEntityRegistry` | read [tickets](/code/tables/tickets.md) |  |
| 136 | `documentEntityRegistry` | read [tickets](/code/tables/tickets.md) |  |
| 295 | `documentEntityRegistry` | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 430 | `documentVisibilityClause` | read [document_links](/code/tables/document_links.md) |  |
| 473 | `documentCanView` | read [document_links](/code/tables/document_links.md) |  |
| 540 | `documentVisibleParents` | read [document_links](/code/tables/document_links.md) |  |
| 601 | `documentsDetachParent` | **delete** [document_links](/code/tables/document_links.md) |  |
| 643 | `documentsCollectOrphans` | **delete** [document_links](/code/tables/document_links.md) |  |
| 663 | `documentsCollectOrphans` | read [documents](/code/tables/documents.md), read [document_links](/code/tables/document_links.md) |  |
| 673 | `documentsCollectOrphans` | **update** [documents](/code/tables/documents.md) (`deleted_datetime`) |  |
| 684 | `documentsCollectOrphans` | read [documents](/code/tables/documents.md) |  |

## How it hangs together

**Includes:** [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md), [includes/leases.php](/code/files/includes/leases.php.md)

**Included by:** [api/documents/attach.php](/code/files/api/documents/attach.php.md), [api/documents/download.php](/code/files/api/documents/download.php.md), [api/documents/find.php](/code/files/api/documents/find.php.md), [api/documents/links.php](/code/files/api/documents/links.php.md), [api/documents/list.php](/code/files/api/documents/list.php.md), [api/documents/save.php](/code/files/api/documents/save.php.md), [api/documents/unlink.php](/code/files/api/documents/unlink.php.md), [api/self-service/get_document.php](/code/files/api/self-service/get_document.php.md), [api/system/debug-tools/D012_ticket_attachments.php](/code/files/api/system/debug-tools/D012_ticket_attachments.php.md), [api/system/global_search.php](/code/files/api/system/global_search.php.md), [api/tickets/empty_trash.php](/code/files/api/tickets/empty_trash.php.md), [api/tickets/permanently_delete_ticket.php](/code/files/api/tickets/permanently_delete_ticket.php.md), [includes/documents_panel.php](/code/files/includes/documents_panel.php.md), [includes/leases.php](/code/files/includes/leases.php.md), [includes/search/documents_index.php](/code/files/includes/search/documents_index.php.md), [includes/services/domains.php](/code/files/includes/services/domains.php.md)

**Calls:** [activeTenantFilter()](/code/functions/activeTenantFilter.md), [analystCanAccessAsset()](/code/functions/analystCanAccessAsset.md), [analystCanAccessChange()](/code/functions/analystCanAccessChange.md), [analystCanAccessCmdbObject()](/code/functions/analystCanAccessCmdbObject.md), [analystCanAccessDomain()](/code/functions/analystCanAccessDomain.md), [analystCanAccessProblem()](/code/functions/analystCanAccessProblem.md), [analystCanAccessProject()](/code/functions/analystCanAccessProject.md), [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [contractCanView()](/code/functions/contractCanView.md), [contractVisibilitySql()](/code/functions/contractVisibilitySql.md), [knowledgeCanRead()](/code/functions/knowledgeCanRead.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [leaseCanView()](/code/functions/leaseCanView.md), [searchUnindexDocument()](/code/functions/searchUnindexDocument.md), [ticketTenantFilter()](/code/functions/ticketTenantFilter.md)

