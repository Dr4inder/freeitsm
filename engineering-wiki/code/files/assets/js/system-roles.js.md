# assets/js/system-roles.js

> JavaScript - 194 lines

System → Roles (RBAC Layer 2).

Create roles, tick the settings capabilities they grant, and assign them to
analysts and teams. Everything a role touches is saved as one unit by role.php.
The capability list, analyst list and team list are embedded server-side
(window.RBAC_*) — the page is admin-only, so there's nothing sensitive in
shipping them to the browser, and it saves a round-trip.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `init()` | 20 |  |
| `load()` | 26 |  |
| `render()` | 34 |  |
| `openCreate()` | 70 |  |
| `create(e)` | 76 |  |
| `openEdit(id)` | 89 |  |
| `renderCapabilities(selected)` | 107 |  |
| `renderPicker(elId, items, selectedIds, showAdmin)` | 127 |  |
| `save(e)` | 138 |  |
| `remove(id, name)` | 160 |  |
| `post(endpoint, body)` | 175 |  |
| `open(id)` | 188 |  |
| `close(id)` | 189 |  |

## API endpoints it calls

- [api/system/roles.php](/code/files/api/system/roles.php.md)

## Loaded by

- [system/roles/index.php](/code/files/system/roles/index.php.md)

