# api/tickets/manager_access.php

> API endpoint - 357 lines

API: one manager's management lines - the full-screen Manager access page (includes/manager_access_page.php), discussion #62 step 3.

GET  ?action=get&manager=N                              lines, exclusions, who they can see
  GET  ?action=search&manager=N&kind=user|group|department&q=&page=P
  POST {action:'add', manager, grant_type, target_id, target_value, is_exclusion}
  POST {action:'remove', manager, line_id}

WHO MAY
-------
Reached from Tickets -> Users AND Assets -> Users, so either module lets you
in, and the manager must be somebody this analyst can reach - a refusal reads
exactly like an id that does not exist. READING is open to those people;
CHANGING is System -> Managers' "who may set up management lines"
(managerLinesEditable), because a line lets one person read another's tickets.

⚠️ Every search is PAGED on the server and runs inside `managerReachSql()` -
the manager's own company, not themselves, leavers per the setting. So the
picker can only ever offer somebody the line could actually reach, and "123
people" beside a department is the number the manager would really get. The
write path re-checks a picked person against the same rule: a scoped list is
not a check, an id in a JSON body is any integer.

## The endpoint

| | |
|---|---|
| URL | `api/tickets/manager_access.php` |
| Protected by | Module access: ? (requireAnyModuleAccessJson) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [maFail()](/code/functions/maFail.md) | 39 | Refuse, in the one shape every refusal takes here. |
| [maManager()](/code/functions/maManager.md) | 46 | The manager, if this analyst may see them. |
| [maReady()](/code/functions/maReady.md) | 60 | Are the tables there? Before DB Verify there is nothing to show or change. |
| [maState()](/code/functions/maState.md) | 67 | Everything the page shows for one manager. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 50 | `maManager` | read [users](/code/tables/users.md), read [tenants](/code/tables/tenants.md) |  |
| 62 | `maReady` | read [manager_grants](/code/tables/manager_grants.md) |  |
| 96 | `maState` | read [manager_grants](/code/tables/manager_grants.md), read [users](/code/tables/users.md), read [knowledge_user_groups](/code/tables/knowledge_user_groups.md), read [analysts](/code/tables/analysts.md) |  |
| 137 | `maState` | read [users](/code/tables/users.md) |  |
| 174 |  | read [users](/code/tables/users.md) |  |
| 188 |  | read [users](/code/tables/users.md) |  |
| 212 |  | read [manager_grants](/code/tables/manager_grants.md), read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 248 |  | read [users](/code/tables/users.md) |  |
| 251 |  | read [users](/code/tables/users.md) |  |
| 263 |  | read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [users](/code/tables/users.md) |  |
| 266 |  | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 269 |  | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 281 |  | read [users](/code/tables/users.md) |  |
| 284 |  | read [users](/code/tables/users.md) |  |
| 301 |  | **delete** [manager_grants](/code/tables/manager_grants.md) |  |
| 317 |  | read [users](/code/tables/users.md) |  |
| 322 |  | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 331 |  | **delete** [manager_grants](/code/tables/manager_grants.md) |  |
| 337 |  | read [manager_grants](/code/tables/manager_grants.md) |  |
| 343 |  | **insert** [manager_grants](/code/tables/manager_grants.md) (`manager_user_id`, `grant_type`, `target_id`, `target_value`, `is_exclusion`, `created_by_analyst_id`, `created_datetime`) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/managers.php](/code/files/includes/managers.php.md)

**Calls:** [analystCanAccessUser()](/code/functions/analystCanAccessUser.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [managerGrantMembers()](/code/functions/managerGrantMembers.md), [managerLinesEditable()](/code/functions/managerLinesEditable.md), [managerReachSql()](/code/functions/managerReachSql.md), [managersResetMemo()](/code/functions/managersResetMemo.md), [managersSettings()](/code/functions/managersSettings.md), [managerTeamPreviewIds()](/code/functions/managerTeamPreviewIds.md), [requireAnyModuleAccessJson()](/code/functions/requireAnyModuleAccessJson.md), [sessionIsAdmin()](/code/functions/sessionIsAdmin.md)

