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
| `init(id)` | 138 | Initialisation |
| `loadBrandingDefaults()` | 232 |  |
| `bindCanvasEvents()` | 249 |  |
| `ensureSvgLayer()` | 304 | SVG layer (connectors live here) |
| `loadDiagram()` | 331 | Diagram + palette loading |
| `loadClasses()` | 352 |  |
| `renderHeader()` | 366 |  |
| `renderPalette()` | 387 |  |
| `onTileDragStart(e)` | 413 |  |
| `applyReadOnlyState()` | 422 | Read-only mode (historical version) |
| `snap(v)` | 448 | Drop → CMDB object picker → place node |
| `canvasModelCoords(e)` | 456 | Translate a mouse/drag event's client coordinates into model (1×, pre-zoom) coordinates inside the canvas. elCanvas itself is NOT transformed (it provides the scroll viewport + dot-grid background); elCanvasInner is the scaled wrapper containing nodes/SVG/brand strips. We measure relative to elCanvas (scroll-aware) and divide by zoom to undo the visual scale, landing in the coordinate space that node.x/node.y are stored in. |
| `onCanvasDrop(e)` | 464 |  |
| `openObjectPicker(cls, x, y)` | 484 |  |
| `closeObjectPicker()` | 499 |  |
| `fetchPickerResults(q)` | 504 |  |
| `renderPickerResults()` | 520 |  |
| `onPickerSearchInput(value)` | 555 |  |
| `onPickerKeyDown(e)` | 560 |  |
| `commitPickerSelection(obj)` | 580 |  |
| `nodeKey(n)` | 606 | Node rendering + selection + drag + delete |
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
| `connectorKey(c)` | 815 | Connectors — render, select, delete, label, draw-new |
| `findConnectorByKey(key)` | 822 |  |
| `selectConnector(key)` | 827 |  |
| `renderConnectors()` | 834 |  |
| `calcConnectorPoints(from, to)` | 914 |  |
| `deleteSelectedConnector()` | 941 |  |
| `promptConnectorLabel(c)` | 952 |  |
| `finish()` | 978 |  |
| `startConnectDrag(e, fromNode, side)` | 1004 |  |
| `onConnectDragMove(e)` | 1023 |  |
| `onConnectDragUp(e)` | 1039 |  |
| `commitConnectorDrag(fromRef, toRef)` | 1062 |  |
| `findNodeAt(x, y)` | 1078 |  |
| `openDetailForNode(n)` | 1091 | Node detail panel — opens beside the canvas when a node is selected |
| `loadNodeProperties(cmdbObjectId)` | 1135 |  |
| `renderNodeProperties(props)` | 1153 |  |
| `renderPropertyValue(p)` | 1185 |  |
| `pillTextColour(hex)` | 1253 |  |
| `closeDetail()` | 1265 |  |
| `openRelatedModal()` | 1277 | Add-related-objects modal |
| `closeRelatedModal()` | 1301 |  |
| `fetchRelatedRows(cmdbObjectId)` | 1308 |  |
| `renderRelatedRows()` | 1320 |  |
| `updateRelatedAddBtn()` | 1385 |  |
| `commitRelatedSelections()` | 1395 |  |
| `cssEscape(s)` | 1506 |  |
| `markDirty()` | 1520 | Single entry-point for "something changed" — wraps dirty/status/debounce so the call sites (place node, drag, delete, …) don't have to think about any of it. No-op on read-only versions so even programmatic edits can't dirty a historical diagram. |
| `scheduleAutosave()` | 1527 |  |
| `setStatus(state)` | 1543 | Status states: 'idle' \| 'unsaved' \| 'saving' \| 'saved' \| 'failed' \| 'off' |
| `loadAutosavePreference()` | 1562 |  |
| `applyAutosaveState(on, persist)` | 1572 |  |
| `toggleAutosave(on)` | 1596 |  |
| `openIconPicker()` | 1609 | Per-node icon picker Opens from the detail panel's Change button; lets the user override the class's default icon for this specific node. icon_override is a free-text VARCHAR on network_diagram_nodes so any key from NM_ICONS works (not constrained to the cmdb_icons table). |
| `closeIconPicker()` | 1623 |  |
| `onIconSearchInput(value)` | 1629 |  |
| `renderIconPicker()` | 1634 |  |
| `commitIconPick(key)` | 1678 |  |
| `resetIconOverride()` | 1693 |  |
| `toggleVersionsDropdown(e)` | 1709 | Versions dropdown — anchored to the toolbar Versions button. Lazy-fetches the chain each open so save-as-new-version mutations show up next time. Click a version to navigate. |
| `closeVersionsDropdown()` | 1721 |  |
| `fetchVersionList()` | 1725 |  |
| `renderVersionList(versions)` | 1736 |  |
| `togglePageDropdown(e)` | 1777 | Page-size overlay — toolbar dropdown picks paper size + orientation, a dashed outline renders inside the SVG layer at the canvas origin. Persisted per-diagram (paper_size + paper_orientation cols) so the outline survives reload. Sets up the bounds for PNG/PDF export. |
| `closePageDropdown()` | 1788 |  |
| `renderPageDropdown()` | 1792 |  |
| `applyPageSetting(size, orient)` | 1848 |  |
| `updatePageButtonLabel()` | 1865 |  |
| `pageDimensionsPx(size, orient)` | 1879 |  |
| `renderPageOutline()` | 1887 |  |
| `resolveBrandingSlot(key)` | 1956 | Resolve the effective text for a slot — per-diagram override wins, then org-wide default, then empty string. The null-check is deliberate: empty string is an explicit override ("blank this slot"), null is "inherit". `diagram[key] != null` (loose !=) matches both null and undefined which is what we want when the field hasn't been set on a diagram created before this column existed. |
| `brandingTokenContext()` | 1962 |  |
| `renderSlotHtml(text, ctx)` | 1980 | Token resolver — walks the slot text once with a single regex, HTML-escaping non-token segments and the substituted values; logo renders as an <img>. Tokens that don't have a value in ctx come back as empty strings so the slot collapses gracefully. |
| `renderBrandHeaderFooter()` | 2005 |  |
| `openBrandingModal()` | 2064 |  |
| `closeBrandingModal()` | 2087 |  |
| `commitBrandingOverrides()` | 2096 | Save commits the modal inputs as per-diagram overrides. An empty input means "inherit the org-wide default" (stored as null) — the modal's placeholder already previews that default, so a blank field naturally reads as "use that". Non-empty input is an explicit override. |
| `resetBrandingOverrides()` | 2119 | Reset clears all six overrides (sets them to null on the diagram object) so the slots inherit the org-wide defaults again. Marks the diagram dirty so the change persists on next save. |
| `save(isAutoSave)` | 2136 | Save |
| `openNewVersionModal()` | 2238 | Save as new version |
| `closeNewVersionModal()` | 2260 |  |
| `suggestNextVersionLabel(current)` | 2264 |  |
| `createNewVersion()` | 2272 |  |
| `applyZoom()` | 2310 | Zoom + Present mode Zoom is purely visual: transform: scale(zoom) on elCanvasInner. Node coordinates stay in 1× model space; `canvasModelCoords()` divides client deltas by zoom so drag/drop math keeps working at any level. Present mode adds an .is-presenting class to .nm-editor which CSS uses to hide the toolbar/palette/detail-panel and reveal the floating Exit pill. |
| `setZoom(z)` | 2328 |  |
| `zoomIn()` | 2342 |  |
| `zoomOut()` | 2343 |  |
| `zoomReset()` | 2344 |  |
| `zoomNext(dir)` | 2346 |  |
| `zoomFit(opts)` | 2363 |  |
| `enterPresent()` | 2425 |  |
| `exitPresent()` | 2450 |  |
| `isPresenting()` | 2470 |  |
| `centreOnPage()` | 2483 | Auto-centre the diagram on the selected paper size Translates all node coordinates so the diagram's bounding box sits centred inside the page rectangle. Persistent (mutates n.x/n.y) so the centring survives save/reload, not a transient visual transform. Connectors auto-follow since `renderConnectors()` reads live node positions. Bails with a toast if the diagram is bigger than the selected page in either dimension. |
| `exportFilename(ext)` | 2544 | PNG / PDF export Snapshot the canvas via html2canvas, optionally wrap into a paper- sized PDF via jsPDF. Driven entirely from the live DOM: temporarily reset zoom to 1, hide selection/edge-handle chrome via .is-exporting, render the clipped rect, restore everything. The page outline drives the clip rect when a paper size is set (WYSIWYG export); otherwise we crop to the bounding box of placed nodes + 40px padding. |
| `computeExportRect()` | 2554 |  |
| `captureCanvas()` | 2578 |  |
| `exportPng()` | 2647 |  |
| `exportPdf()` | 2660 |  |
| `formatDate(s)` | 2691 | Helpers |
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

