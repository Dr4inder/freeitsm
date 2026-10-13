# assets/js/problem-management.js

> JavaScript - 669 lines

Problem Management — list / detail / editor SPA.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `pmPreviewBadge(type, id)` | 19 | The ⓘ preview badge (#91). Guarded, so that a page which somehow loaded without record-preview.js loses the preview rather than the whole table it would have been drawn into. |
| `pmEsc(s)` | 23 |  |
| `pmToast(msg, type)` | 26 |  |
| `pmLoadLookups()` | 62 |  |
| `pmLoadList()` | 75 |  |
| `pmRenderFilters(counts)` | 88 |  |
| `pmT(key, english, params)` | 103 | Translate, or the English written at the call site. |
| `pmRenderList(problems)` | 107 |  |
| `pmFilter(statusId)` | 131 | Sidebar actions must return to the list view — otherwise, when a problem is open (e.g. deep-linked via ?id=), they'd update the list while it's hidden behind the detail and appear to do nothing. |
| `pmOpenSearchModal()` | 140 |  |
| `pmCloseSearchModal()` | 157 |  |
| `pmInitSearchDrag()` | 168 |  |
| `onmousedown(e)` | 171 |  |
| `mm(e)` | 177 |  |
| `mu()` | 178 |  |
| `pmPerformSearch()` | 184 |  |
| `pmRenderSearchResults(results)` | 201 |  |
| `pmSelectSearchResult(id)` | 221 |  |
| `pmClearSearch()` | 223 |  |
| `pmShowListView()` | 229 |  |
| `pmSetListUrl()` | 236 | Drop the ?problem_id= param when returning to the list (adds a history entry so Back/Forward step between the list and the problem you were viewing). |
| `pmBackToList()` | 239 |  |
| `pmOpenDetail(id, fromHistory)` | 245 |  |
| `pmRenderDetail(data)` | 262 |  |
| `pmFillSelect(sel, items, selected, blank)` | 384 |  |
| `pmOpenEditor(problem)` | 389 |  |
| `pmEditCurrent()` | 407 |  |
| `pmCloseEditor()` | 408 |  |
| `pmSave()` | 410 |  |
| `pmDelete()` | 436 |  |
| `pmLinkIncident()` | 457 |  |
| `pmLinkSearchDebounced()` | 464 |  |
| `pmLoadLinkable()` | 468 |  |
| `pmToggleAllLinkable(checked)` | 487 |  |
| `pmLinkSelected()` | 490 |  |
| `pmUnlinkIncident(ticketId)` | 514 |  |
| `pmLinkChange()` | 528 |  |
| `pmLinkChangeSearchDebounced()` | 535 |  |
| `pmLoadLinkableChanges()` | 539 |  |
| `pmToggleAllLinkableChanges(checked)` | 558 |  |
| `pmLinkChangeSelected()` | 561 |  |
| `pmUnlinkChange(changeId)` | 585 |  |
| `pmAddNote()` | 599 |  |
| `pmAiRootCause()` | 612 |  |
| `pmSuggest()` | 625 |  |
| `pmCreateFromSuggestion(i)` | 645 |  |
| `pmApplyAiDraft()` | 660 |  |

## API endpoints it calls

- [api/tickets/get_analysts.php](/code/files/api/tickets/get_analysts.php.md)
- [api/problem-management/get_problem_statuses.php](/code/files/api/problem-management/get_problem_statuses.php.md)
- [api/problem-management/get_problem_priorities.php](/code/files/api/problem-management/get_problem_priorities.php.md)
- [api/problem-management/list.php](/code/files/api/problem-management/list.php.md)
- [api/problem-management/get.php](/code/files/api/problem-management/get.php.md)
- [api/problem-management/save.php](/code/files/api/problem-management/save.php.md)
- [api/problem-management/delete.php](/code/files/api/problem-management/delete.php.md)
- [api/problem-management/list_linkable_tickets.php](/code/files/api/problem-management/list_linkable_tickets.php.md)
- [api/problem-management/link_ticket.php](/code/files/api/problem-management/link_ticket.php.md)
- [api/problem-management/unlink_ticket.php](/code/files/api/problem-management/unlink_ticket.php.md)
- [api/problem-management/list_linkable_changes.php](/code/files/api/problem-management/list_linkable_changes.php.md)
- [api/problem-management/link_change.php](/code/files/api/problem-management/link_change.php.md)
- [api/problem-management/unlink_change.php](/code/files/api/problem-management/unlink_change.php.md)
- [api/problem-management/add_note.php](/code/files/api/problem-management/add_note.php.md)
- [api/problem-management/ai_root_cause.php](/code/files/api/problem-management/ai_root_cause.php.md)
- [api/problem-management/ai_suggest_problem.php](/code/files/api/problem-management/ai_suggest_problem.php.md)

