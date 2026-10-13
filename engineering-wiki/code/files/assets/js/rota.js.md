# assets/js/rota.js

> JavaScript - 1233 lines

Rota Page JS - Weekly staff rota management

## Functions

| Function | Line | What it does |
|---|--:|---|
| `getMonday(d)` | 38 |  |
| `formatDate(d)` | 46 |  |
| `changeWeek(delta)` | 55 |  |
| `goToThisWeek()` | 62 |  |
| `loadRota()` | 69 |  |
| `updateTitle(weekStart, weekEnd)` | 91 |  |
| `renderRotaGrid(weekStart)` | 117 |  |
| `fmtTime(t)` | 219 |  |
| `escapeHtml(str)` | 224 |  |
| `openRotaEntryModal(analystId, date, entryId)` | 233 |  |
| `closeRotaEntryModal()` | 290 |  |
| `deleteRotaEntry()` | 328 |  |
| `rotaSetClipboard(cell, line)` | 381 | One clipboard at a time for the grid (Ed). |
| `rotaEntryAt(analystId, date)` | 386 |  |
| `rotaDateLabel(date)` | 391 | Format a YYYY-MM-DD for a message, in the analyst's own date arrangement. |
| `rotaCellKey(analystId, date)` | 413 |  |
| `rotaSelectionTargets()` | 417 |  |
| `applyRotaSelection()` | 424 |  |
| `clearRotaSelection()` | 431 |  |
| `rotaSelectRect(from, to)` | 438 | Every cell between two corners, inclusive - the spreadsheet rectangle. |
| `rotaLineCells(head)` | 455 | The day cells belonging to a column heading or an analyst name cell. |
| `rotaHoverClear()` | 462 |  |
| `rotaHoverSet(head)` | 468 | Light up the whole column or row under the pointer. Pass null to unlight. |
| `wireRotaSelection()` | 479 |  |
| `openRotaCellMenu(event, cell)` | 543 |  |
| `openRotaLineMenu(event, head, kind)` | 600 | The same menu, opened on a column heading or an analyst's name: copy the whole line, paste one onto it, or empty it. |
| `rotaSetLinePasteItem(kind, label)` | 655 | What Paste offers on a column heading or an analyst's name, which depends on what is actually on the clipboard: |
| `rotaSetPasteBlocked(label, why)` | 704 | Paste is offered but refused, with the reason in a tooltip AND in a toast if you click it anyway (Ed asked for the tooltip). |
| `rotaSetPasteItem(label)` | 714 |  |
| `rotaHidePasteEmpty()` | 730 |  |
| `rotaSetPasteItems(targets)` | 743 | The two ways to paste into several cells, offered side by side (Ed). |
| `rotaSetClearItem(targets)` | 766 | Clear, across a column, a row or a selection (Ed). It counts the shifts that are actually there rather than the cells it was pointed at - "Clear 3 shifts" on a column of seven is the number that matters, and offering Clear at all on a line with nothing in it is offering to do nothing. |
| `rotaPositionMenu(event)` | 781 | Show at the pointer, then nudge back inside the viewport. A cell in the last column sits at the right-hand edge and the menu would open off screen. |
| `closeRotaCellMenu()` | 791 |  |
| `rotaCtxAction(action)` | 810 |  |
| `rotaPasteInto(targets, mode)` | 881 | Paste the copied shift into one cell, or into many. |
| `rotaPost(endpoint, body, okKey, failKey)` | 969 | POST, toast the outcome, reload the grid. Shared by every write above. |
| `copyRotaLine(line)` | 1006 | Copy every shift on a line. |
| `pasteRotaLine(line)` | 1050 | Paste a copied line over another one of the same kind. |
| `rotaClearCells(targets, target)` | 1109 | Empty a column, a row or a selection (Ed). |
| `rotaVisibleEntries(weekStart)` | 1145 | The entries the grid is actually drawing, as {offset, entry} pairs. |
| `copyRotaWeek()` | 1158 |  |
| `updatePasteWeekButton()` | 1179 |  |
| `pasteRotaWeek()` | 1188 |  |

## API endpoints it calls

- [api/tickets/get_rota.php](/code/files/api/tickets/get_rota.php.md)
- [api/tickets/save_rota_entry.php](/code/files/api/tickets/save_rota_entry.php.md)
- [api/tickets/delete_rota_entry.php](/code/files/api/tickets/delete_rota_entry.php.md)
- [api/tickets/paste_rota_cells.php](/code/files/api/tickets/paste_rota_cells.php.md)
- [api/tickets/paste_rota_line.php](/code/files/api/tickets/paste_rota_line.php.md)
- [api/tickets/clear_rota_cells.php](/code/files/api/tickets/clear_rota_cells.php.md)
- [api/tickets/paste_rota_week.php](/code/files/api/tickets/paste_rota_week.php.md)

## Loaded by

- [tickets/rota.php](/code/files/tickets/rota.php.md)

