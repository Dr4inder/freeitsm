# assets/js/projects-settings.js

> JavaScript - 293 lines

Projects -> Settings (3.2.0).

Fills every [data-k] control from api/projects/settings.php, shows each
default under it, saves a tab at a time (the server checks that tab's
capability), runs the Roles list (add, edit, deactivate, delete, drag to
reorder) and the Templates list (show or hide a built-in; rename, switch off
or delete a saved one) over api/projects/templates.php.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `defaultLabel(key, value)` | 22 |  |
| `fill()` | 53 |  |
| `save(tab)` | 83 |  |
| `renderTemplates()` | 102 |  |
| `tplCall(body)` | 119 |  |
| `wireTemplates()` | 132 |  |
| `renderRoles()` | 168 |  |
| `openRole(role)` | 181 |  |
| `renderRates()` | 195 |  |
| `rateCall(body)` | 206 |  |
| `wireRates()` | 210 |  |
| `roleCall(body)` | 229 |  |

## Loaded by

- [projects/settings/index.php](/code/files/projects/settings/index.php.md)

