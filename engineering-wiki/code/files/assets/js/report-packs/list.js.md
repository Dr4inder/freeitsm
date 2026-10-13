# assets/js/report-packs/list.js

> JavaScript - 265 lines

Reporting -> Report Packs list (reporting/packs/index.php).

Everything a pack's name or description contains goes onto the page with
textContent, never innerHTML: a shared pack's name is somebody else's text.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 11 |  |
| `el(tag, cls, text)` | 18 |  |
| `api(path, body)` | 25 |  |
| `load()` | 37 |  |
| `render()` | 49 |  |
| `card(p)` | 68 |  |
| `add(label, fn, cls)` | 96 |  |
| `open(id)` | 107 |  |
| `openModal(id)` | 110 | ── Modals ────────────────────────────────────────────────────────── |
| `closeModal(id)` | 116 |  |
| `showError(id, msg)` | 121 |  |
| `openNew(from)` | 127 |  |
| `create()` | 137 |  |
| `askDelete(p)` | 154 |  |
| `confirmDelete()` | 159 |  |
| `openShare(p)` | 173 | ── Sharing ───────────────────────────────────────────────────────── |
| `targetsFor(type)` | 188 |  |
| `fillShareTargets()` | 195 |  |
| `addShare()` | 204 |  |
| `key(s)` | 219 |  |
| `renderShares()` | 228 |  |
| `saveShares()` | 249 |  |

## Loaded by

- [reporting/packs/index.php](/code/files/reporting/packs/index.php.md)

