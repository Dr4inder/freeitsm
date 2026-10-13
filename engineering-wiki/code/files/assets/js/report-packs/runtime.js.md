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
| `T(k, p)` | 13 |  |
| `create(apiBase, logoUrl)` | 15 |  |
| `post(path, body)` | 25 |  |
| `keyFor(b)` | 30 |  |
| `pump()` | 34 |  |
| `loadData()` | 52 | Start fetching whatever the design needs and is not cached. Resolves when all are in. |
| `fetchBlock(b)` | 71 | One block's data, through the same cache and queue (toolbox previews). |
| `refresh()` | 85 | Forget cached data (the Refresh button, or new criteria). |
| `dataMap()` | 87 |  |
| `loadContext()` | 98 | The header fields for the current criteria. |
| `loadLogo()` | 108 |  |
| `ctx()` | 130 |  |
| `layout()` | 138 |  |
| `chartImage(item, scale)` | 143 | A chart item's picture at `scale`, cached on everything that changes it. |
| `checkUnsupported()` | 157 | True when some text cannot be put into the PDF's fonts. |
| `docText(d)` | 160 |  |
| `fileName()` | 168 |  |
| `clean(s)` | 169 |  |
| `buildPdf()` | 177 | Load everything, lay out, and build the PDF. Resolves to the jsPDF document. |
| `exportPdf()` | 188 |  |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

