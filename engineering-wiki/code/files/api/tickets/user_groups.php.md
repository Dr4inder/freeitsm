# api/tickets/user_groups.php

> API endpoint - 435 lines

API Endpoint: people groups — a named bag of analysts and portal users. Actions: list, get, search, create, update, delete, add_member, remove_member

─────────────────────────────────────────────────────────────────────────────
THIS IS THE FRONT DOOR TO A TABLE THAT ALREADY EXISTED

`knowledge_user_groups` was created with the Knowledge ACLs, complete with
membership resolution (includes/knowledge/visibility.php), enforcement, and a
"Group" row in the folder-permission picker. What it never had was a way to
MAKE one — the only INSERT anywhere in the product was in its own test. So the
picker offered a kind of principal that could not exist, on every install.

This endpoint is that missing screen. The table keeps its `knowledge_` name
deliberately: renaming it would mean a migration whose failure mode is every
membership on the install silently evaporating (db_verify only ever CREATEs,
so it would make an empty table under the new name and leave the populated one
orphaned beside it). The name is invisible to users; the risk is not.

─────────────────────────────────────────────────────────────────────────────
WHY WRITES ARE ADMINISTRATOR-ONLY

A group grants nothing by itself. But once one is on a folder's access list,
ADDING SOMEBODY TO IT IS A GRANT — made from a screen that is gated on the
tickets module, to a folder governed by Knowledge. Without this floor, anyone
holding Tickets could put themselves in "Payroll" and read it.

That is the same rule api/knowledge/permissions.php already states for editing
an access list directly, and the same one that put analyst and team management
in the System module. Reading the groups is left on plain module access: an
analyst looking at a requester should be able to see what they belong to.
─────────────────────────────────────────────────────────────────────────────

## The endpoint

| | |
|---|---|
| URL | `api/tickets/user_groups.php` |
| Protected by | Module access: tickets (requireModuleAccessJson); Administrators only (requireAdminJson) |
| Reads | `GET action`, `GET id`, `GET q` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [handleList()](/code/functions/handleList.md) | 97 | Every active group with its member count. |
| [handleGet()](/code/functions/handleGet.md) | 132 | One group and its members. |
| [handleSearch()](/code/functions/handleSearch.md) | 218 | Find people to add — analysts and portal users in one list, because you know the NAME of who you want, not which table they are in. Same shape as the Knowledge principal picker. |
| [handleCreate()](/code/functions/handleCreate.md) | 258 |  |
| [handleUpdate()](/code/functions/handleUpdate.md) | 287 |  |
| [handleDelete()](/code/functions/handleDelete.md) | 319 | Deactivate, never DELETE. |
| [handleAddMember()](/code/functions/handleAddMember.md) | 340 | Add one person, with an optional last day of access. |
| [handleRemoveMember()](/code/functions/handleRemoveMember.md) | 389 |  |
| [groupExpiryToUtc()](/code/functions/groupExpiryToUtc.md) | 422 | "Access until 14 September" → the UTC instant that day ends. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 99 | `handleList` | read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 136 | `handleGet` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 145 | `handleGet` | read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [analysts](/code/tables/analysts.md) |  |
| 157 | `handleGet` | read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [users](/code/tables/users.md) |  |
| 171 | `handleGet` | read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md) |  |
| 226 | `handleSearch` | read [analysts](/code/tables/analysts.md) |  |
| 242 | `handleSearch` | read [users](/code/tables/users.md) |  |
| 266 | `handleCreate` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 279 | `handleCreate` | **insert** [knowledge_user_groups](/code/tables/knowledge_user_groups.md) (`name`, `description`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 295 | `handleUpdate` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 303 | `handleUpdate` | **update** [knowledge_user_groups](/code/tables/knowledge_user_groups.md) (`name`, `description`, `updated_datetime`) |  |
| 324 | `handleDelete` | **update** [knowledge_user_groups](/code/tables/knowledge_user_groups.md) (`is_active`, `updated_datetime`) |  |
| 351 | `handleAddMember` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 359 | `handleAddMember` | read [analysts](/code/tables/analysts.md) |  |
| 364 | `handleAddMember` | read [users](/code/tables/users.md) |  |
| 380 | `handleAddMember` | **insert** [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md) (`group_id`, `member_type`, `member_id`, `expires_at`, `created_datetime`) |  |
| 400 | `handleRemoveMember` | **delete** [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md)

**Calls:** [activeTenantFilter()](/code/functions/activeTenantFilter.md), [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [requireAdminJson()](/code/functions/requireAdminJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

