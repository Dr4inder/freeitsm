# cmdb/audit.js

> JavaScript - 99 lines

CMDB data-quality audit page.

Renders one card per check. Every card is shown even when it finds nothing —
a clean check is information ("references are sound"), and hiding it would
leave the reader unable to tell a passing check from one that never ran.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `esc(s)` | 21 |  |
| `tr(key, params)` | 27 |  |
| `loadAudit()` | 29 |  |
| `render(audit)` | 41 |  |
| `card(c)` | 61 |  |

## API endpoints it calls

- [api/cmdb/get_audit.php](/code/files/api/cmdb/get_audit.php.md)

## Loaded by

- [cmdb/audit.php](/code/files/cmdb/audit.php.md)

