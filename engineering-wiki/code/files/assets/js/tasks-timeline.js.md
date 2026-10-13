# assets/js/tasks-timeline.js

> JavaScript - 464 lines

FreeITSM Tasks — Timeline (Gantt) View

Each parent task with at least one date is drawn as a horizontal bar from
its start_date to its due_date (a task with only a due_date is a single-day
bar). Rows are grouped by assignee, status, or shown flat.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadSettings()` | 69 |  |
| `loadDropdowns()` | 81 |  |
| `loadStatuses()` | 102 |  |
| `loadPriorities()` | 109 |  |
| `loadTasks()` | 116 |  |
| `setFilter(filter)` | 130 |  |
| `setTeamFilter(teamId)` | 142 |  |
| `setAnalystFilter(analystId)` | 152 |  |
| `setGroupBy(value)` | 162 |  |
| `render()` | 165 |  |
| `buildGroups(items)` | 300 |  |
| `scrollToToday()` | 328 |  |
| `openTask(id)` | 337 |  |
| `ymd(d)` | 340 |  |
| `addDays(ds, n)` | 346 |  |
| `dayDiff(a, b)` | 352 |  |
| `fmt(ds)` | 356 |  |
| `esc(text)` | 360 |  |
| `addDayStr(ds, n)` | 367 |  |
| `onBarMouseDown(e)` | 370 |  |
| `onDragMove(e)` | 396 |  |
| `onDragUp(e)` | 417 |  |

## Loaded by

- [tasks/timeline/index.php](/code/files/tasks/timeline/index.php.md)

