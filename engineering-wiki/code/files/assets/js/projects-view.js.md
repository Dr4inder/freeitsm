# assets/js/projects-view.js

> JavaScript - 940 lines

Projects - one project's page (3.2.0).

Banner + Overview / Plan / Timeline / History. Everything is drawn from one call to
api/projects/get.php and redrawn after each change, so the ring, the counts
and the plan can never disagree with each other.

The Plan: each phase / stage / sprint is a lane of task rows; a task can be
dragged onto another lane (or onto "not in a phase yet"), and a task can be
added in place. Task rows open the task on the Tasks board - the task window
there is the one place a task is edited, so this page never grows a second one.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `timeboxKind()` | 27 |  |
| `methodLabel()` | 31 |  |
| `renderBanner()` | 37 |  |
| `renderOverview()` | 81 |  |
| `burnupPoints()` | 190 | Scope and done over time, worked out here from the tasks the page already has: each top-level task counts from the day it was created (scope) and the day it was completed (done) - one each, or its estimate in hours. A task moved into the project later counts from its creation; that is the honest reading of what is stored. |
| `renderBurnup()` | 210 |  |
| `stageMini(s)` | 257 |  |
| `historyItem(h)` | 267 |  |
| `renderHistory()` | 304 |  |
| `hrsTxt(h)` | 312 | "4h" / "1.5h" in the page's language. |
| `estimateCell(t)` | 320 | A task's estimate on the Plan (3.3.0): a small box to type it in, for those who may change the project; text for everyone else. Time logged shows beside it, red once it is over the estimate. |
| `taskRow(t)` | 331 |  |
| `isDefaultPriority(id)` | 353 | The default priority is what most tasks have, so its pill is noise: only the exceptions are shown. |
| `addRow(stageId)` | 363 | Each lane offers a light "+ Add a task" that opens the form. The lane whose form is open is remembered across redraws, so adding several tasks in a row keeps the box open and focused. |
| `lane(stage, tasks)` | 377 |  |
| `renderPlan()` | 415 |  |
| `renderAll()` | 433 |  |
| `showTab(name)` | 473 |  |
| `load()` | 486 |  |
| `refresh()` | 506 |  |
| `linkHistoryText(v)` | 517 |  |
| `linksSummary()` | 524 | "Connected to" chips on the Overview, one per kind that has links. |
| `linkRow(kind, r)` | 533 |  |
| `announcePanel()` | 551 | Service Status (3.2.0, going live safely): disruption this project has announced, and the Announce button. data.announcements is null for somebody who cannot open Service Status - then there is no panel at all. Planned maintenance is not an incident until it starts; the server turns it into one at its start and resolves it at its end. |
| `announceRow(serviceId, impactId)` | 573 |  |
| `openAnnounce()` | 588 |  |
| `saveAnnounce()` | 606 |  |
| `withdrawAnnounce(id)` | 624 |  |
| `renderConnections()` | 637 |  |
| `reloadLinks()` | 657 |  |
| `searchLinks(input)` | 664 |  |
| `linkAction(action, value)` | 680 |  |
| `openStage(stage)` | 695 |  |
| `saveStage()` | 712 |  |
| `setStageStatus(id, status)` | 734 |  |
| `cheer(name, stageId)` | 744 |  |
| `deleteStage()` | 750 |  |
| `addTask(form)` | 765 |  |
| `moveTask(taskId, stageId)` | 788 |  |
| `removeTask(taskId)` | 797 |  |
| `editProject()` | 807 |  |
| `deleteProject()` | 819 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

