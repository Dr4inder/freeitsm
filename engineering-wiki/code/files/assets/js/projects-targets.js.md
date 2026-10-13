# assets/js/projects-targets.js

> JavaScript - 215 lines

Projects - asset targets on a project's Overview (3.2.0): live progress measured from Assets ("12 of 44 Latitude 5430s retired"), each with a burn-up line, plus the dialog that sets one up and the "what's left" list.

projects-view.js draws the Overview with an empty #pvTargets and then calls
PrjTargets.render({data, projectId, refresh}). Every rule - the whitelisted
fields, the company, Assets access - is server-side in
includes/projects/targets.php; this file only draws and asks.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `scopePhrase(t)` | 25 |  |
| `rulePhrase(t)` | 32 |  |
| `spark(t)` | 38 |  |
| `card(t)` | 51 |  |
| `render()` | 71 |  |
| `options()` | 89 |  |
| `fillOps(field, sel)` | 93 |  |
| `setScope(s)` | 101 |  |
| `rule()` | 108 |  |
| `preview()` | 118 |  |
| `open(t)` | 130 |  |
| `save()` | 153 |  |
| `openList(t, show)` | 162 |  |
| `find(id)` | 187 |  |
| `wire()` | 189 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

