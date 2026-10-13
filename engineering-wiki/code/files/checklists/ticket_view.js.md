# checklists/ticket_view.js

> JavaScript - 875 lines

Ticket Checklists / SOP Module for FreeITSM

🔴 API PATHS ARE RELATIVE TO THE HOST PAGE, NEVER ROOT-ABSOLUTE.

These calls used to be fetch('/api/tickets/ticket_checklists.php'), which
resolves only when FreeITSM is installed AT the document root. On an install
in a subdirectory every one of them 404s and the whole SOP panel silently
does nothing — measured: /api/... returned 404 and /freeitsm-app/api/...
returned 200 on the same machine.

tickets/index.php already publishes window.API_BASE ('../api/tickets/'), which
is derived from BASE_URL and therefore correct in both layouts. The fallback
matches inbox.js's own, for a page that forgets to set it.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `chkT(key, fallback)` | 32 | Translate, the way assets/js/calendar.js does it. |
| `closureLockIcon(effectiveMode, px)` | 44 | The padlock marking a checklist that blocks closure until it is complete. |
| `formatStepDatetime(dtStr)` | 59 | Format exact server datetime as dd-mmm-yy HH:MM |
| `loadTicketChecklists(ticketId)` | 82 | 1. Fetch & Render Checklists for a Ticket |
| `findChecklistItem(itemId)` | 102 |  |
| `getIncompleteMandatorySteps()` | 113 |  |
| `renderChecklistToolbarButton(ticketId)` | 132 | 2. Render Action Toolbar Button |
| `renderTicketChecklistsInline(ticketId)` | 163 | 3. Render Inline SOP Card |
| `openChecklistModal(ticketId)` | 263 | 4. Full Pop-out Checklist Modal |
| `closeChecklistModal()` | 366 |  |
| `handleStepCheckboxChange(ticketId, itemId, checkboxElem, reopenPopout)` | 372 | 5. Handle Checkbox Click with Data Capture Prompt |
| `promptDataCapture(ticketId, item, checklistTitle, reopenPopout)` | 392 | Prompt for note or data input (Rejects blank entries!) |
| `doSave()` | 435 |  |
| `closeDataCaptureModal()` | 455 |  |
| `executeToggleItem(ticketId, itemId, completed, responseValue, checklistTitle, stepTitle, reopenPopout)` | 461 | 6. Execute Toggle Item in Backend |
| `logStepNote(ticketId, checklistTitle, stepTitle, completed, responseValue)` | 488 |  |
| `removeTicketChecklist(ticketId, checklistId)` | 518 | 7. Remove Checklist from Ticket |
| `openAttachChecklistModal(ticketId)` | 563 | 8. Attach checklist Modal |
| `categoryPillClass(name)` | 615 | A stable colour per category, derived from its name. |
| `filterTemplatesList(ticketId)` | 622 |  |
| `attachSopToTicket(ticketId, templateId)` | 670 |  |
| `closeAttachModal()` | 694 |  |
| `escapeHtml(str)` | 699 |  |
| `getAttachedChecklistsCount()` | 708 |  |
| `getTicketChecklistEmptyClosureMode()` | 713 |  |
| `styleSopResponsesInNotes()` | 730 | SOP Response Styling in Notes Timeline (Italics & Distinct Color) |
| `checkAndShowSopSuggestion(ticketId)` | 765 |  |
| `dismissSopSuggestion(ticketId)` | 858 |  |

## API endpoints it calls

- [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md)

## Loaded by

- [tickets/index.php](/code/files/tickets/index.php.md)

