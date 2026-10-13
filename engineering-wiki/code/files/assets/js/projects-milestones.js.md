# assets/js/projects-milestones.js

> JavaScript - 202 lines

Projects - milestones on a project's page (3.3.0).

A milestone is a named date the project promises ("Move day"). This file
draws them in three places and owns the one dialog that edits them:
  Overview  #pvMilestones - what is coming up and what was missed, with Done
  Plan      diamonds in each lane's head (chips()) and a strip for the whole
            project's ones (projectStrip()), plus the Milestone button
  Timeline  projects-timeline.js draws them and calls `open()` / `save()`

Done, missed or due is worked out by the server (includes/projects/milestones.php)
and sent as `state`; this file never decides it, so the page, the health and the
bell always agree.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `canChange()` | 23 |  |
| `list()` | 26 |  |
| `diamond(m, size)` | 31 | The diamond, coloured by state. |
| `daysFromToday(d)` | 35 |  |
| `phrase(m)` | 38 | "Reached on time" / "Missed" / "In 5 days" - a phrase for the state. |
| `chip(m)` | 49 | A clickable chip: diamond, name, date. |
| `chips(stageId)` | 55 | The diamonds in one lane's head (stageId) - '' when it has none. |
| `projectStrip()` | 61 | The whole project's milestones, above the lanes on the Plan. |
| `renderOverview()` | 68 |  |
| `item(m)` | 78 |  |
| `stageOptions(selected)` | 94 |  |
| `open(m, defaults)` | 100 | Open the dialog for milestone m, or a new one (defaults: {stage_id, due_date}). |
| `save(body)` | 121 | Write a milestone (a partial body is fine) and redraw. Returns the server's reply. |
| `saveDialog()` | 133 |  |
| `remove()` | 157 |  |
| `render(c)` | 192 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

