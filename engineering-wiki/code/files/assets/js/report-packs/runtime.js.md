# assets/js/report-packs/runtime.js

> JavaScript - 199 lines

Report Packs - the runtime shared by the designer and by export.

Owns the things a pack needs besides its design: each block's data (fetched
with the VIEWER's rights, cached by handler + options + criteria so moving a
block never refetches it), the header fields for the period, the logo, and
the chart images. `layout()` asks the engine for pages; `exportPdf()` turns the
same pages into a file.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `create(apiBase, logoUrl)` | 15 |  |
| `post(path, body)` | 25 |  |
| `keyFor(b)` | 30 |  |
| `pump()` | 34 |  |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

