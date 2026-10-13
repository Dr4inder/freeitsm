# assets/js/change-table.js

> JavaScript - 140 lines

FreeITSM Change Management — table view config

Supplies the change-specific pieces to the shared data-table engine
(assets/js/data-table.js): the COLUMNS catalogue, change loading, and inline
editing for the low-risk list-level fields (priority, impact, type, assignee).

Why only those fields edit inline: the full change save (save.php) rewrites
the whole record, and the list endpoint only returns a summary — so a generic
cell-save would blank out the longtext fields it doesn't carry. Instead, each
edit posts ONE field to a dedicated update_field.php that touches one column
and writes one audit row. Status is intentionally NOT editable here so a cell
can't bypass CAB voting / the approval workflow; the description, test/rollback
plans and risk scoring stay in the full form too. Click any row to open it.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `fmt(raw)` | 29 |  |
| `fmtNaive(raw)` | 42 |  |
| `loadLookups()` | 88 |  |

## API endpoints it calls

- [api/change-management/get_change_priorities.php](/code/files/api/change-management/get_change_priorities.php.md)
- [api/change-management/get_change_impacts.php](/code/files/api/change-management/get_change_impacts.php.md)
- [api/change-management/get_change_types.php](/code/files/api/change-management/get_change_types.php.md)
- [api/change-management/list.php](/code/files/api/change-management/list.php.md)
- [api/change-management/update_field.php](/code/files/api/change-management/update_field.php.md)

## Loaded by

- [change-management/table.php](/code/files/change-management/table.php.md)

