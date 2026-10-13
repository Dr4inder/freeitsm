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
| `getType(slug)` | 24 |  |
| `shapeForSlug(slug)` | 27 |  |
| `init()` | 98 |  |
| `loadSidebarModePreference()` | 123 |  |
| `applySidebarMode(mode)` | 133 |  |
| `syncUrl(id)` | 151 |  |
| `openInitialFromUrl()` | 161 |  |
| `onPopState()` | 173 |  |
| `markDirty()` | 193 |  |
| `scheduleAutosave()` | 200 |  |
| `setStatus(state)` | 217 |  |
| `loadAutosavePreference()` | 239 |  |
| `applyAutosaveState(on, persist)` | 250 |  |
| `toggleAutosave(on)` | 273 |  |
| `addArrowheadDef()` | 280 |  |
| `loadProcesses()` | 294 |  |
| `renderProcessList(filter = '')` | 305 |  |
| `filterProcesses(val)` | 323 |  |
| `createProcess()` | 337 | New process. Opens the page's own dialog rather than window.prompt(). |
| `closeNewProcess()` | 352 |  |
| `submitNewProcess()` | 357 |  |
| `deleteProcess(id)` | 390 |  |
| `openProcess(id, preserveDetail = false, fromHistory = false)` | 420 |  |
| `renderAll()` | 504 |  |
| `createStepEl(step)` | 530 |  |
| `renderConnectors()` | 580 |  |
| `calcConnectorPoints(from, to)` | 653 |  |
| `onStepMouseDown(e, step)` | 692 |  |
| `onStepDblClick(e, step)` | 752 |  |
| `bindCanvasEvents()` | 792 |  |
| `onCanvasMouseDown(e)` | 800 |  |
| `onDocMouseMove(e)` | 839 |  |
| `onDocMouseUp(e)` | 917 |  |
| `onCanvasClick(e)` | 995 |  |
| `onCanvasKeyDown(e)` | 1009 |  |
| `startConnectDrag(e, step, side)` | 1057 |  |
| `findStepAt(x, y)` | 1075 |  |
| `addStep(type)` | 1085 |  |
| `stepDims(slug)` | 1137 |  |
| `rectsOverlap(ax, ay, aw, ah, bx, by, bw, bh)` | 1148 |  |
| `onStepContextMenu(e, step)` | 1152 |  |
| `showContextMenu(x, y)` | 1173 |  |
| `rebuildReverseSubmenu(step, conns)` | 1213 |  |
| `escapeForAttr(s)` | 1242 |  |
| `hideContextMenu()` | 1248 |  |
| `bindContextMenu()` | 1254 |  |
| `changeStepType(step, newSlug)` | 1339 |  |
| `copyFormat(step)` | 1373 |  |
| `applyFormat(step)` | 1379 |  |
| `startClickConnect(fromStep)` | 1404 |  |
| `cancelClickConnect()` | 1413 |  |
| `completeClickConnect(targetStep)` | 1422 |  |
| `ctxEditLabel(step)` | 1443 |  |
| `promptForUrl(step)` | 1450 |  |
| `reverseConnector(c)` | 1486 |  |
| `deleteAllConnections(step)` | 1496 |  |
| `cloneStepData(step)` | 1515 |  |
| `placeClonedStep(data, atX, atY)` | 1532 |  |
| `duplicateStep(step)` | 1575 |  |
| `clearStepClipboardVisual()` | 1584 |  |
| `cutStep(step)` | 1592 |  |
| `copyStepForPaste(step)` | 1599 |  |
| `pasteStep(screenPos)` | 1608 |  |
| `ctxDeleteStep(step)` | 1629 |  |
| `getAnnotation(id)` | 1641 |  |
| `annotationRef(a)` | 1645 |  |
| `addAnnotation(nearStep)` | 1650 |  |
| `createAnnotationEl(a)` | 1683 |  |
| `applyAnnotationStyle(el, a)` | 1709 |  |
| `onAnnotationMouseDown(e, a)` | 1719 |  |
| `onAnnotationDocMouseMove(e)` | 1731 |  |
| `onAnnotationDocMouseUp()` | 1754 |  |
| `selectAnnotation(a)` | 1760 |  |
| `showDetailForAnnotation(a)` | 1771 |  |
| `updateAnnotationFromDetail()` | 1790 |  |
| `createConnectedStep(source, type)` | 1808 |  |
| `scrollStepIntoView(step)` | 1868 |  |
| `addGroup()` | 1890 |  |
| `createGroupEl(group)` | 1911 |  |
| `applyGroupStyle(el, group)` | 1939 |  |
| `fillStyle(color, color2)` | 1953 |  |
| `shade(hex, amt)` | 1961 |  |
| `getGroup(id)` | 1972 |  |
| `groupRef(group)` | 1976 |  |
| `groupAtPoint(x, y)` | 1983 |  |
| `autoAssignAllStepGroups()` | 1996 |  |
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
| `recomputeLaneBandTops()` | 2167 |  |
| `laneAtY(y)` | 2175 |  |
| `renderLanes()` | 2183 |  |
| `createLaneEl(lane)` | 2194 |  |
| `applyLaneStyle(el, lane)` | 2217 |  |
| `updateLaneSelectionVisuals()` | 2227 |  |
| `addLane()` | 2233 |  |
| `selectLane(lane)` | 2257 |  |
| `showDetailForLane(lane)` | 2268 |  |
| `updateLaneFromDetail()` | 2289 |  |
| `renderAllSteps()` | 2317 |  |
| `resizeLaneTo(lane, newHeight)` | 2332 |  |
| `reorderLaneTo(lane, targetOrder)` | 2356 |  |
| `onLaneHeaderMouseDown(e, lane)` | 2407 |  |
| `onLaneDividerMouseDown(e, lane)` | 2427 |  |
| `onLaneDocMouseMove(e)` | 2443 |  |
| `onLaneDocMouseUp()` | 2495 |  |
| `reassignStepLanes(movedIds)` | 2505 |  |
| `autoAssignAllStepLanes()` | 2523 |  |
| `deleteSelectedLane()` | 2533 |  |
| `addConnector(fromId, toId)` | 2572 |  |
| `deleteSelected()` | 2586 |  |
| `updateSelectionVisuals()` | 2640 |  |
| `selectConnector(c)` | 2657 |  |
| `showDetailForStep(step)` | 2668 |  |
| `closeDetail()` | 2706 |  |
| `updateStepFromDetail()` | 2720 |  |
| `updateDetailPosition()` | 2750 |  |
| `updateConnectorLabel(cid, value)` | 2759 |  |
| `removeConnector(cid)` | 2768 |  |
| `editConnectorLabel(c, mx, my)` | 2780 |  |
| `bindToolbar()` | 2811 |  |
| `save(isAutosave = false)` | 2826 |  |
| `getStep(id)` | 3015 |  |
| `clearCanvas()` | 3019 |  |
| `exportToMermaid()` | 3050 |  |
| `openExportModal()` | 3134 |  |
| `closeExportModal()` | 3141 |  |
| `showMermaid()` | 3152 |  |
| `copyExport()` | 3164 |  |
| `exportFilename(ext)` | 3191 |  |
| `computeExportRect()` | 3204 |  |
| `captureCanvas()` | 3248 |  |
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

