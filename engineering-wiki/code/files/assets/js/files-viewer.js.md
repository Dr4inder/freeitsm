# assets/js/files-viewer.js

> JavaScript - 628 lines

Files — the viewer. Opens a file in a desktop window (or full screen on a phone) without downloading it.

PDF          Mozilla pdf.js (assets/js/vendor/pdfjs/), pages drawn to canvas
               as they scroll into view; pdf.js fetches only the byte ranges it
               needs, so a 300-page manual opens at page one straight away.
  Word .docx   mammoth.js turns the document into plain HTML, which is then
               SANITISED here against an allowlist before it touches the page.
  Spreadsheets SheetJS, one tab per sheet, cells written as text only.
  Images, video, audio  the browser's own elements.
  Text and code shown as text, never as markup.
  Zip archives  browsed like a folder (SheetJS's own zip reader, XLSX.CFB); any
               entry opens in this same viewer. Entries are NOT fetched from the
               server one by one - the browser unpacks the zip in memory and the
               viewer works from those bytes (pdf.js from data, media from a blob:
               URL). Opening or downloading an entry is still audited: view.php's
               'entry' action records which one.

The bytes come from api/files/view.php through a short-lived token that lives
in the person's session; download.php is only used when they may download.

VIEW-ONLY (no Download permission): no download button, no right-click, no
text selection, nodownload on media, and printing blanks the page. A deterrent,
not DRM - the watermark (a per-folder setting) is what makes a leak traceable,
and it is drawn over whatever is shown, so it is in any screenshot.

TRAP: libraries load on first use (pdf.js alone is ~1.7 MB) - never add them
to files/index.php's <script> tags.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `api(body)` | 43 |  |
| `h(tag, cls, html)` | 48 |  |
| `fmtSize(n)` | 49 |  |
| `icon(path)` | 55 |  |
| `loadScript(src)` | 67 |  |
| `onerror()` | 73 |  |
| `loadPdfjs()` | 80 |  |
| `fetchBytes(url, cap)` | 91 |  |
| `sanitise(html)` | 106 |  |
| `extOf(name)` | 153 |  |
| `kindOf(name)` | 154 |  |
| `auditEntry(entry, what)` | 160 | Opening or saving something INSIDE a zip happens in the browser - so tell the server, for the audit trail. |
| `colName(i)` | 165 | ── Spreadsheet column letters ───────────────────────────────────────── |
| `renderInto(host, info, opts)` | 171 | Draw a file into `host` (a window body or the phone overlay). info = view.php's open response. Returns a controller {destroy()}. |
| `getBytes(cap)` | 177 | The file's bytes - from memory for a zip entry, else from view.php. |
| `mediaUrl()` | 185 | A URL an <img>/<video> can use: view.php's, or a blob: for a zip entry (typed by us, never SVG). |
| `baseDestroy()` | 243 |  |
| `error(e)` | 244 |  |
| `noPreview()` | 248 |  |
| `zoomTools(onZoom)` | 256 |  |
| `renderPdf()` | 279 | ── PDF ──────────────────────────────────────────────────────────── |
| `fitScale()` | 286 |  |
| `destroy()` | 315 |  |
| `layout()` | 341 |  |
| `draw(pg)` | 355 |  |
| `updatePage()` | 380 |  |
| `renderDocx()` | 389 | ── Word ─────────────────────────────────────────────────────────── |
| `renderSheet()` | 413 | ── Spreadsheets ─────────────────────────────────────────────────── |
| `show(name)` | 420 |  |
| `renderImage()` | 460 | ── Images ───────────────────────────────────────────────────────── |
| `fitZoom()` | 470 |  |
| `apply()` | 471 |  |
| `onload()` | 472 |  |
| `onerror()` | 473 |  |
| `renderMedia()` | 478 | ── Video and audio ──────────────────────────────────────────────── |
| `onerror()` | 487 |  |
| `destroy()` | 492 |  |
| `renderZip()` | 499 | ── Zip archives ─────────────────────────────────────────────────── A folder view of the archive; opening an entry swaps the stage for that entry's own viewer, with a way back to the list. Nested zips just work - an entry that is a zip is browsed the same way. |
| `showList()` | 524 |  |
| `openEntry(f)` | 552 |  |
| `destroy()` | 580 |  |
| `renderText()` | 586 | ── Text ─────────────────────────────────────────────────────────── |
| `open(id, versionId, opts)` | 597 | Open a file in a viewer window. versionId optional (Properties -> Versions). |
| `onClose()` | 606 |  |
| `openPhone(info)` | 615 | Phones: the same viewer, full screen over the list. |

## Loaded by

- [files/index.php](/code/files/files/index.php.md)

## Traps

> [!WARNING]
> **Line 113:** elements inside <svg>/<math> report LOWER-case tag names, so

> [!WARNING]
> **Line 281:** "fit" must be MEASURED when it is asked for. It was worked out once

> [!WARNING]
> **Line 509:** SheetJS's reader adds a marker entry "\u0001Sh33tJ5"; no real

