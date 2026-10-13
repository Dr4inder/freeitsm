# assets/js/projects-reports.js

> JavaScript - 297 lines

Projects - the Overview's briefing and the Reports tab: the AI project manager (3.2.0). Rules: includes/services/project_reports.php; the AI: includes/projects/ai.php.

The AI only PROPOSES. A briefing is marked as the AI's; a report is a draft
until someone who may approve it does, and an approved report is final.
Report text is a small Markdown subset (## heading, - bullet, **bold**),
drawn by `md()` below, which escapes everything first.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 14 |  |
| `call(body)` | 24 |  |
| `when(s)` | 25 |  |
| `md(text)` | 28 | Escape, then the three marks the AI is told to use. Nothing else becomes markup. |
| `inline(s)` | 29 |  |
| `flush()` | 33 |  |
| `close()` | 34 |  |
| `aiError(r)` | 48 |  |
| `fetchState()` | 54 |  |
| `drawBriefing()` | 64 |  |
| `brief()` | 80 |  |
| `badges(r)` | 91 |  |
| `drawReports()` | 98 |  |
| `draw()` | 133 |  |
| `draftWithAi()` | 135 |  |
| `setMode(mode)` | 148 |  |
| `openReport(id)` | 157 |  |
| `fail(e)` | 182 |  |
| `save(quiet)` | 184 |  |
| `approve()` | 194 |  |
| `remove()` | 207 |  |
| `openSend()` | 215 |  |
| `send()` | 228 |  |
| `setSchedule()` | 248 |  |
| `copy()` | 259 |  |
| `wire()` | 265 |  |
| `render(c)` | 289 | Called by projects-view.js after every redraw: the Overview's slot is new each time. |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

