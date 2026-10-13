# assets/js/engineering-wiki.js

> JavaScript - 598 lines

Engineering wiki - the small browser round the pages (System -> Engineering wiki).

Model:
  panes[]   one, or two side by side ("Open beside")
    tabs[]  each tab has its own history (a list of "page#anchor") and position
  the ACTIVE pane is the one the toolbar (back / forward / address) acts on.

Links in a page carry data-ew-page. Click = open here; Ctrl/Cmd+click or middle-
click = new tab; right-click = Open / Open in new tab / Open beside / Copy link.
The open tabs are remembered in this browser (localStorage) - a convenience only;
?page= in the address always wins.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `esc(s)` | 44 |  |
| `splitTarget(t)` | 45 |  |
| `pageUrl(target)` | 46 |  |
| `fetchPage(page)` | 50 |  |
| `newTabObj(target)` | 60 |  |
| `cur(tab)` | 61 |  |
| `openIn(paneIdx, target, background)` | 63 |  |
| `navigate(paneIdx, target)` | 78 |  |
| `go(delta)` | 92 |  |
| `closeTab(paneIdx, tabIdx)` | 101 |  |
| `openBeside(target, fromPane)` | 115 |  |
| `paneView(i)` | 123 |  |
| `renderAll()` | 125 |  |
| `loadTitle(tab)` | 151 |  |
| `renderTabStrips()` | 156 |  |
| `crumbs(page)` | 166 |  |
| `showTab(pi)` | 176 |  |
| `updateToolbar()` | 226 |  |
| `highlightActive()` | 236 |  |
| `save()` | 242 |  |
| `restore()` | 251 |  |
| `treeRow(item, isDir)` | 265 |  |
| `loadDir(dir, into)` | 283 |  |
| `buildTree()` | 297 |  |
| `markCurrent()` | 310 |  |
| `runSearch(q)` | 317 |  |
| `closeMenu()` | 337 |  |
| `showMenu(x, y, items)` | 338 |  |
| `linkMenu(x, y, target, paneIdx)` | 355 |  |
| `copy(text)` | 365 |  |
| `fallbackCopy(text)` | 370 |  |
| `toast(msg)` | 378 |  |
| `bindDivider(div)` | 388 |  |
| `move(ev)` | 393 |  |
| `up()` | 399 |  |
| `paneOf(el)` | 407 |  |
| `closeOutlines()` | 476 |  |
| `toggleOutline(btn, pi)` | 477 |  |
| `rescanStep()` | 560 |  |

## Traps

> [!WARNING]
> **Line 70:** `renderAll()` rebuilds EVERY pane's DOM, so every pane is redrawn (from

> [!WARNING]
> **Line 207:** not "target" - a var here is hoisted over the whole callback and

