# assets/js/tasks-table.js

> JavaScript - 185 lines

FreeITSM Tasks — table view config

Supplies the tasks-specific pieces to the shared data-table engine
(assets/js/data-table.js): the COLUMNS catalogue (with inline-edit controls),
task loading (respecting the My/Team/Analyst sidebar), and per-cell saves to
save.php. The sidebar filter handlers and the shared right-click context menu
are wired here too; everything else is the shared engine.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `formatDate(iso)` | 24 |  |
| `loadLookups()` | 55 |  |
| `loadDropdowns()` | 66 |  |
| `esc(s)` | 118 |  |

## API endpoints it calls

- [api/tasks/get_task_statuses.php](/code/files/api/tasks/get_task_statuses.php.md)
- [api/tasks/get_task_priorities.php](/code/files/api/tasks/get_task_priorities.php.md)
- [api/tasks/list.php](/code/files/api/tasks/list.php.md)
- [api/tasks/save.php](/code/files/api/tasks/save.php.md)

## Loaded by

- [tasks/table/index.php](/code/files/tasks/table/index.php.md)

