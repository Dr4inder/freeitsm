# assets/js/projects-tour.js

> JavaScript - 159 lines

Projects help - "How it fits together" (3.3.0): an interactive map of the parts of a project and what feeds what, with a 12-step walk through an office move, and a filter showing what each way of running starts with.

Mounted into #prjTour by projects/tutorial.php - its own full-width page since
3.3.0 (?walk=1 / data-start="walk" opens on the walk; Left / Right step it). The words are projects.tour.*;
the tools each method switches on come from the presets
(window.PRJ_TOUR = {methods: {simple: [...], ...}, labels: {simple: 'Simple', ...}}),
so the map can never disagree with includes/projects/methodologies.php.

Accessible without the picture: every box is a button, and the panel beside
the map lists in words what the chosen part feeds and is fed by (each a
button too). Lines are decoration, redrawn on resize.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 18 |  |
| `TT(k)` | 19 |  |
| `esc(s)` | 20 |  |
| `cfg()` | 52 |  |
| `mount(el)` | 54 |  |
| `onClick(e)` | 80 |  |
| `syncMode()` | 88 |  |
| `isOff(tool)` | 90 |  |
| `related(id)` | 91 |  |
| `draw()` | 93 |  |
| `nodePanel(id)` | 109 |  |
| `chips(list)` | 113 |  |
| `walkPanel()` | 122 |  |
| `lines()` | 133 | Lines between the lit box and what it feeds / is fed by (explore), or between the step's boxes (walk). |
| `rect(id)` | 138 |  |
| `ends(a, b)` | 140 | From edge to edge, so the arrowhead is never under a box: side by side across columns, else top/bottom. |

## Loaded by

- [projects/tutorial.php](/code/files/projects/tutorial.php.md)

