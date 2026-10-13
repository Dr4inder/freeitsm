# assets/js/process-mapper.js

> JavaScript - 3424 lines

Process Mapper – flowchart editor

Features:
  - Dot-grid canvas with snap-to-grid (20px)
  - User-definable step types (from process_step_types) — each carries a
    name, shape and default colour; managed in Process Mapper → Settings
  - Drag to move steps; snap on drop
  - Ctrl+click or rubber-band to multi-select; arrow keys to nudge
  - Edge handles for drawing connectors; connectors have optional text
  - Slide-in detail panel on step click
  - Full CRUD via JSON API

## Functions

| Function | Line | What it does |
|---|--:|---|
| `PM(()` | 14 | Process Mapper – flowchart editor |
| `snap(v)` | 16 |  |
| `getType(slug)` | 24 |  |
| `shapeForSlug(slug)` | 27 |  |
| `init()` | 98 | Initialisation |
| `loadSidebarModePreference()` | 123 |  |
| `applySidebarMode(mode)` | 133 |  |
| `syncUrl(id)` | 151 | Write the URL to match the currently-open process. Uses pushState when the URL actually changes (so each user-driven open is a separate history entry); same-URL calls are a no-op (so popstate handlers don't accidentally double-push). |
| `openInitialFromUrl()` | 161 |  |
| `onPopState()` | 173 | Back/forward fires popstate with a URL the user navigated to. Reload whichever process that URL points at — and clear the canvas if the URL no longer carries an ?id. |
| `markDirty()` | 193 | Single entry-point for "something changed" — replaces the dozen scattered `dirty = true;` writes so we can hook status updates and the debounce timer in one place. |
| `scheduleAutosave()` | 200 |  |
| `setStatus(state)` | 217 | Status states: 'idle' \| 'unsaved' \| 'saving' \| 'saved' \| 'failed' \| 'off' |
| `loadAutosavePreference()` | 239 |  |
| `applyAutosaveState(on, persist)` | 250 |  |
| `toggleAutosave(on)` | 273 |  |
| `addArrowheadDef()` | 280 |  |
| `loadProcesses()` | 294 | Process list (sidebar) |
| `renderProcessList(filter = '')` | 305 |  |
| `filterProcesses(val)` | 323 |  |
| `createProcess()` | 337 | New process. Opens the page's own dialog rather than window.prompt(). |
| `closeNewProcess()` | 352 |  |
| `submitNewProcess()` | 357 |  |
| `deleteProcess(id)` | 390 |  |
| `openProcess(id, preserveDetail = false, fromHistory = false)` | 420 | Open / load a process `preserveDetail` — pass true when calling from `save()` so the detail panel stays open across the reload that picks up fresh real IDs. Caller is responsible for re-resolving the previous selection against the new data. `fromHistory` — pass true when called from popstate / initial-from-URL so we don't push the same URL onto the history stack again. |
| `renderAll()` | 504 | Render |
| `createStepEl(step)` | 530 |  |
| `renderConnectors()` | 580 |  |
| `calcConnectorPoints(from, to)` | 653 |  |
| `onStepMouseDown(e, step)` | 692 | Step interaction |
| `onStepDblClick(e, step)` | 752 |  |
| `finish()` | 765 |  |
| `bindCanvasEvents()` | 792 | Canvas events (drag, rubber-band, keys) |
| `onCanvasMouseDown(e)` | 800 |  |
| `onDocMouseMove(e)` | 839 |  |
| `onDocMouseUp(e)` | 917 |  |
| `onCanvasClick(e)` | 995 |  |
| `onCanvasKeyDown(e)` | 1009 |  |
| `startConnectDrag(e, step, side)` | 1057 | Connector dragging from edge handles |
| `findStepAt(x, y)` | 1075 |  |
| `addStep(type)` | 1085 | Add / remove steps and connectors |
| `stepDims(slug)` | 1137 | Box dimensions + default colour for each step type. Data-driven from window.STEP_TYPES_BY_SLUG (configured in Process Mapper → Settings): the type's shape decides the default size via window.SHAPE_SIZES, and the type's colour seeds the new step's colour (the per-step colour picker can still override it). Single source of truth shared by `addStep()` and `createConnectedStep()`. |
| `rectsOverlap(ax, ay, aw, ah, bx, by, bw, bh)` | 1148 |  |
| `onStepContextMenu(e, step)` | 1152 |  |
| `showContextMenu(x, y)` | 1173 |  |
| `rebuildReverseSubmenu(step, conns)` | 1213 | Rebuild the Reverse-connection submenu so each row lists one of the current step's connectors, with an arrow + the other end's label. Picking one flips just that connector's direction. |
| `escapeForAttr(s)` | 1242 |  |
| `hideContextMenu()` | 1248 |  |
| `bindContextMenu()` | 1254 |  |
| `changeStepType(step, newSlug)` | 1339 | Swap a step's type to a new slug. Resizes to the new type's default dimensions so a circle doesn't stay rectangle-shaped, and repaints with the new type's default colour (gradient cleared) so a step identifies visually with its new type. Use the colour picker in the detail panel afterwards if you want a custom colour back. |
| `copyFormat(step)` | 1373 | Copy/Apply formatting: stash colour + gradient from one step, paste them into another via the right-click menu. Position, label, type and size are deliberately not copied — only the "paint job". |
| `applyFormat(step)` | 1379 |  |
| `startClickConnect(fromStep)` | 1404 | Click-to-connect: arm a one-shot waiting state. The next mousedown on a step pairs them up; mousedown on empty canvas or Escape cancels. While armed we add a class to the canvas for cursor + visual cue, and surface a persistent toast prompt so the user knows what's expected. |
| `cancelClickConnect()` | 1413 |  |
| `completeClickConnect(targetStep)` | 1422 | Called from onStepMouseDown when click-to-connect is armed: completes (or rejects) the pairing and exits the mode. |
| `ctxEditLabel(step)` | 1443 | Edit label: alias for double-click inline rename. Reuses the same flow so there's only one rename code path to maintain. |
| `promptForUrl(step)` | 1450 | Open a `prompt()` to set/edit/clear the step's URL. Empty input clears it. Light validation: must start with http:// or https:// (or be empty). |
| `reverseConnector(c)` | 1486 | Reverse the direction of a single connector. |
| `deleteAllConnections(step)` | 1496 | Remove every connector incident to `step`. |
| `cloneStepData(step)` | 1515 | Capture the cloneable shape of a step — everything that ought to be duplicated by Copy / Cut / Duplicate. Position is NOT copied here; the caller picks where the new step goes. |
| `placeClonedStep(data, atX, atY)` | 1532 | Drop a new step at (atX, atY) from a clipboard payload, nudged off-grid until it doesn't overlap any existing step. Returns the new step. |
| `duplicateStep(step)` | 1575 | Duplicate: place a copy 40px down-right of the original. |
| `clearStepClipboardVisual()` | 1584 | Clipboard helpers — clear the previous cut's visual cue before stashing a fresh entry, otherwise a cut-then-copy-elsewhere would leave the original cut step looking faded forever. |
| `cutStep(step)` | 1592 |  |
| `copyStepForPaste(step)` | 1599 |  |
| `pasteStep(screenPos)` | 1608 | Drop a copy of the clipboard at the screen-coords stashed when the user right-clicked. If the clipboard was a Cut, also delete the source and clear the clipboard so the cut+paste pair behaves like a move. |
| `ctxDeleteStep(step)` | 1629 | Delete with confirm — the right-click "Delete…" item. |
| `getAnnotation(id)` | 1641 |  |
| `annotationRef(a)` | 1645 |  |
| `addAnnotation(nearStep)` | 1650 | Drop a new sticky note near `nearStep` (or the canvas centre if no step). |
| `createAnnotationEl(a)` | 1683 |  |
| `applyAnnotationStyle(el, a)` | 1709 |  |
| `onAnnotationMouseDown(e, a)` | 1719 |  |
| `onAnnotationDocMouseMove(e)` | 1731 |  |
| `onAnnotationDocMouseUp()` | 1754 |  |
| `selectAnnotation(a)` | 1760 |  |
| `showDetailForAnnotation(a)` | 1771 |  |
| `updateAnnotationFromDetail()` | 1790 |  |
| `createConnectedStep(source, type)` | 1808 | Create a new step of `type` placed neatly to the right of `source`, pre-connected source -> new, with the detail panel open and focused on the label box so the user can name it straight away. |
| `scrollStepIntoView(step)` | 1868 | Scroll the canvas so `step` sits comfortably within the viewport. |
| `addGroup()` | 1890 |  |
| `createGroupEl(group)` | 1911 |  |
| `applyGroupStyle(el, group)` | 1939 |  |
| `fillStyle(color, color2)` | 1953 | Returns the right CSS background string: gradient when color2 is set, otherwise solid. |
| `shade(hex, amt)` | 1961 | Light/darken a #rrggbb colour by `amt` units per channel (negative = darker). |
| `getGroup(id)` | 1972 |  |
| `groupRef(group)` | 1976 |  |
| `groupAtPoint(x, y)` | 1983 | Find the smallest group whose rectangle contains the point (x, y). Smallest wins when groups overlap, on the theory that nested-looking groups should claim contents in favour of the surrounding one. |
| `autoAssignAllStepGroups()` | 1996 | Tag every step with the group_id derived from where its centre currently sits. Run at the start of a group drag and after step drags so the step→group membership stays in sync with visual position. |
| `reassignStepGroups(stepIds)` | 2004 |  |
| `selectGroup(g)` | 2014 |  |
| `onGroupMouseDown(e, group)` | 2024 |  |
| `onGroupDocMouseMove(e)` | 2044 |  |
| `onGroupDocMouseUp()` | 2086 |  |
| `showDetailForGroup(g)` | 2107 |  |
| `updateGroupFromDetail()` | 2128 |  |
| `getLane(id)` | 2153 |  |
| `laneRef(lane)` | 2157 |  |
| `lanesOrdered()` | 2161 |  |
| `recomputeLaneBandTops()` | 2167 | Cache each lane's bandTop on the lane object after sorting. Run before any hit-test or render pass that needs lane Y coordinates. |
| `laneAtY(y)` | 2175 |  |
| `renderLanes()` | 2183 |  |
| `createLaneEl(lane)` | 2194 |  |
| `applyLaneStyle(el, lane)` | 2217 |  |
| `updateLaneSelectionVisuals()` | 2227 |  |
| `addLane()` | 2233 |  |
| `selectLane(lane)` | 2257 |  |
| `showDetailForLane(lane)` | 2268 |  |
| `updateLaneFromDetail()` | 2289 |  |
| `renderAllSteps()` | 2317 | Re-render only steps (cheap re-render that preserves selection visuals). |
| `resizeLaneTo(lane, newHeight)` | 2332 | Resize lane to `newHeight`. Everything visually below the lane's bottom edge (steps and groups) shifts by the delta so the bottom half of the canvas physically moves down/up with the divider. Visual position is used as the shift criterion (matching how groups already worked) so untagged or stale-tagged steps come along too. Existing lane_id values are left untouched — the next lane drag's auto-tag pass will reconcile. |
| `reorderLaneTo(lane, targetOrder)` | 2356 | Reorder lane to display_order = targetOrder. Steps and groups in every affected lane are shifted so they stay anchored to their lane band. Groups have no stored lane_id — their lane membership is derived on the fly from their vertical centre at snapshot time. |
| `onLaneHeaderMouseDown(e, lane)` | 2407 | Drag-to-reorder via the left-edge header. While dragging the header we visually translate the lane element with the cursor; on mouseup we work out which slot the cursor landed in and call `reorderLaneTo()`. |
| `onLaneDividerMouseDown(e, lane)` | 2427 |  |
| `onLaneDocMouseMove(e)` | 2443 |  |
| `onLaneDocMouseUp()` | 2495 |  |
| `reassignStepLanes(movedIds)` | 2505 | Called after a step drag completes — auto-assign lane_id based on where each moved step ended up. |
| `autoAssignAllStepLanes()` | 2523 | Scan every step on the canvas and assign lane_id based on where it visually sits. Run at the start of any lane drag so steps that *look* like they belong to a lane (but never got tagged — e.g. steps that pre-existed the lanes, or were dragged in before lanes existed) come along for the ride during reorder and resize. Cheap and idempotent. |
| `deleteSelectedLane()` | 2533 |  |
| `addConnector(fromId, toId)` | 2572 |  |
| `deleteSelected()` | 2586 |  |
| `updateSelectionVisuals()` | 2640 | Selection |
| `selectConnector(c)` | 2657 |  |
| `showDetailForStep(step)` | 2668 | Detail panel |
| `closeDetail()` | 2706 |  |
| `updateStepFromDetail()` | 2720 |  |
| `updateDetailPosition()` | 2750 |  |
| `updateConnectorLabel(cid, value)` | 2759 |  |
| `removeConnector(cid)` | 2768 |  |
| `editConnectorLabel(c, mx, my)` | 2780 |  |
| `finish()` | 2790 |  |
| `bindToolbar()` | 2811 | Toolbar |
| `save(isAutosave = false)` | 2826 | Save `isAutosave` controls toast suppression and re-scheduling on retry. |
| `getStep(id)` | 3015 | Helpers |
| `clearCanvas()` | 3019 |  |
| `exportToMermaid()` | 3050 | Export — Mermaid Generates Mermaid flowchart markup from the current process state. Lanes become `subgraph` blocks (LR direction so lanes stack vertically like horizontal swimlanes). Step types map to classic Mermaid shapes for maximum renderer compatibility. Groups are *not* exported — Mermaid only has subgraphs and we're already using those for lanes; nesting would look messy. Hand-placed positions, colours, and gradients don't survive — Mermaid auto-layouts. |
| `escLabel(text)` | 3052 | Escape a label for use inside a Mermaid quoted string. |
| `nodeId(step)` | 3059 |  |
| `nodeDef(step)` | 3064 | Map each Process Mapper shape to its closest Mermaid v10 flowchart syntax. Mermaid doesn't have a 1:1 for every shape — cloud and document collapse onto nearby classic shapes (circle, parallelogram). |
| `openExportModal()` | 3134 | Open the export modal in its default state: the three-tile format chooser is visible; the Mermaid markup is collapsed until the user picks "Mermaid". |
| `closeExportModal()` | 3141 |  |
| `showMermaid()` | 3152 | Reveal the Mermaid markup view inside the modal — generates and pre-selects the text so the user can Ctrl-C straight away. |
| `copyExport()` | 3164 |  |
| `exportFilename(ext)` | 3191 | Slugify the current process title for the download filename. |
| `computeExportRect()` | 3204 | Bounding box of everything worth capturing — steps, groups, and the visible footprint of lanes if any are defined. Padded by 40px so the export doesn't feel cramped at the edges. |
| `captureCanvas()` | 3248 | Snapshot the canvas via html2canvas. Stashes scroll state + canvas dimensions and restores them afterwards, even if the capture throws. |
| `exportToPng()` | 3320 |  |
| `exportToPdf()` | 3334 |  |
| `esc(str)` | 3370 |  |
| `toggleProcessDocs()` | 3389 | Documents attached to the PROCESS (discussion #76). |
| `closeProcessDocs()` | 3403 |  |

## API endpoints it calls

- [api/system/get_user_preference.php](/code/files/api/system/get_user_preference.php.md)
- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)

## Loaded by

- [process-mapper/index.php](/code/files/process-mapper/index.php.md)

