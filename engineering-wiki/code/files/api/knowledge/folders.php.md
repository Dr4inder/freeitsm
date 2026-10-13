# api/knowledge/folders.php

> API endpoint - 440 lines

API Endpoint: Knowledge folders Actions: list, create, rename, move, delete

🔑 THE TREE THIS RETURNS IS ALREADY FILTERED. A folder the caller cannot read
is not sent with a flag for the browser to hide — it is not sent at all.
Filtering in the client would mean the names had already crossed the wire,
and a folder name is exactly the kind of thing worth restricting ("Project
Nightingale", "Redundancies 2026").

⚠️ Readability is decided by includes/knowledge/visibility.php, the same file
that decides it for articles, so the tree and the article list can never
disagree about what exists.

## The endpoint

| | |
|---|---|
| URL | `api/knowledge/folders.php` |
| Protected by | Module access: knowledge (requireModuleAccessJson) |
| Reads | `GET action` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [handleList()](/code/functions/handleList.md) | 71 | The folders this analyst may see, each with the number of articles they may see inside it. |
| [knowledgeFolderIsReadable()](/code/functions/knowledgeFolderIsReadable.md) | 136 | May this viewer reach this folder? Delegates; never re-implements the rule. |
| [requireFolderAccess()](/code/functions/requireFolderAccess.md) | 151 | Refuse anything the caller may not reach, in the same words as "not found". |
| [handleCreate()](/code/functions/handleCreate.md) | 163 |  |
| [handleRename()](/code/functions/handleRename.md) | 186 |  |
| [handleMove()](/code/functions/handleMove.md) | 208 | Re-parent a folder. |
| [handleDelete()](/code/functions/handleDelete.md) | 245 | Delete a folder. |
| [handleMoveArticle()](/code/functions/handleMoveArticle.md) | 288 | File an article into a folder — what a drag-and-drop actually does. |
| [handleAddShortcut()](/code/functions/handleAddShortcut.md) | 324 | Make an article appear in a second folder. |
| [handleRemoveShortcut()](/code/functions/handleRemoveShortcut.md) | 364 | Remove a shortcut. The article itself is untouched — that is the whole point. |
| [handleExceptions()](/code/functions/handleExceptions.md) | 388 | Everything on this install carrying its OWN permissions rather than its parent's — the report from §9 of the design page. |
| [knowledgeAudit()](/code/functions/knowledgeAudit.md) | 436 | Thin alias onto includes/knowledge/audit.php, the one writer. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 80 | `handleList` | read [knowledge_folders](/code/tables/knowledge_folders.md) |  |
| 87 | `handleList` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 94 | `handleList` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 155 | `requireFolderAccess` | read [knowledge_folders](/code/tables/knowledge_folders.md) |  |
| 176 | `handleCreate` | **insert** [knowledge_folders](/code/tables/knowledge_folders.md) (`parent_id`, `name`, `is_restricted`, `inherit_permissions`, `created_by_id`, `owner_id`, `created_datetime`, `modified_datetime`) |  |
| 193 | `handleRename` | **update** [knowledge_folders](/code/tables/knowledge_folders.md) (`name`, `modified_datetime`) |  |
| 230 | `handleMove` | **update** [knowledge_folders](/code/tables/knowledge_folders.md) (`parent_id`, `modified_datetime`) |  |
| 251 | `handleDelete` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 257 | `handleDelete` | read [knowledge_folders](/code/tables/knowledge_folders.md) |  |
| 266 | `handleDelete` | **delete** [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 267 | `handleDelete` | **delete** [knowledge_folders](/code/tables/knowledge_folders.md) |  |
| 303 | `handleMoveArticle` | **update** [knowledge_articles](/code/tables/knowledge_articles.md) (`folder_id`, `modified_datetime`) |  |
| 343 | `handleAddShortcut` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 352 | `handleAddShortcut` | **insert** [knowledge_shortcuts](/code/tables/knowledge_shortcuts.md) (`folder_id`, `article_id`, `created_by_id`, `created_datetime`) |  |
| 371 | `handleRemoveShortcut` | **delete** [knowledge_shortcuts](/code/tables/knowledge_shortcuts.md) |  |
| 399 | `handleExceptions` | read [knowledge_acl](/code/tables/knowledge_acl.md), read [knowledge_folders](/code/tables/knowledge_folders.md) |  |
| 416 | `handleExceptions` | read [knowledge_acl](/code/tables/knowledge_acl.md), read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/knowledge/audit.php](/code/files/includes/knowledge/audit.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [knowledgeAclHasAnyRows()](/code/functions/knowledgeAclHasAnyRows.md), [knowledgeAclIndex()](/code/functions/knowledgeAclIndex.md), [knowledgeAclResetCaches()](/code/functions/knowledgeAclResetCaches.md), [knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md), [knowledgeCanRead()](/code/functions/knowledgeCanRead.md), [knowledgeFolderIndex()](/code/functions/knowledgeFolderIndex.md), [knowledgeFolderPermissionModel()](/code/functions/knowledgeFolderPermissionModel.md), [knowledgeFolderReadable()](/code/functions/knowledgeFolderReadable.md), [knowledgeViewerHasAdminFloor()](/code/functions/knowledgeViewerHasAdminFloor.md), [knowledgeViewerPrincipals()](/code/functions/knowledgeViewerPrincipals.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

