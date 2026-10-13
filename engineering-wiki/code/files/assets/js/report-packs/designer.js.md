# assets/js/report-packs/designer.js

> JavaScript - 1455 lines

Report Packs - the designer (reporting/packs/designer.php).

Office-style: a ribbon (Home, Insert, Layout, Design, Data), a searchable
toolbox with live previews, real pages with rulers, a properties pane, drag
and drop with snapping to a 12-column grid, resize handles, text edited in
place, undo/redo, shortcuts and a right-click menu.

STATE AND RENDERING
  S.design is the single source of truth. Every change goes through `commit()`,
  which snapshots for undo, marks the pack unsaved and re-renders. Rendering
  asks the engine for pages (engine.js) and draws them as SVG (render-svg.js),
  with a layer of HTML frames on top for selection, handles and drop guides.
  Nothing here measures text or decides a page break.

Text from a pack (names, titles, data) is put on the page with textContent;
the only HTML this file writes is its own fixed markup.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `h(tag, attrs, ...kids)` | 43 |  |
| `api(path, body, method)` | 62 |  |
| `icon(name, size)` | 124 |  |
| `commit(fn, opts)` | 140 | Every change to the design goes through here. opts.data the change affects what data is fetched (options, criteria) opts.merge coalesce with the previous step if it had the same key (typing in a field) |
| `undo()` | 165 |  |
| `redo()` | 174 |  |
| `setDirty(d)` | 183 |  |
| `loadData()` | 193 |  |
| `boot()` | 198 |  |
| `build()` | 220 |  |
| `iconBtn(name, title, fn, id)` | 259 |  |
| `ribbonTabs()` | 264 |  |
| `buildRibbon()` | 275 |  |
| `rb(iconName, label, fn, opts)` | 290 | A ribbon button. big = icon over label (Office's large buttons). |
| `sel(options, value, onChange, opts)` | 303 |  |
| `colourPick(value, onChange, label, opts)` | 311 |  |
| `homeGroups()` | 325 |  |
| `insertGroups()` | 372 |  |
| `marginName(m)` | 404 |  |
| `layoutGroups()` | 410 |  |
| `widthGlyph(span)` | 437 |  |
| `designGroups()` | 443 |  |
| `dataGroups()` | 473 |  |
| `afterCriteria()` | 499 |  |
| `refreshRibbonState()` | 504 | Pressed/disabled state of the ribbon, from the selection and the cursor. |
| `buildToolbox()` | 528 |  |
| `renderTools()` | 543 |  |
| `blockFromTool(key)` | 582 | A block made from a toolbox item. |
| `insertTool(key, at)` | 594 | Double-click / Enter / ribbon: put the block after the selection, or at the end. |
| `schedulePreview(t, item)` | 608 |  |
| `hidePreview()` | 612 |  |
| `showPreview(t, item)` | 616 |  |
| `scheduleRender()` | 648 |  |
| `pxmm()` | 654 |  |
| `render()` | 656 |  |
| `regionHit(kind, x, y, w, hgt)` | 704 |  |
| `frame(it, k)` | 712 |  |
| `frameLabel(b)` | 736 |  |
| `hRuler(G, k)` | 744 | The horizontal ruler: centimetres, the margins, and the column grid of the selection's row. |
| `vRuler(G, k)` | 772 |  |
| `renderStatus()` | 788 |  |
| `setZoom(z)` | 807 |  |
| `fitWidth()` | 812 |  |
| `select(id, scrollTo)` | 819 |  |
| `renderProps()` | 828 |  |
| `selectCtl(options, value, onChange, ro)` | 904 |  |
| `optionControl(b, k, def, ro, upd)` | 910 |  |
| `setSpan(id, span)` | 930 |  |
| `moveBlock(id, dir)` | 934 |  |
| `deleteBlock(id)` | 944 |  |
| `clip()` | 956 |  |
| `copyBlock()` | 960 |  |
| `cutBlock()` | 968 |  |
| `pasteBlock()` | 969 |  |
| `duplicateBlock()` | 976 |  |
| `announce(msg)` | 985 |  |
| `bindCanvas()` | 991 |  |
| `dropTarget(cx, cy, movingId)` | 1027 | Where a drop at (clientX, clientY) would land: {index, side, indicator} |
| `startDrag(e, what)` | 1072 |  |
| `showGuide(guide, t)` | 1110 |  |
| `autoScroll(cy)` | 1121 |  |
| `stopAutoScroll()` | 1127 |  |
| `applyDrop(what, t)` | 1130 | Put the dragged block where the guide was. Side drops share the row. |
| `rowOf(blocks, id)` | 1168 | The blocks sharing a row with `id`, as the engine flows them. |
| `startResize(e, id, edge)` | 1183 |  |
| `editBlock(id)` | 1227 |  |
| `editHeading(b)` | 1239 |  |
| `editRegion(kind)` | 1261 |  |
| `openEditor(what, pageEl, x, y, w, hgt, doc, onSave, label)` | 1281 |  |
| `outside(e)` | 1305 |  |
| `contextMenu(x, y, id)` | 1316 |  |
| `menuOutside(e)` | 1343 |  |
| `closeMenu()` | 1344 |  |
| `bindKeys()` | 1347 |  |
| `save(force)` | 1383 |  |
| `conflictDialog(msg)` | 1407 |  |
| `copyPack()` | 1419 |  |
| `exportPdf()` | 1426 |  |
| `toast(msg, warn)` | 1440 |  |

## Loaded by

- [reporting/packs/designer.php](/code/files/reporting/packs/designer.php.md)

