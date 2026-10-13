# assets/js/projects-tools.js

> JavaScript - 810 lines

Projects - the tools on a project's page (3.2.0 phase 2): People, Scope (the MoSCoW board) and the RACI matrix.

projects-view.js owns the page and its data; after every redraw it calls
PrjTools.render({data, L, projectId, refresh, page}) and this file draws the
three tool panels from that same data, so nothing here can disagree with the
banner or the plan. Every change goes to api/projects/tools.php and then asks
the view to refresh.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `canChange()` | 19 |  |
| `call(body)` | 20 |  |
| `kindIcon(kind)` | 23 |  |
| `renderPeople()` | 25 |  |
| `roleOpts(sel)` | 28 |  |
| `quadrant(m)` | 61 |  |
| `stanceChip(s)` | 62 |  |
| `stakeMap(members)` | 63 |  |
| `cell(q)` | 69 | Rows: high power first. Columns: low interest, then high. |
| `openStake(id)` | 82 |  |
| `lv(sel, v)` | 85 |  |
| `saveStake()` | 93 |  |
| `openMember()` | 102 |  |
| `loadContractors()` | 115 |  |
| `fillContacts()` | 123 |  |
| `fillMemberPick()` | 128 |  |
| `searchPeople()` | 152 |  |
| `saveMember()` | 168 |  |
| `itemCard(it)` | 185 |  |
| `renderScope()` | 193 |  |
| `openItem(it)` | 212 |  |
| `saveItem()` | 232 |  |
| `renderRaci()` | 245 |  |
| `cycleRaci(btn)` | 276 |  |
| `raidPlural(t)` | 297 |  |
| `raidLate(r)` | 299 | A dependency or a decision still open after its date is LATE - it turns health amber. |
| `scoreClass(s)` | 302 |  |
| `heatMap(risks)` | 304 |  |
| `raidRow(r)` | 322 |  |
| `renderRaid()` | 344 |  |
| `setRaidType(t)` | 377 |  |
| `raidEscalationHtml(r)` | 386 | Escalation (3.3.0): the current one, or the box to escalate. A saved, open entry only. |
| `raidActionsHtml(r)` | 401 | Follow-up actions (3.3.0): project tasks, each opening on the Tasks board. |
| `fillRaidExtras(r)` | 414 |  |
| `raidReopen(id)` | 421 | Re-read the entry after an escalation or an action, keeping the dialog open. |
| `raidEscalate(btn)` | 426 |  |
| `raidAction(add, btn)` | 435 |  |
| `openRaid(r)` | 446 |  |
| `scale(labels)` | 448 |  |
| `raidBody()` | 483 |  |
| `saveRaid()` | 493 |  |
| `raidKbHtml(r)` | 504 | A lesson -> a draft Knowledge article; an issue -> a new ticket (3.2.0). Only on a saved entry, only with the other module, only when the project can be changed - the server checks all three again. |
| `raidRaiseHtml(r)` | 514 |  |
| `raidAct(action, btn)` | 519 |  |
| `searchTicket()` | 537 |  |
| `exceptionsBanner(exc)` | 553 | The red banner naming each tolerance breach - shared with the Overview. |
| `renderGates()` | 559 |  |
| `gateChanges()` | 607 | Linked changes not yet approved (3.2.0, going live safely). A WARNING, never a block: the gate is the board's decision, and it may know the change is a formality. ctx.data.gate_changes is null when this analyst cannot open Changes - then the gate says nothing, rather than "none". |
| `gateChangesBox()` | 611 |  |
| `openGate(stage)` | 623 |  |
| `saveGate()` | 636 |  |
| `wire()` | 651 |  |
| `render(c)` | 798 |  |

## API endpoints it calls

- [api/tasks/contractors.php](/code/files/api/tasks/contractors.php.md)
- [api/projects/export.php](/code/files/api/projects/export.php.md)

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

