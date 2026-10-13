# assets/js/report-packs/engine.js

> JavaScript - 894 lines

Report Packs - the layout engine.

Turns a pack's design (+ each block's data) into PAGES: every line of text,
table cell, bar and picture with its exact position in millimetres. Two
renderers draw those pages - render-svg.js on screen, render-pdf.js into the
PDF - and neither makes a layout decision of its own. That is the whole
reason the PDF matches the screen: there is only one place where a line
breaks or a table runs onto the next page, and it is here.

TEXT IS MEASURED WITH THE PDF'S OWN FONT METRICS
------------------------------------------------
Widths come from jsPDF (Helvetica, Times, Courier - the PDF standard fonts),
not from the browser. The screen then draws each line at the x the engine
chose, with textLength pinning its width, so a browser whose Arial is a
hair wider than Helvetica still breaks at the same word.

Those fonts cover Western European text (WinAnsi), which includes Spanish
accents and ñ. Characters outside it are drawn on screen but cannot go into
the PDF; `hasUnsupported()` lets the designer say so instead of letting them
silently turn into question marks.

Units: millimetres throughout. Font sizes are points; PT converts.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `styleKey(b, i)` | 43 |  |
| `charUnits(font, style, ch)` | 45 |  |
| `textWidth(str, st)` | 64 | Width in mm of `str` set in this style. |
| `hasUnsupported(str)` | 72 |  |
| `layoutDoc(doc, width, ctx)` | 93 | Lay out a rich-text document in a box `width` mm wide. ctx: {font, size, color, fields: {page, pages, ...}, logo: {w, h} \| null} Returns {height, lines: [...], images: [...]} with y measured from the top. |
| `tokenise(runs, base, ctx)` | 175 | Runs -> tokens: words, spaces and hard breaks, each with its style and width. |
| `fieldValue(name, fields)` | 200 |  |
| `breakLines(tokens, avail)` | 206 | Greedy line breaking. A word wider than the line is split by characters. |
| `mergeRuns(items)` | 245 | Join neighbouring tokens of identical style into one run (fewer SVG/PDF calls). |
| `sameStyle(a, b)` | 255 |  |
| `wrapPlain(text, width, st)` | 261 | Plain text wrapped into lines - for table cells and captions. |
| `themeStyle(theme, extra)` | 280 |  |
| `txt(x, baseline, text, st, w)` | 285 | A line of plain text as a draw primitive. |
| `rect(x, y, w, h, fill, extra)` | 288 |  |
| `hline(x1, x2, y, color, width)` | 289 |  |
| `baselineFor(top, size)` | 291 |  |
| `onColour(hex)` | 294 | Contrast text for a coloured pill. |
| `pill(x, top, text, colour, size, theme)` | 301 |  |
| `measureHeading(b, theme)` | 311 |  |
| `measureText(b, width, theme, ctx)` | 321 |  |
| `titleDraw(b, data, width, theme)` | 335 | The block's title line (data blocks), with the "snapshot" caption under it. |
| `measureKpi(data, width, theme, top)` | 353 |  |
| `fit(text, width, st)` | 376 | Truncate with an ellipsis to fit a width. |
| `measureTable(data, width, theme, top)` | 388 | Tables. Rows are the units a table splits on; the header repeats at the top of every page it continues onto. |
| `tableDraw(T, from, to, withFoot)` | 464 | One table "part": the header plus rows [from, to), positioned from y=0. |
| `shift(d, dy)` | 480 |  |
| `measureUptime(data, width, theme, top)` | 487 | Service uptime: one unit per service - name, uptime, daily bars, incidents. |
| `pageGeometry(design)` | 548 |  |
| `layoutPart(part, width, theme, ctx)` | 557 | Header/footer/cover laid out for one page's fields. |
| `paginate(design, dataMap, ctx)` | 574 | The whole pack as pages. design the cleaned design dataMap block id -> {data} \| {error} \| undefined (still loading) ctx {fields: {...}, logo: {w,h}\|null, title, labels: {...}} |
| `placeRow(r)` | 663 |  |
| `place(it, part, x)` | 673 | Put a block (or one page's part of it) on the current page at y. |
| `tocDraw(design, theme, headings, offset, part, G, headerH, footerH)` | 730 |  |
| `blockSpan(b)` | 757 |  |
| `offset(d, x, y, w)` | 762 | Move a primitive from block coordinates to page coordinates. |
| `measureBlock(b, entry, width, theme, ctx)` | 773 | Measure one block. Returns {h, draw, split?, chart?, rich?, minH?, state?}. |
| `placeholder(width, top, h, text, theme, isError)` | 828 |  |
| `tableSplitter(T, title)` | 837 | Splitters: `start()` -> state; take(state, room, minUnits?) -> {n, h, draw, rest, continued} |
| `unitSplitter(units, title)` | 854 |  |
| `textSplitter(m)` | 871 |  |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

