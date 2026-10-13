# assets/js/tasks-ctx-menu.js

> JavaScript - 380 lines

FreeITSM Tasks — Shared right-click context menu

One menu used by the dashboard (right-click a board / list card) and the
timeline (right-click a Gantt bar). Each page provides:
  - targetSelector: CSS selector that identifies a clickable task element
  - getTaskId(el):  return the numeric task id from that element
  - getTask(id):    return the task object (so submenus know the current
                    analyst/team/status/priority for the ✓ marker)
  - `getLookups()`:   return { analysts, teams, statuses, priorities }
  - `onUpdate()`:     called after a successful save (typically `loadTasks()`)
  - apiBase:        base URL for save.php (e.g. '../api/tasks/')
  - onCreateSubtask(id) [optional]: dashboard wires this to open the detail
                    panel and focus the add-subtask input. Omit on pages
                    that don't have a detail panel — the menu hides the
                    "Create subtask" item when this is missing.

Markup contract: a single .ctx-menu with id="ctxMenu" containing four
submenu containers (#ctxAnalyst / #ctxTeam / #ctxStatus / #ctxPriority).
The optional "Create subtask" item carries data-action="subtask".

## Functions

| Function | Line | What it does |
|---|--:|---|
| `init(config)` | 33 |  |
| `loadMoveCompanies()` | 75 | Same source as the tickets and changes "Move to company" submenus. accessible=1 means the server decides what this analyst may see, so the menu cannot offer a company the move would then refuse. |
| `close()` | 85 |  |
| `isOpen()` | 86 |  |
| `onDocCtx(e)` | 91 |  |
| `openCtx(e, taskId)` | 98 |  |
| `closeCtx()` | 116 |  |
| `buildSubmenus(task)` | 123 |  |
| `onMenuClick(e)` | 222 |  |
| `moveToCompany(tenantId)` | 317 | Move the task - and everything beneath it - to another company. |
| `setField(field, value)` | 339 |  |
| `esc(text)` | 367 |  |
| `escAttr(value)` | 373 |  |

## API endpoints it calls

- [api/system/get_tenants.php](/code/files/api/system/get_tenants.php.md)

## Loaded by

- [tasks/index.php](/code/files/tasks/index.php.md)
- [tasks/table/index.php](/code/files/tasks/table/index.php.md)
- [tasks/timeline/index.php](/code/files/tasks/timeline/index.php.md)

