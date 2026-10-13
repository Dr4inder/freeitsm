# assets/js/domains-table.js

> JavaScript - 86 lines

Domains — table view config for the shared data-table engine (assets/js/data-table.js). The engine does everything else: sorting, per-column filters, search, the column drawer, CSV export, saved views.

Inline edits post just the one changed field to api/domains/save.php — the
service updates only the keys it is sent, and records the change in the
domain's history exactly as the edit form would.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `yn(v)` | 15 |  |
| `days(n)` | 16 |  |
| `pick(list, v)` | 79 |  |

## Loaded by

- [domains/table/index.php](/code/files/domains/table/index.php.md)

