# assets/js/report-packs/render-pdf.js

> JavaScript - 130 lines

Report Packs - draw the engine's pages into a PDF with jsPDF.

The twin of render-svg.js: same primitives, same coordinates, same order.
Text is real PDF text in the standard fonts (searchable, selectable, sharp),
charts are images at ~300 dpi, and the logo is embedded ONCE under an alias
however many pages carry it (see the note in assets/js/form-pdf.js on what an
un-aliased logo does to file size).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `rgb(hex)` | 15 |  |
| `safe(text)` | 23 |  |
| `setStyle(doc, st)` | 32 |  |
| `drawText(doc, x, y, text, st, w)` | 38 |  |
| `drawPrim(doc, d)` | 54 |  |
| `drawRich(doc, rich, logo)` | 81 |  |
| `build(layout, opts)` | 97 | Build the PDF. layout = RPEngine.paginate(...) result. opts: {title, logo: {dataUrl}\|null, chartImage(item) -> PNG dataURL} |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

