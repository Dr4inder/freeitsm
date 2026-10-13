# includes/table_views.php

> PHP - 231 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [tableViewTeamIds()](/code/functions/tableViewTeamIds.md) | 26 | The teams this analyst belongs to. Empty array is a valid answer. |
| [tableViewVisibleClause()](/code/functions/tableViewVisibleClause.md) | 42 | The WHERE fragment and arguments that limit views to what this analyst may see: their own, ones shared with a team they are in, and public ones. |
| [tableViewSelect()](/code/functions/tableViewSelect.md) | 58 | One view row plus the names the library shows. |
| [tableViewShape()](/code/functions/tableViewShape.md) | 70 | Coerce the types the browser cares about. |
| [tableViewList()](/code/functions/tableViewList.md) | 87 | Views on one table that this analyst can see, newest-used first. |
| [tableViewLoad()](/code/functions/tableViewLoad.md) | 115 | One view, if this analyst may see it. |
| [tableViewSave()](/code/functions/tableViewSave.md) | 137 | Create or update a view. Returns its id. |
| [tableViewDelete()](/code/functions/tableViewDelete.md) | 208 | Delete a view. Owner only. |
| [tableViewTouch()](/code/functions/tableViewTouch.md) | 225 | Stamp a view as used. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 28 | `tableViewTeamIds` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 60 | `tableViewSelect` | read [table_views](/code/tables/table_views.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md) |  |
| 180 | `tableViewSave` | read [table_views](/code/tables/table_views.md) |  |
| 187 | `tableViewSave` | **update** [table_views](/code/tables/table_views.md) (`name`, `description`, `visibility`, `team_id`, `config`, `updated_datetime`) |  |
| 196 | `tableViewSave` | **insert** [table_views](/code/tables/table_views.md) (`table_key`, `name`, `description`, `owner_id`, `visibility`, `team_id`, `config`, `created_datetime`, `updated_datetime`) |  |
| 210 | `tableViewDelete` | **delete** [table_views](/code/tables/table_views.md) |  |
| 228 | `tableViewTouch` | **update** [table_views](/code/tables/table_views.md) (`last_used_datetime`) |  |

## How it hangs together

**Included by:** [api/table-views/delete.php](/code/files/api/table-views/delete.php.md), [api/table-views/list.php](/code/files/api/table-views/list.php.md), [api/table-views/save.php](/code/files/api/table-views/save.php.md), [api/table-views/use.php](/code/files/api/table-views/use.php.md)

