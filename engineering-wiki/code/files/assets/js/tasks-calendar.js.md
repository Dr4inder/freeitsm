# assets/js/tasks-calendar.js

> JavaScript - 520 lines

FreeITSM Tasks — Calendar View

Renders parent tasks onto a month grid. How a task that spans several days
(start_date earlier than due_date) is drawn depends on the calendar span
mode set in Tasks → Settings → Calendar:
  deadline — a single chip on the due date only
  span     — one continuous bar across the whole range
  repeat   — a chip in every day cell of the range

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadSettings()` | 55 |  |
| `loadStatuses()` | 63 |  |
| `loadPriorities()` | 73 |  |
| `loadDropdowns()` | 80 |  |
| `visibleProjected()` | 110 | Future occurrences of fixed-schedule repeats (#94), honouring the same who-is-it-for filter as the real tasks beside them. |
| `loadProjected()` | 124 |  |
| `ymd(d)` | 129 |  |
| `loadTasks()` | 138 |  |
| `setSubtaskScope(scope)` | 154 | ── Filters ──────────────────────────────────────────────────────── |
| `setFilter(filter)` | 168 |  |
| `setTeamFilter(teamId)` | 180 |  |
| `setAnalystFilter(analystId)` | 190 |  |
| `calPrev()` | 201 | ── Navigation ───────────────────────────────────────────────────── |
| `calNext()` | 207 |  |
| `calToday()` | 213 |  |
| `setView(mode)` | 222 |  |
| `renderCalendar()` | 232 | ── Rendering ────────────────────────────────────────────────────── |
| `placedTasks()` | 244 | Resolve each task to the date range it occupies, respecting span mode. Projected occurrences (#94) are merged in here rather than rendered separately, so they get the same placement, span and week-wrapping logic and cannot drift from how real tasks are drawn. |
| `renderWeekRow(weekStart, todayStr, placed, monthCtx)` | 258 | Render one week's day cells + bars. monthCtx is the month number to dim out-of-month cells against (or null in week view, where no dimming applies). |
| `renderMonth()` | 308 |  |
| `renderWeek()` | 345 |  |
| `renderDay()` | 377 |  |
| `renderBars(iv)` | 433 |  |
| `make(col, span, extraCls)` | 459 |  |
| `renderLegend()` | 480 |  |
| `openTask(id)` | 491 | Bars and day-view rows open the shared quick-look panel |
| `mondayCol(d)` | 495 | ── Utilities ────────────────────────────────────────────────────── Monday-based column index (Mon=0 … Sun=6) |
| `ymd(d)` | 497 |  |
| `dayDiff(a, b)` | 504 | Whole days from date string a to date string b (b assumed >= a) |
| `fmt(ds)` | 510 |  |
| `esc(text)` | 514 |  |

## API endpoints it calls

- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)

## Loaded by

- [tasks/calendar/index.php](/code/files/tasks/calendar/index.php.md)

