# assets/js/report-packs/render-svg.js

> JavaScript - 117 lines

Report Packs - draw the engine's pages on screen, as SVG in millimetres.

This renderer makes no layout decisions. Every x, y and width comes from
engine.js, and each text run is pinned to the width the engine measured
(textLength) - so if the browser's Arial differs a hair from the PDF's
Helvetica, the run is nudged to fit rather than wrapping differently.

Text is set with textContent only; nothing from a pack is ever parsed as markup.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `el(name, attrs, parent)` | 17 |  |
| `fontAttrs(st)` | 24 |  |
| `drawText(g, x, y, text, st, w)` | 34 |  |
| `drawPrim(g, d)` | 48 |  |
| `drawRich(g, rich, logoUrl)` | 67 |  |
| `page(pg, G, opts)` | 83 | Draw one page into a new <svg>. opts: {logoUrl, chartImage(item) -> dataURL\|null} |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

