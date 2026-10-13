# assets/js/domains-register.js

> JavaScript - 675 lines

Domains — the register page (domains/index.php).

The whole scoped register is loaded once (a few hundred rows is nothing) and
filtered, sorted and counted in the browser, so every sidebar click is
instant and the counts beside each view are always the counts of what you
would see. The server already removed anything outside the analyst's
companies — nothing here hides rows for security, only for convenience.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `init()` | 59 |  |
| `load(withLookups)` | 70 |  |
| `fillLookups()` | 84 |  |
| `filtered()` | 115 |  |
| `v(id)` | 117 |  |
| `defaultCompanyId()` | 135 |  |
| `render()` | 140 |  |
| `renderViews()` | 170 |  |
| `renderStats()` | 179 |  |
| `c(fn)` | 180 |  |
| `renderSelBar()` | 195 |  |
| `wire()` | 202 |  |
| `openAdd()` | 256 |  |
| `saveAdd()` | 263 |  |
| `openMany()` | 289 |  |
| `saveMany()` | 298 |  |
| `showAddResult(boxId, d)` | 322 | "Added 42, skipped 3" then the lookups, in batches, with a progress bar. |
| `processIds(ids, label, holderId)` | 339 | Look up + check domains in batches of five, drawing progress. Anything not finished (the tab closed, the network dropped) is simply picked up by the scheduled run — a never-looked-up domain is first in its queue. |
| `draw()` | 351 |  |
| `openImport()` | 390 |  |
| `parseCsv(text)` | 400 | RFC 4180-ish: quoted fields, doubled quotes, commas or semicolons. |
| `readCsv()` | 425 |  |
| `drawMapping()` | 438 |  |
| `runImport()` | 454 |  |
| `saveBulk()` | 478 |  |
| `put(id, key)` | 480 |  |
| `bulkDelete()` | 494 |  |
| `svg(k)` | 524 |  |
| `ctxMenu()` | 526 |  |
| `item(action, icon, label, extra)` | 539 |  |
| `sub(label, icon, opts)` | 543 |  |
| `opt(field, value, label, current, swatch)` | 548 |  |
| `openCtx(e, id)` | 554 |  |
| `closeCtx()` | 585 |  |
| `onCtxClick(e)` | 591 |  |
| `wireCtx()` | 644 |  |

## Loaded by

- [domains/index.php](/code/files/domains/index.php.md)

