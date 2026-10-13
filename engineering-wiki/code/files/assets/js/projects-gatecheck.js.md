# assets/js/projects-gatecheck.js

> JavaScript - 160 lines

Projects - stage gate checklists (3.3.0). Rules: includes/projects/gatecheck.php.

Fills the checklist into each gate the Gates tab draws (projects-tools.js
`renderGates()` leaves a [data-gc] box per stage and calls `fill()`), and puts
what is still open into the decide box (openBox()). Whether an item is done
comes from the server - a change item is done when the change is approved,
a document item while that document is still on the project.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 13 |  |
| `$(id)` | 15 |  |
| `call(body)` | 20 |  |
| `canChange()` | 21 |  |
| `gate()` | 22 |  |
| `itemsOf(stageId)` | 23 |  |
| `when(dt)` | 24 |  |
| `itemRow(i)` | 26 |  |
| `fill(c)` | 61 | Every gate's checklist, into the boxes `renderGates()` left. |
| `openBox(stageId)` | 84 | What is still open at a gate, for the decide box - and whether it blocks a go. |
| `openItem(stageId, item)` | 93 |  |
| `showKind()` | 109 |  |
| `saveItem()` | 115 |  |
| `find(id)` | 124 |  |
| `stageOfItem(id)` | 128 |  |
| `wire()` | 130 |  |
| `act(body, toast)` | 134 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

