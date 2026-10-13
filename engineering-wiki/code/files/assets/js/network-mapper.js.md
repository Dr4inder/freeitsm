# assets/js/network-mapper.js

> JavaScript - 2755 lines

Network Mapper — editor module (chunks A + B + C + D part 1).

Chunk D Part 1 adds connectors:
  - SVG layer behind nodes hosts connector paths + arrowhead defs
  - 4 edge handles per node (top/right/bottom/left), invisible until the
    node is hovered or selected. mousedown on a handle starts a connect
    drag — a dashed temp line tracks the cursor until mouseup. If mouseup
    lands on another node, a connector is created between source and
    target (free-form by default; cmdb_relationship_id stays NULL until
    part 2's relationships pull-in populates it from CMDB)
  - connectors store from_node_id/to_node_id as either the real node id
    (positive int from the server) or the tempId (negative int for nodes
    placed but not yet saved). save_diagram.php resolves both through
    its nodeIdMap, so connecting two brand-new nodes and hitting save
    works in a single round-trip
  - click a connector to select (cyan + thicker stroke); Delete removes
    it. Connector and node selections are mutually exclusive
  - double-click on a connector prompts for a label which renders mid-line
  - `renderConnectors()` is called after every node move/place/delete so
    lines track their endpoints; arrowheads are SVG markers (the same
    pattern Process Mapper uses)

Convention: every exported entry point goes on window.NM so the inline
HTML can call NM.save(), NM.toggleAutosave() etc. without scope concerns.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `init(id)` | 138 |  |
| `loadBrandingDefaults()` | 232 |  |
| `bindCanvasEvents()` | 249 |  |
| `ensureSvgLayer()` | 304 |  |
| `loadDiagram()` | 331 |  |
| `loadClasses()` | 352 |  |
| `renderHeader()` | 366 |  |
| `renderPalette()` | 387 |  |
| `onTileDragStart(e)` | 413 |  |
| `applyReadOnlyState()` | 422 |  |
| `snap(v)` | 448 |  |
| `canvasModelCoords(e)` | 456 |  |
| `onCanvasDrop(e)` | 464 |  |
| `openObjectPicker(cls, x, y)` | 484 |  |
| `closeObjectPicker()` | 499 |  |
| `fetchPickerResults(q)` | 504 |  |
| `renderPickerResults()` | 520 |  |
| `onPickerSearchInput(value)` | 555 |  |
| `onPickerKeyDown(e)` | 560 |  |
| `commitPickerSelection(obj)` | 580 |  |
| `nodeKey(n)` | 606 |  |
| `findNodeByKey(key)` | 613 |  |
| `renderNodes()` | 618 |  |
| `buildNodeEl(n)` | 636 |  |
| `nodeRef(n)` | 684 |  |
| `findNodeByRef(ref)` | 692 |  |
| `nodeIconBBox(n)` | 697 |  |
| `selectNode(key)` | 715 |  |
| `onNodeMouseDown(e)` | 736 |  |
| `onNodeMouseMove(e)` | 758 |  |
| `onNodeMouseUp()` | 779 |  |
| `deleteSelectedNode()` | 788 |  |
| `connectorKey(c)` | 815 |  |
| `findConnectorByKey(key)` | 822 |  |
| `selectConnector(key)` | 827 |  |
| `renderConnectors()` | 834 |  |
| `calcConnectorPoints(from, to)` | 914 |  |
| `deleteSelectedConnector()` | 941 |  |
| `promptConnectorLabel(c)` | 952 |  |
| `startConnectDrag(e, fromNode, side)` | 1004 |  |
| `onConnectDragMove(e)` | 1023 |  |
| `onConnectDragUp(e)` | 1039 |  |
| `commitConnectorDrag(fromRef, toRef)` | 1062 |  |
| `findNodeAt(x, y)` | 1078 |  |
| `openDetailForNode(n)` | 1091 |  |
| `loadNodeProperties(cmdbObjectId)` | 1135 |  |
| `renderNodeProperties(props)` | 1153 |  |
| `renderPropertyValue(p)` | 1185 |  |
| `pillTextColour(hex)` | 1253 |  |
| `closeDetail()` | 1265 |  |
| `openRelatedModal()` | 1277 |  |
| `closeRelatedModal()` | 1301 |  |
| `fetchRelatedRows(cmdbObjectId)` | 1308 |  |
| `renderRelatedRows()` | 1320 |  |
| `updateRelatedAddBtn()` | 1385 |  |
| `commitRelatedSelections()` | 1395 |  |
| `cssEscape(s)` | 1506 |  |
| `markDirty()` | 1520 |  |
| `scheduleAutosave()` | 1527 |  |
| `setStatus(state)` | 1543 |  |
| `loadAutosavePreference()` | 1562 |  |
| `applyAutosaveState(on, persist)` | 1572 |  |
| `toggleAutosave(on)` | 1596 |  |
| `openIconPicker()` | 1609 |  |
| `closeIconPicker()` | 1623 |  |
| `onIconSearchInput(value)` | 1629 |  |
| `renderIconPicker()` | 1634 |  |
| `commitIconPick(key)` | 1678 |  |
| `resetIconOverride()` | 1693 |  |
| `toggleVersionsDropdown(e)` | 1709 |  |
| `closeVersionsDropdown()` | 1721 |  |
| `fetchVersionList()` | 1725 |  |
| `renderVersionList(versions)` | 1736 |  |
| `togglePageDropdown(e)` | 1777 |  |
| `closePageDropdown()` | 1788 |  |
| `renderPageDropdown()` | 1792 |  |
| `applyPageSetting(size, orient)` | 1848 |  |
| `updatePageButtonLabel()` | 1865 |  |
| `pageDimensionsPx(size, orient)` | 1879 |  |
| `renderPageOutline()` | 1887 |  |
| `resolveBrandingSlot(key)` | 1956 |  |
| `brandingTokenContext()` | 1962 |  |
| `renderSlotHtml(text, ctx)` | 1980 |  |
| `renderBrandHeaderFooter()` | 2005 |  |
| `openBrandingModal()` | 2064 |  |
| `closeBrandingModal()` | 2087 |  |
| `commitBrandingOverrides()` | 2096 |  |
| `resetBrandingOverrides()` | 2119 |  |
| `save(isAutoSave)` | 2136 |  |
| `openNewVersionModal()` | 2238 |  |
| `closeNewVersionModal()` | 2260 |  |
| `suggestNextVersionLabel(current)` | 2264 |  |
| `createNewVersion()` | 2272 |  |
| `applyZoom()` | 2310 |  |
| `setZoom(z)` | 2328 |  |
| `zoomIn()` | 2342 |  |
| `zoomOut()` | 2343 |  |
| `zoomReset()` | 2344 |  |
| `zoomNext(dir)` | 2346 |  |
| `zoomFit(opts)` | 2363 |  |
| `enterPresent()` | 2425 |  |
| `exitPresent()` | 2450 |  |
| `isPresenting()` | 2470 |  |
| `centreOnPage()` | 2483 |  |
| `exportFilename(ext)` | 2544 |  |
| `computeExportRect()` | 2554 |  |
| `captureCanvas()` | 2578 |  |
| `exportPng()` | 2647 |  |
| `exportPdf()` | 2660 |  |
| `formatDate(s)` | 2691 |  |
| `escapeHtml(s)` | 2699 |  |
| `escapeAttr(s)` | 2702 |  |

## API endpoints it calls

- [api/system/get_branding.php](/code/files/api/system/get_branding.php.md)
- [api/network-mapper/get_diagram.php](/code/files/api/network-mapper/get_diagram.php.md)
- [api/network-mapper/get_related_objects.php](/code/files/api/network-mapper/get_related_objects.php.md)
- [api/network-mapper/list_versions.php](/code/files/api/network-mapper/list_versions.php.md)
- [api/network-mapper/save_diagram.php](/code/files/api/network-mapper/save_diagram.php.md)
- [api/network-mapper/create_version.php](/code/files/api/network-mapper/create_version.php.md)
- [api/cmdb/get_classes.php](/code/files/api/cmdb/get_classes.php.md)
- [api/cmdb/get_objects.php](/code/files/api/cmdb/get_objects.php.md)
- [api/cmdb/get_object.php](/code/files/api/cmdb/get_object.php.md)
- [api/system/get_user_preference.php](/code/files/api/system/get_user_preference.php.md)
- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)

## Loaded by

- [network-mapper/diagram.php](/code/files/network-mapper/diagram.php.md)

