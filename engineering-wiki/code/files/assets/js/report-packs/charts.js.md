# assets/js/report-packs/charts.js

> JavaScript - 130 lines

Report Packs - charts.

Every chart is drawn by Chart.js onto a canvas that is a fixed size IN
MILLIMETRES (CSS pixels = mm x PX_PER_MM). Only the resolution changes:
devicePixelRatio is the zoom on screen and ~300 dpi for the PDF. Because
Chart.js lays out in CSS pixels, the legend, labels and bars land in the same
places at every resolution - the PDF's chart is the screen's chart, sharper.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `colours(data, palette)` | 25 |  |
| `render(chart, theme, scale, labels)` | 34 | Draw `chart` ({w, h in mm, data, block}) and return a canvas. scale = device pixels per CSS pixel. |
| `fontPx(pt)` | 53 |  |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

