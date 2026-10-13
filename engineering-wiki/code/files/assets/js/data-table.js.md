# assets/js/data-table.js

> JavaScript - 1199 lines

FreeITSM shared data-table engine

One implementation of the full-screen, Excel-style table view used by the
asset, tasks, calendar and change-management modules. Everything that used to
be copy-pasted per module lives here: column show/hide + drag-reorder
(persisted per-user via user_preferences), click-to-sort, search across
visible columns, per-column tickbox filter, CSV (and optional PDF) export,
and optional inline cell editing.

A module supplies only what's actually module-specific via `createDataTable()`:
  - its COLUMNS catalogue (the single source of truth for the grid)
  - how to `load()` its rows
  - the accent colour + a preference key + the export filename
  - optionally: onSaveCell (inline editing), onRowClick, getLookups, pdf

Styling is shared (assets/css/data-table.css); the accent is injected at
runtime onto :root as --dt-accent so even body-appended popovers pick it up.

Usage:
  const table = createDataTable({ ...config });
  // table.reload(), table.render(), table.findRow(id), table.getViewRows()

Column shape:
  { key, label, type: 'string'|'number'|'date', defaultVisible, defaultOrder,
    value?: row => comparable,   // sort key (default row[key])
    display?: row => string,     // shown / searched / filtered / exported
    format?: raw => string,      // legacy single-arg formatter (asset compat)
    editable?: false | { kind, ... } }

editable kinds: 'text' | 'date' | 'datetime' | 'bool' |
  { kind:'lookup', listKey, valueKey, labelKey, allowNull?, nullLabel?, colourKey? }

## Functions

| Function | Line | What it does |
|---|--:|---|
| `createDataTable(config)` | 49 |  |
| `boot()` | 74 |  |
| `applyDefaultView()` | 99 | Open the table with whichever view this analyst made their default. |
| `byId(id)` | 111 |  |
| `reload()` | 114 |  |
| `applyColumnConfig(cols)` | 135 | Restore column order and visibility from a saved list. |
| `applySortConfig(s)` | 152 |  |
| `loadPreferences()` | 158 |  |
| `savePreferences()` | 170 |  |
| `vt(key, fallback, params)` | 216 | Translate, falling back to English — the engine has no i18n of its own. |
| `captureViewConfig()` | 227 | The current state, as a view's config. Filters are Sets, so unpack them. |
| `applyViewConfig(cfg)` | 246 | Put a saved config back on the table. |
| `viewsFetch(path, opts)` | 264 |  |
| `loadViews(q)` | 270 | Every view this analyst can see on this table, plus their teams and default. |
| `applyViewById(id, rows)` | 279 |  |
| `markActiveView(name)` | 299 | The toolbar button shows which view is on, or that none is. |
| `closeViewsModal()` | 310 |  |
| `viewsEsc(e)` | 314 |  |
| `openViewsLibrary()` | 316 |  |
| `refreshViewsList()` | 371 |  |
| `renderViewEntry(v)` | 405 |  |
| `openViewEditor(view)` | 456 | The save / edit dialog. |
| `deleteView(id)` | 544 |  |
| `setDefaultView(id)` | 554 |  |
| `alertViews(msg)` | 565 | Errors go through the host page's toast when it has one. |
| `colValue(col, row)` | 572 |  |
| `colDisplay(col, row)` | 576 |  |
| `wireToolbar()` | 584 |  |
| `visibleColumns()` | 643 |  |
| `render()` | 647 |  |
| `renderHead()` | 649 |  |
| `renderBody()` | 704 |  |
| `renderCell(row, col)` | 733 |  |
| `renderLookupCell(row, col, id)` | 764 |  |
| `wireEditControls(body)` | 787 |  |
| `normalizeValue(col, raw)` | 800 |  |
| `saveCell(row, col, raw)` | 812 |  |
| `refreshSwatch(row, col)` | 824 |  |
| `wireRowClicks(body, rows)` | 838 |  |
| `applyFiltersAndSort()` | 849 |  |
| `toggleSort(key)` | 902 |  |
| `reorderColumn(fromKey, toKey)` | 909 |  |
| `openFilterDropdown(colKey, anchorEl)` | 920 |  |
| `openColumnsDrawer(anchorEl)` | 1005 |  |
| `positionPopover(pop, anchorEl)` | 1066 |  |
| `closePopover()` | 1078 |  |
| `exportCSV()` | 1084 |  |
| `exportPDF()` | 1100 |  |
| `csvCell(v)` | 1148 |  |
| `formatDateStr()` | 1156 |  |
| `toLocalInput(raw)` | 1162 |  |
| `fromLocalInput(v)` | 1166 |  |
| `esc(s)` | 1173 |  |
| `cssEsc(s)` | 1183 |  |

## Loaded by

- [asset-management/table.php](/code/files/asset-management/table.php.md)
- [calendar/table/index.php](/code/files/calendar/table/index.php.md)
- [change-management/table.php](/code/files/change-management/table.php.md)
- [domains/table/index.php](/code/files/domains/table/index.php.md)
- [tasks/table/index.php](/code/files/tasks/table/index.php.md)

