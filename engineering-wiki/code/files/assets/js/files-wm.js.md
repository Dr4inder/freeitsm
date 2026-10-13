# assets/js/files-wm.js

> JavaScript - 680 lines

Files — the window manager.

Windows that drag, resize from any edge or corner, snap (top = maximise, left
or right edge = half the screen), minimise to the taskbar and restore. Hover a
taskbar button for a live preview of the window; click the preview to bring it
back. Also the shared pieces every app on the desktop uses: context menus,
dialogs, notifications, the clock, and the navbar's on/auto-hide/off.

Deliberately our own rather than a library (WinBox and friends): the taskbar
and its previews have to know everything about every window, and that
coupling is most of the work.

The apps (Explorer, uploads, permissions...) live in files-desktop.js and only
talk to this file through window.FilesWM.

TRAP: a minimised window is display:none, so it has no layout. The preview
clones it into a box sized from its remembered geometry instead of measuring
it - measuring a hidden element returns zeros and the preview is blank.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `el(tag, cls, html)` | 37 |  |
| `esc(s)` | 43 |  |
| `L(key, english, params)` | 48 |  |
| `area()` | 49 |  |
| `clamp(v, lo, hi)` | 50 |  |
| `Win(opts)` | 53 | ── Windows ──────────────────────────────────────────────────────────── |
| `done()` | 177 |  |
| `focusTopmost()` | 235 |  |
| `saveGeo(w)` | 245 |  |
| `snapZone(ev)` | 250 | ── Drag, snap and resize ────────────────────────────────────────────── |
| `showGhost(zone)` | 257 |  |
| `startDrag(w, ev)` | 269 |  |
| `move(e)` | 279 |  |
| `up(e)` | 307 |  |
| `startResize(w, ev, dir)` | 338 |  |
| `move(e)` | 348 |  |
| `up()` | 361 |  |
| `schedulePreview(w)` | 392 |  |
| `schedulePreviewHide()` | 397 |  |
| `hidePreview()` | 401 |  |
| `snapshot(w, boxW, boxH)` | 415 | A live picture of the window: a deep clone, scaled down. Canvases do not clone (a cloned canvas is blank), so each is redrawn from its original; a video becomes a canvas holding its current frame. |
| `showPreview(w)` | 444 |  |
| `menu(x, y, items, opts)` | 470 | items: [{label, icon?, action?, disabled?, checked?, shortcut?, sub?: [...]}, {sep: true}] opts.above: open upwards from the point (taskbar). |
| `build(container, items)` | 487 |  |
| `closeMenus()` | 509 |  |
| `dialog(o)` | 531 | A small modal window. Resolves with the clicked button's value, or with {button, value} when there is an input. Escape = the button marked cancel. dialog({title, message, icon?, input?: {value, selectName?: true}, buttons: [{label, value, primary?, cancel?}]}) |
| `finish(v)` | 562 |  |
| `onKey(ev)` | 578 |  |
| `notify(text, kind)` | 603 |  |
| `tick()` | 613 |  |
| `layoutTop()` | 630 |  |
| `setNavbar(mode)` | 634 |  |
| `open(opts)` | 658 |  |
| `windows()` | 667 |  |
| `active()` | 668 |  |
| `onGeometry(fn)` | 674 |  |

## Loaded by

- [files/index.php](/code/files/files/index.php.md)

## Traps

> [!WARNING]
> **Line 280:** a button released where we never hear about it (over the Help

