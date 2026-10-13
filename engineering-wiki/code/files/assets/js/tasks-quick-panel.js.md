# assets/js/tasks-quick-panel.js

> JavaScript - 177 lines

FreeITSM Tasks — Shared right-side quick-look detail panel

Used by the calendar and the timeline (any view where the full dashboard
editor would be overkill but the user still wants to peek-and-edit
without losing their place). Shows: title (editable), status / priority /
assignee / team / start / due dates (editable), tags (read-only chips),
description (read-only HTML preview). A launch-icon link in the header
takes the user to the dashboard's full editor for richer changes
(subtasks, comments, rich-text description).

The page provides:
  - apiBase:        base URL for get.php / save.php (e.g. '../api/tasks/')
  - `getLookups()`:   return { analysts, teams, statuses, priorities }
  - `onUpdate()`:     called after the panel closes — typically `loadTasks()`
                    so the calendar/timeline re-renders with any edits
  - fullEditUrl(id): URL the header launch icon links to

The panel markup is injected by this module on first `init()` (so pages
only need to load the script, not include duplicate HTML).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `init(config)` | 30 |  |
| `ensureMarkup()` | 46 |  |
| `open(id)` | 63 |  |
| `close()` | 76 |  |
| `saveField(field, value)` | 85 |  |
| `render(task)` | 96 |  |
| `esc(text)` | 168 |  |

## Loaded by

- [tasks/calendar/index.php](/code/files/tasks/calendar/index.php.md)
- [tasks/timeline/index.php](/code/files/tasks/timeline/index.php.md)

