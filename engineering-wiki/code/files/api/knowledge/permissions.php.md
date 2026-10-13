# api/knowledge/permissions.php

> API endpoint - 353 lines

API Endpoint: who may read a Knowledge folder or article. Actions: get, set_mode, add, remove, search_principals

─────────────────────────────────────────────────────────────────────────────
THE MODEL, RESTATED HERE BECAUSE THIS FILE IS WHERE IT IS EDITED

An object is Open or Restricted, and the list means the opposite thing in each:

  Open       everyone (subject to the other axes), MINUS anyone on the list
  Restricted nobody, PLUS anyone on the list

The polarity lives on the OBJECT, never on the rows, so allow and deny can
never coexist and there is no precedence rule to explain. That is the whole
reason knowledge_acl has no allow/deny column.

⚠️ CHANGING THE POLARITY WIPES THE LIST, and says how many rows it is about to
drop. Keeping them dormant would leave invisible entries that spring back on
the next flip — the "an unloaded checkbox looks exactly like OFF" failure in
another costume.

⚠️ EDITING PERMISSIONS REQUIRES THE ADMINISTRATOR FLOOR. Anyone who can merely
READ a folder must not be able to change who else can: that would let the
first person granted access hand it to anybody, and the access list would mean
nothing by the end of the week.
─────────────────────────────────────────────────────────────────────────────

## The endpoint

| | |
|---|---|
| URL | `api/knowledge/permissions.php` |
| Protected by | Module access: knowledge (requireModuleAccessJson) |
| Reads | `GET action` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [requireObject()](/code/functions/requireObject.md) | 80 | 'folder' or 'article', and an id that exists. Anything else is refused. |
| [handleGet()](/code/functions/handleGet.md) | 106 | The current state of one object's access. |
| [resolveInherited()](/code/functions/resolveInherited.md) | 150 | Walk up to the folder whose rules actually apply, and describe them. |
| [principalName()](/code/functions/principalName.md) | 204 | Resolve a principal to something a human can check. |
| [handleSetMode()](/code/functions/handleSetMode.md) | 234 | Set Open/Restricted and the inherit tickbox. |
| [handleAdd()](/code/functions/handleAdd.md) | 262 |  |
| [handleRemove()](/code/functions/handleRemove.md) | 286 |  |
| [handleSearch()](/code/functions/handleSearch.md) | 323 | Find people, teams and groups to add. |
| [permAudit()](/code/functions/permAudit.md) | 349 | Permission changes are the rows people actually come looking for. Never silent. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 110 | `handleGet` | read [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 156 | `resolveInherited` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 170 | `resolveInherited` | read [knowledge_folders](/code/tables/knowledge_folders.md) |  |
| 174 | `resolveInherited` | read [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 244 | `handleSetMode` | read [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 247 | `handleSetMode` | **delete** [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 273 | `handleAdd` | **insert** [knowledge_acl](/code/tables/knowledge_acl.md) (`object_type`, `object_id`, `principal_type`, `principal_id`, `created_by_id`, `created_datetime`) |  |
| 292 | `handleRemove` | **delete** [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 302 | `handleRemove` | read [knowledge_acl](/code/tables/knowledge_acl.md) |  |
| 340 | `handleSearch` | read [analysts](/code/tables/analysts.md) |  |
| 341 | `handleSearch` | read [teams](/code/tables/teams.md) |  |
| 342 | `handleSearch` | read [users](/code/tables/users.md) |  |
| 343 | `handleSearch` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/knowledge/audit.php](/code/files/includes/knowledge/audit.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [knowledgeAclResetCaches()](/code/functions/knowledgeAclResetCaches.md), [knowledgeAuditLog()](/code/functions/knowledgeAuditLog.md), [knowledgeFolderIndex()](/code/functions/knowledgeFolderIndex.md), [knowledgeViewerHasAdminFloor()](/code/functions/knowledgeViewerHasAdminFloor.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

