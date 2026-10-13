# assets/js/change-management.js

> JavaScript - 2412 lines

Change Management Module - Client-side logic

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadFormLayout()` | 100 |  |
| `isFieldVisible(fieldKey)` | 120 |  |
| `refreshFormLayout()` | 141 | Rebuilds the editor form to match the current formLayout: - reorders .cm-form-section blocks by section.display_order - renames each section heading from section.name - moves .cm-field-wrap blocks between sections based on field.section_id - shows/hides each wrap based on field.is_visible - parks the rich-text widget under whichever section contains the first visible rich-text field (v1 limitation: the six rich-text tabs are NOT split across sections) - hides sections that end up with no visible content |
| `loadStatuses()` | 322 | Pull active statuses from the change_statuses table and use them to drive both the sidebar filter list and the editor's Status dropdown. So when statuses get added / renamed / deactivated under Change Management → Settings → Statuses, both UIs reflect the change on next page load. |
| `sortLookup(rows)` | 347 | Context-menu lookups. Each endpoint returns {success, <key>:[{id,name,colour, is_active,display_order,...}]}. We keep active rows only, sorted the same way as the sidebar (display_order then name) so the submenus match Settings. |
| `loadChangePriorities()` | 354 |  |
| `loadChangeTypes()` | 364 |  |
| `loadChangeImpacts()` | 374 |  |
| `loadMoveCompanies()` | 387 | Companies this analyst can move a change into (multi-company installs only). Same source as the tickets "Move to company" submenu; the "Move to company" row stays hidden unless there's more than one accessible company. |
| `renderStatusFilters()` | 401 |  |
| `populateStatusDropdown()` | 421 |  |
| `loadAnalysts()` | 433 |  |
| `populateAnalystDropdowns()` | 446 |  |
| `loadChanges()` | 462 |  |
| `updateCounts(counts)` | 489 |  |
| `renderChangeList()` | 505 |  |
| `viewChange(id)` | 550 |  |
| `renderChangeDetail()` | 571 |  |
| `cmPreviewBadge(type, id)` | 754 | The ⓘ preview badge (#91). Guarded, so a page that somehow loaded without record-preview.js loses the preview rather than the table it belongs to. |
| `renderLinkedIncidents(c)` | 758 |  |
| `openLinkIncidentModal()` | 786 |  |
| `closeLinkIncidentModal()` | 793 |  |
| `linkIncidentSearchDebounced()` | 796 |  |
| `loadLinkableIncidents()` | 800 |  |
| `linkChangeIncident(ticketId)` | 819 |  |
| `unlinkChangeIncident(ticketId)` | 830 |  |
| `renderDetailSection(title, content)` | 845 |  |
| `renderRiskMatrix(likelihood, impact, score, level)` | 864 |  |
| `renderPirDetail(c)` | 927 |  |
| `loadActivityTimeline(changeId)` | 956 |  |
| `renderActivityTimeline(timeline, container)` | 999 |  |
| `postComment()` | 1066 |  |
| `filterByStatus(status)` | 1098 |  |
| `openSearchModal()` | 1111 |  |
| `closeSearchModal()` | 1132 |  |
| `initSearchModalDrag()` | 1146 |  |
| `onmousedown(e)` | 1150 |  |
| `onMouseMove(e)` | 1157 |  |
| `onMouseUp()` | 1162 |  |
| `performSearch()` | 1171 |  |
| `renderSearchResults(results)` | 1216 |  |
| `selectSearchResult(changeId)` | 1246 |  |
| `clearSearch()` | 1251 |  |
| `openCreateChange()` | 1259 |  |
| `editCurrentChange()` | 1313 |  |
| `cancelEdit()` | 1375 |  |
| `restoreUrlFromNewRoute()` | 1390 | URL-tidying helper for the /change-management/new/ pretty-URL route. Called from `cancelEdit()` and from the save flow once the editor closes. |
| `saveChange()` | 1399 |  |
| `deleteCurrentChange()` | 1484 |  |
| `closeDeleteModal()` | 1502 |  |
| `confirmDelete(id)` | 1506 |  |
| `setupFileUpload()` | 1531 |  |
| `uploadFiles(files)` | 1562 |  |
| `renderEditorAttachments(attachments)` | 1599 |  |
| `downloadAttachment(id)` | 1621 |  |
| `deleteAttachment(id)` | 1625 |  |
| `initEditors(callback)` | 1658 |  |
| `setup(editor)` | 1683 |  |
| `destroyEditors()` | 1696 |  |
| `getEditorContent(id)` | 1704 |  |
| `setEditorContent(id, content)` | 1709 |  |
| `switchTab(tab)` | 1718 |  |
| `updateRiskScore()` | 1730 |  |
| `updatePirVisibility()` | 1751 |  |
| `toggleCabConfig()` | 1761 |  |
| `addCabMember()` | 1766 |  |
| `removeCabMember(analystId)` | 1783 |  |
| `toggleCabMemberRequired(analystId)` | 1788 |  |
| `renderCabMemberChips()` | 1796 |  |
| `renderCabReviewPanel(c)` | 1818 |  |
| `submitCabVote(vote)` | 1881 |  |
| `showView(view)` | 1915 |  |
| `backToList()` | 1930 |  |
| `escapeHtml(text)` | 1938 |  |
| `formatDate(dateStr)` | 1947 | NAIVE wall-clock scheduling date (only caller is work_start on the list card) — shown exactly as typed, no zone conversion (parseNaiveDate from tz.js). |
| `formatDateTime(dateStr)` | 1955 | Server-stamped UTC timestamp (created / modified / approved / CAB vote / history "when") → analyst display zone (parseUTCDate / tzOpts from tz.js). |
| `formatNaiveDateTime(dateStr)` | 1964 | NAIVE wall-clock scheduling datetime (work / outage / PIR windows) — shown exactly as typed for every analyst, no zone conversion. Same output shape as formatDateTime so the two are drop-in interchangeable at each call site. |
| `toDatetimeLocal(dateStr)` | 1970 |  |
| `pad(n)` | 1975 | Format as YYYY-MM-DDTHH:MM for datetime-local input |
| `formatFileSize(bytes)` | 1980 |  |
| `toggleShareDropdown()` | 1990 |  |
| `closeShareDropdown()` | 1995 |  |
| `getChangeRef()` | 2008 |  |
| `getChangeUrl()` | 2013 |  |
| `shareChangeLink()` | 2017 |  |
| `shareChangePdf()` | 2030 |  |
| `shareChangeBoth()` | 2048 |  |
| `closeShareEmailModal()` | 2062 |  |
| `sendShareEmail()` | 2066 |  |
| `blobToBase64(blob)` | 2137 |  |
| `buildPdfContent()` | 2149 |  |
| `openChangeContextMenu(event, changeId)` | 2245 |  |
| `closeChangeContextMenu()` | 2277 |  |
| `ctxTargetChange()` | 2283 | The change record backing the current context target (for the ✓ tick). |
| `renderCtxLookupSubmenu(sub, rows, currentName, emptyKey, onclickFn)` | 2289 | Shared submenu HTML builder. rows = active lookup rows; currentName = the change's current value for this field (name string) so we can tick it. |
| `populateContextChangeStatusSubmenu()` | 2307 |  |
| `populateContextChangePrioritySubmenu()` | 2312 |  |
| `populateContextChangeTypeSubmenu()` | 2317 |  |
| `populateContextChangeImpactSubmenu()` | 2322 |  |
| `populateContextChangeCompanySubmenu()` | 2328 | Build the Move-to-company submenu (multi-company installs only; hidden at N=1). |
| `saveChangeFieldFromContext(field, value, toastKey)` | 2349 | Field setters. All post to save.php with {id, <field>: <name>}; the change service resolves the lookup by name and applies status side-effects. |
| `setChangeStatusFromContext(name)` | 2371 |  |
| `setChangePriorityFromContext(name)` | 2372 |  |
| `setChangeTypeFromContext(name)` | 2373 |  |
| `setChangeImpactFromContext(name)` | 2374 |  |
| `moveChangeToCompanyFromContext(tenantId)` | 2378 | Move a change to another company. The endpoint enforces access + writes the audit entry server-side, then we reload the list and toast its message. |

## API endpoints it calls

- [api/system/get_tenants.php](/code/files/api/system/get_tenants.php.md)

