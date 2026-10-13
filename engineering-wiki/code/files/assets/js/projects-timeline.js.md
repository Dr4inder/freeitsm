# assets/js/projects-timeline.js

> JavaScript - 456 lines

Projects - the Timeline tab (3.3.0): the plan against the calendar.

Each phase / stage / sprint is a BAND across its dates, its tasks are BARS
from start to due date, and milestones are DIAMONDS - in their stage's band,
or on a "Project milestones" row of their own. A line marks today and a
dashed one the target finish.

Moving things (mouse only): drag a bar or a band to move it, drag either end
to change one date, drag a diamond to move a milestone. Each drop is one
ordinary save through the server's rules - task_dates (TasksService, so the
Tasks board and its calendar follow), stage_save.php, milestone_save - and the
page redraws from the server's answer. Nothing here decides a rule.

🔑 TOUCH SCROLLS, IT NEVER DRAGS. A hand-rolled drag on a phone fights the
sideways scroll the chart needs (Mobile-Friendly-Techniques §22). Every bar,
band and diamond also opens on a tap - the task, the stage dialog, the
milestone dialog - so the dates can still be changed there; the drag is a
shortcut, never the only way.

Dates are whole days, counted in UTC (dayNum), so a bar never shifts by one
when the browser's time zone is ahead of or behind the server's.

DEPENDENCIES (3.3.0, includes/projects/dependencies.php): an arrow from the end
of the task waited for to the start of the one that waits - red when the
plan clashes (it starts before the other finishes). Critical path picks out
the tasks with no slack. The link button on a task's row opens its
dependencies (prjDepModal); the server refuses loops.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `labelWidth()` | 55 |  |
| `canChange()` | 58 |  |
| `timeboxKind()` | 61 |  |
| `taskSpan(t)` | 67 | A task's [start, end] as day numbers, or null when it has no date at all. |
| `stageSpan(s)` | 73 |  |
| `render(c)` | 78 |  |
| `draw(box)` | 86 |  |
| `drawArrows(box, LW)` | 239 | The dependency arrows (3.3.0), drawn from the bars where they landed: from the right end of the task waited for to the left end of the one that waits, as an elbow. Red and dashed where the plan clashes. Under the bars' text, over the grid; never in the way of a click. |
| `openDeps(taskId)` | 280 |  |
| `depCall(body)` | 308 |  |
| `scrollToToday(sc)` | 313 |  |
| `onDown(e)` | 321 |  |
| `onMove(e)` | 336 |  |
| `onUp()` | 349 |  |
| `click(el)` | 390 | A tap or a click without a drag: open the thing. |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

