# assets/js/report-packs/editor.js

> JavaScript - 403 lines

Report Packs - editing rich text in place.

A text box, the header, the footer or the cover is edited by laying a
contentEditable box over it on the page, styled to match. The ribbon's Home
tab drives it (bold, colour, lists, alignment...). When editing ends, the
HTML is read back into the paragraph model (docToHtml / htmlToDoc) and the
engine lays it out again.

The HTML here is only ever the analyst's own, built by docToHtml from the
stored model with every piece of text escaped; it is never stored. What is
stored is the model, which the server checks field by field.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 18 |  |
| `esc(s)` | 20 |  |
| `runHtml(r)` | 25 | ── Model -> HTML (for the editor) ───────────────────────────────────── |
| `docToHtml(doc, logoUrl)` | 42 |  |
| `closeTo(lv)` | 45 |  |
| `hex(colour)` | 74 | ── HTML -> model (when editing ends) ────────────────────────────────── |
| `sizePt(v)` | 84 |  |
| `styleOf(node, inherited)` | 93 | Read a run style from an element and inherited style. |
| `pushRun(runs, text, st)` | 115 |  |
| `collectRuns(node, st, runs)` | 128 |  |
| `alignOf(el)` | 153 |  |
| `trimRuns(runs)` | 158 |  |
| `htmlToDoc(root)` | 164 |  |
| `walk(container, listCtx)` | 166 |  |
| `flushLoose()` | 168 |  |
| `wrapList(list)` | 224 |  |
| `restoreRange()` | 242 |  |
| `open(opts)` | 257 | Open an editor over a rectangle (CSS px, relative to `host`). opts: {host, left, top, width, minHeight, doc, theme, zoom, logoUrl, onDone(doc), onInput} |
| `scaleFont(node, pxPerMm)` | 295 |  |
| `onPaste(e)` | 301 | Pasting brings plain text only: a report's styles come from the report. |
| `placeCaretAtEnd(el)` | 307 |  |
| `close(commit)` | 316 | End editing. commit=false (Escape) still keeps the text - Word has no "discard". |
| `isActive()` | 332 |  |
| `element()` | 333 |  |
| `cmd(name, value)` | 336 | ── Commands from the ribbon ─────────────────────────────────────────── |
| `wrapSelection(fn)` | 360 |  |
| `state()` | 373 | What the cursor is sitting in, so the ribbon can show it (B pressed etc.). |
| `q(c)` | 375 |  |
| `setLogoWidth(mm)` | 394 | Set the width (mm) of the logo the cursor is next to. |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

