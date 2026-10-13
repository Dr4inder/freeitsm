# assets/js/projects-toolbox.js

> JavaScript - 103 lines

Projects - the Toolbox on the Overview (3.3.0).

A project starts with the tools its way of running switches on (Simple: People
only; Agile: People, Scope, RAID; Staged: all eight - includes/projects/
methodologies.php). Somebody new to running projects should not meet a RACI
matrix and earned value on day one, so the Overview lists the tools NOT yet in
use - what each is for and when you would want it - with Add, and moves up the
ones the project itself suggests ("4 people on it - RACI says who does what").

Adding a tool writes the project's tailoring, exactly as the Edit form's Tools
boxes do (save.php, field `tailoring`), so it can be taken away there again.
RACI needs People and Scope (its columns and rows), so adding it adds those.

Off for the whole install with Projects -> Settings -> General -> Toolbox
(lookups `toolbox`); "Hide" hides it for this project in this browser.

  PrjToolbox.render({ data, L, projectId, refresh })   from projects-view.js

## Functions

| Function | Line | What it does |
|---|--:|---|
| `isHidden(id)` | 31 |  |
| `reason(tool, d)` | 34 | Why the project itself suggests a tool, or null. Reads only what get.php already sent. |
| `render(c)` | 54 |  |
| `add(tool)` | 79 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

