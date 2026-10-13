# assets/js/inbox.js

> JavaScript - 11832 lines

Inbox JavaScript - Service Desk Ticketing System

## Functions

| Function | Line | What it does |
|---|--:|---|
| `closeMessageEnabled()` | 25 |  |
| `safeEmailHtml(html)` | 69 | Defensive HTML cleaner for email bodies. The real work lives in assets/js/safe-html.js, shared with the self-service portal so the two surfaces that display the same email bodies can never drift apart. |
| `emailBodyHost(rawHtml, cls, bodyType)` | 103 |  |
| `hydrateEmailBodies(root)` | 117 |  |
| `mcOpened()` | 170 | Which messages this analyst has opened, so a thread they are working through does not re-collapse under them on every refresh. Per browser, deliberately: it is a reading position, not a preference worth a round trip. ⚠️ Wrapped, because localStorage THROWS in a private window rather than returning null. |
| `mcRemember(id, open)` | 175 |  |
| `mcApply(host, opts)` | 192 | Collapse one rendered message if it is taller than the threshold. |
| `paint(open)` | 224 |  |
| `tgGroupOlder(container)` | 249 | --------------------------------------------------------------------- FOLD THE OLDER PART OF A LONG TICKET (idea #4 from discussion #104) |
| `mcSweep(root)` | 301 | Sweep a freshly rendered thread. The LAST message host is the newest — the thread renders oldest-first — and is the one that stays open. |
| `ticketCompanyId(email)` | 343 | The company a ticket's lookup lists should come from. NULL tenant_id = unrouted, which Default owns by convention. |
| `listForTicket(byCompany, fallback, email)` | 350 | Per-company list if we have one for this ticket, else the page-wide list. |
| `logAudit(ticketId, fieldName, oldValue, newValue)` | 395 | Helper function to log audit entries |
| `getDisplayName(type, id)` | 413 | Helper to get display name for IDs |
| `sharedApiBase()` | 433 | Resolve API base for shared endpoints (api/system/...) — works whether the page is at the repo root or inside a module folder. |
| `loadFolderGroupingPreference()` | 437 |  |
| `loadViewFilterPreference()` | 466 |  |
| `viewFilterMineActive()` | 480 | "Mine" means nothing while grouped by analyst — every other analyst's folder would read 0. The saved choice is kept and comes back with the other groupings. |
| `analystFolderLabel(an)` | 487 | What an analyst folder is CALLED — "My tickets" for your own (#149). Used for the folder row and the list title; NOT where a real name is needed, such as the toast after dragging a ticket onto someone. |
| `viewFilterParams()` | 491 |  |
| `setViewFilter(key, value)` | 498 |  |
| `updateViewFilterUI()` | 513 |  |
| `toggleViewFilterMenu(event)` | 540 |  |
| `closeViewFilterMenu()` | 550 |  |
| `loadSearchIncludeClosedPreference()` | 566 | Search's own "Include closed tickets" (#149) — separate from the view filter, and ON by default: a search is usually a hunt for an old ticket. |
| `saveSearchIncludeClosed(checked)` | 575 |  |
| `searchIncludeClosed()` | 583 |  |
| `setFolderGrouping(mode)` | 588 |  |
| `initAttachmentHandlers()` | 656 | Initialize attachment drag/drop and file input handlers |
| `handleFiles(files)` | 697 | Handle selected files |
| `renderAttachments()` | 709 | Render attachment list |
| `removeAttachment(index)` | 731 | Remove attachment by index |
| `getFileIcon(filename)` | 737 | Get file icon based on extension |
| `formatFileSize(bytes)` | 755 | Format file size |
| `initTinyMCE()` | 764 | Initialize TinyMCE editor |
| `setup(editor)` | 797 |  |
| `loadDepartments()` | 804 | Load departments (filtered by team membership) |
| `loadTicketTypes()` | 820 | Load ticket types |
| `loadTicketTeams()` | 846 | The teams a ticket can be handed to (#1566). |
| `loadTicketClassification()` | 873 | Load the classification lists and the three switches (#1540) — one request, because a form that had the categories but not the switches could briefly render a field the settings say to hide. |
| `categoriesForType(typeId, email)` | 896 | Categories on offer for one ticket type. A category with no type is offered whatever the type is; one tied to a type is offered only on that type. The tie lives on the ROOT, so `effective_type_id` is what to compare - a sub-category has none of its own. |
| `categoryOptionsFor(typeId, selectedId, email)` | 907 | Options for a category picker, indented so the tree reads as a tree. `selectedId` is always included even when the type filter would drop it - a ticket already carrying a category must never render as blank, or the next save silently clears a value nobody chose to clear. |
| `loadTicketOrigins()` | 922 | Load ticket origins |
| `loadMoveCompanies()` | 940 | Load the companies this analyst can move tickets into (multi-company installs only). |
| `moveTicketCompany(targetId)` | 957 | Move the current ticket to another company. targetId optional (used by the wrong-company banner's quick-move); otherwise read from the Company dropdown. |
| `loadTicketStatuses()` | 984 | Load ticket statuses (active only) for the reading-pane Status dropdown |
| `loadTicketPriorities()` | 998 | Load ticket priorities (active only) for the reading-pane Priority dropdown |
| `loadAnalysts()` | 1012 | Load analysts |
| `loadFolderCounts()` | 1026 | Load folder counts |
| `renderFolders()` | 1042 | Render folder structure. Branches on folderGrouping (department vs analyst). |
| `updateActiveFolderClasses()` | 1286 | Update only the .active class on existing folder/subfolder rows — does NOT rebuild the folder list. Used by selection paths so the .subfolder-group expand transition (which requires the element to persist) actually fires. |
| `toggleFolder(folderId, groupId, opts = {})` | 1330 | Toggle folder expansion. Works for both department and analyst folders. opts.kind — 'department' (default) or 'analyst' opts.selectAfter — if false, don't change the active filter/view (used by drag hover) opts.forceExpand — if true, only expand (no toggle), used by drag hover |
| `selectFolder(type, id = null)` | 1398 | Select folder |
| `selectDeptStatus(deptId, status)` | 1422 | Select department + status |
| `selectTeamStatus(teamId, status)` | 1432 | Select team + status (#1566) — the team twin of selectDeptStatus. |
| `selectUnassignedStatus(status)` | 1443 | Select a status within Unassigned. ⚠️ What "unassigned" means follows the active grouping, so this filter has to carry the grouping with it. |
| `selectAllStatus(status)` | 1453 | Select a status across every ticket (GH #73) — the All Tickets equivalent of selectDeptStatus / selectAnalystStatus. |
| `selectAnalystStatus(analystId, status)` | 1462 | Select analyst + status |
| `attachEmailDragHandlers()` | 1480 |  |
| `attachFolderDropHandlers()` | 1553 |  |
| `cancelDragHover()` | 1632 |  |
| `handleTicketDrop(targetEl, ticketId, ticketNumber)` | 1640 |  |
| `teamName(id)` | 1678 | #1566 teams. From the row, which carries assigned_team_id for exactly this. |
| `loadEmails()` | 1826 | Load emails based on current filter |
| `companyChip(email)` | 1907 | Which company a ticket belongs to, shown on the row in the consolidated view. |
| `renderEmailList()` | 1917 | Render email list |
| `loadInboxSlaIndicators()` | 1981 | Populate the SLA dot in each email row via the batch endpoint. |
| `renderInboxSlaIndicator(row)` | 2008 | Build the inline dot + label for one email row. |
| `pickTarget()` | 2009 |  |
| `fmt(mins)` | 2029 |  |
| `setSelectedEmailRow(emailId)` | 2050 | Move the "selected" highlight to one row without rebuilding the whole list. Rebuilding (renderEmailList) on every click also re-fired the batch SLA fetch, which made the SLA pills flash off and back on — this just toggles a class. |
| `visibleEmailIds()` | 2092 | Email ids in the order they are on screen — range selection follows what you SEE. |
| `ticketIdForEmail(emailId)` | 2098 | The ticket id behind a row (actions work on tickets; rows are keyed by email). |
| `selectedTicketIds()` | 2105 |  |
| `selectionCount()` | 2109 |  |
| `renderSelectionUi()` | 2114 | Paint the list: `.selected` on every chosen row, `.kb-focus` on the cursor. |
| `clearMultiSelection({ repaint = true } = {})` | 2134 |  |
| `handleEmailRowClick(event, emailId)` | 2146 | The one entry point for a click on a row. Every modifier combination lands here so the rules live in one readable place rather than spread across handlers. |
| `loadMultiSelectPanePreference()` | 2211 |  |
| `onSelectionChanged({ clickedId = null } = {})` | 2222 | Called whenever the selection changes. Routes to whichever surface is chosen. |
| `updateSelectionSurfaces()` | 2272 | Re-run the surface rendering without recomputing the selection. |
| `selectionActionsHtml(compact)` | 2281 | The shared action buttons, used by both the summary pane and the bar. |
| `renderSelectionSummaryPane()` | 2292 |  |
| `renderSelectionBar()` | 2317 |  |
| `hideSelectionBar()` | 2333 |  |
| `renderKeepModeWarning()` | 2342 | The strip is CREATED here rather than living in the page markup, because `selectEmail()` replaces the whole reading pane's innerHTML — a static element would be destroyed the moment the ticket it warns about finished loading. Re-prepending is self-healing and needs no change to the pane's layout. |
| `hideKeepModeWarning()` | 2361 |  |
| `clearSelectionToNone()` | 2367 | Clear right down to nothing selected (the ✕ / Escape route). |
| `selectAllVisible()` | 2377 | Select every row currently listed (Ctrl+A). |
| `moveSelectionCursor(delta, { extend = false, keepSelection = false })` | 2402 |  |
| `scrollRowIntoView(emailId)` | 2439 |  |
| `toggleFocusedRow()` | 2466 | Space — toggle the row under the cursor, the keyboard's Ctrl+click. |
| `applyToSelection(endpoint, payloadFor, label)` | 2544 | Apply one change to every selected ticket. |
| `bulkSetField(fields, label)` | 2594 | Set one field across the selection. |
| `openSelectionMenu(event, kind)` | 2611 |  |
| `closeSelectionMenu()` | 2676 |  |
| `bulkDeleteSelection()` | 2686 |  |
| `bulkProgressHtml()` | 2703 | The progress line both surfaces show mid-run. |
| `selectEmail(emailId)` | 2712 | Select and display email by email ID |
| `loadTicketById(ticketId)` | 2772 | Load and display ticket by ticket ID (from URL parameter) |
| `displayEmail(email, recordings)` | 2798 | Display email in reading pane |
| `openContextLinkProblem()` | 3186 | Right-click "Link to problem…" — targets whichever ticket was right-clicked, even if a different one is open in the reading pane. |
| `openLinkProblemModal(ticketId, ticketRef, subject)` | 3198 |  |
| `closeLinkProblemModal()` | 3207 |  |
| `linkProblemSearchDebounced()` | 3208 |  |
| `loadLinkProblemList()` | 3210 |  |
| `pickProblem(problemId)` | 3227 |  |
| `createProblemFromIncident()` | 3228 |  |
| `doLinkTicketProblem(target)` | 3239 |  |
| `unlinkTicketFromProblem(problemId)` | 3253 |  |
| `openContextLinkChange()` | 3268 | Right-click "Link to change…" — targets whichever ticket was right-clicked, even if a different one is open in the reading pane. |
| `openLinkChangeModal(ticketId, ticketRef, subject)` | 3280 |  |
| `closeLinkChangeModal()` | 3289 |  |
| `linkChangeSearchDebounced()` | 3290 |  |
| `loadLinkChangeList()` | 3292 |  |
| `pickChange(changeId)` | 3311 |  |
| `createChangeFromIncident()` | 3312 |  |
| `doLinkTicketChange(changeId)` | 3323 |  |
| `unlinkTicketFromChange(changeId)` | 3337 |  |
| `buildMergeBanner(email)` | 3367 | The merge banner, in both directions. |
| `undoMerge(mergeId)` | 3451 | Undo a merge — take the messages back and reopen this ticket. |
| `openTicketByNumber(ticketNumber)` | 3481 | Jump to a ticket by its reference — used by the merge banner's button. |
| `rpBadge(type, id)` | 3504 | The ⓘ preview badge (#91), guarded. |
| `buildLinksSection(email)` | 3508 |  |
| `tp(item, prefix)` | 3532 |  |
| `syncLinksStripEmpty()` | 3606 | Hide the strip's "Not linked to anything yet" note once anything at all has been linked — including the pills that arrive after the strip was drawn. Called by both async loaders; safe to call when the note isn't there. |
| `openStripPicker(placeholder)` | 3632 | Shared picker chrome for the Links strip. |
| `close()` | 3643 |  |
| `toggleLinkAddMenu(e)` | 3650 | "Link to…" popover: pick Problem / Change / Ticket, then open its picker for the open ticket. Closes on the next click anywhere. |
| `closeLinkAddMenu()` | 3657 |  |
| `linkAddChoose(kind)` | 3661 |  |
| `loadTicketTasks(ticketId)` | 3688 |  |
| `renderTicketTasks(ticketId)` | 3704 |  |
| `openLinkTaskPicker(ticketId)` | 3746 | One picker, both verbs. Typing searches existing tasks; if what you typed matches nothing (or nothing quite right) the first row creates a task with that title. That is why linking and creating are not two menu entries: you see the near-matches as you type, so you link the task that already exists instead of quietly making a second one. |
| `render()` | 3757 |  |
| `pick(r)` | 3804 |  |
| `search(typed)` | 3831 |  |
| `createTaskForTicket(ticketId, title)` | 3857 |  |
| `linkTaskToTicket(ticketId, taskId)` | 3862 |  |
| `postTaskLink(ticketId, body, okMessage)` | 3867 |  |
| `unlinkTicketTask(event, taskId, ticketId)` | 3890 |  |
| `openEscalateTrackerModal(ticketId, ref)` | 3929 |  |
| `renderEscalateAttachments(files)` | 3996 | The files that will travel with the issue. |
| `renderEscalateConfidential(isConfidential)` | 4024 | A confidential ticket (discussion #62) can still be escalated, but only on purpose: a warning and a box to tick, above the attachments. The server refuses the escalation without it, so this is the explanation, not the guard. |
| `closeEscalateTrackerModal()` | 4042 |  |
| `submitEscalateTracker()` | 4048 |  |
| `openContextLinkTicket()` | 4095 | Right-click "Link to ticket…" — targets whichever ticket was right-clicked. |
| `openLinkTicketModal(ticketId, ticketRef, subject)` | 4105 |  |
| `closeLinkTicketModal()` | 4115 |  |
| `linkTicketSearchDebounced()` | 4116 |  |
| `loadLinkTicketList()` | 4118 |  |
| `pickLinkTicket(targetId)` | 4133 |  |
| `unlinkTicketLink(linkId)` | 4150 |  |
| `buildRecordingsStrip(recordings)` | 4162 |  |
| `formatRecordingDuration(seconds)` | 4187 |  |
| `loadCorrespondenceThread(ticketId, isAuto = false)` | 4195 | Load and display all correspondence for a ticket. isAuto=true marks a 15s background refresh (channel tickets) so we don't disturb the analyst's draft. |
| `stopChannelAutoRefresh()` | 4271 |  |
| `Tc(key, params)` | 4283 | Shared translation helper for every channel-composer string (WhatsApp/ Telegram/Slack reply box, its templates, and its AI actions), falling back to the key itself — same convention as the other per-module `t()` wrappers in this file (e.g. the search modal's `T()` above) — so a missing key is visible rather than silently blank. |
| `channelDisplayLabel(channelType)` | 4288 | A human label for a channel, used in the composer header and toasts. |
| `renderChannelComposer(ticketId)` | 4295 | Render (or remove) the inline channel reply composer for WhatsApp-style tickets. Email tickets use the existing email modal and get no composer here. |
| `loadChannelTemplates()` | 4377 | Load the templates matching this channel's provider into the picker. |
| `onChannelTemplatePick(ticketId)` | 4397 | When a template is chosen, render an input per {{n}} variable + a live preview. |
| `updateChannelTemplatePreview()` | 4416 | Live preview of the rendered template (placeholders filled in). |
| `sendChannelTemplate(ticketId)` | 4427 | Send the chosen template. |
| `sendChannelMessage(ticketId)` | 4456 | Send the analyst's reply out over the ticket's channel. |
| `sendChannelAttachment(ticketId)` | 4491 | Send a file (image, document, …) picked via the composer's Attach button. The composer's text box, if anything is typed in it, becomes the caption — Telegram shows a caption under the photo/document, same as a person would type one there directly, so reusing the textarea needs no separate field. |
| `aiSuggestChannelReply(ticketId)` | 4528 | AI: draft a suggested reply into the composer (analyst reviews before sending). |
| `aiSummariseChannel(ticketId)` | 4552 | AI: summarise the conversation and save it as an internal note on the ticket. |
| `assignDepartment()` | 4574 | Assign department |
| `assignTicketType()` | 4616 | Assign ticket type |
| `assignTeam()` | 4660 | Hand the ticket to a team, or take it out of one (#1566). |
| `nameFor(id)` | 4665 |  |
| `refilterCategoriesForType()` | 4702 | Re-render both category pickers against the ticket's current type, dropping any selection the new type does not allow — matching what the server just did. Says so out loud: a value disappearing with no explanation reads as a bug. |
| `assignCategory()` | 4726 | Assign the "reported as" category. |
| `assignClosureCategory()` | 4731 | Assign the "turned out to be" category — the same tree, asked again at close. |
| `assignResolutionCode()` | 4736 | Assign the resolution code — how it ended, not what it was about. |
| `assignClassificationField(selectId, field, auditLabel)` | 4742 | The three share one path: read the select, send just that field, audit the change with the readable label rather than the id. |
| `labelFor(id)` | 4747 |  |
| `assignStatus()` | 4785 | Assign status |
| `openAttach()` | 4822 |  |
| `openChecklist()` | 4870 |  |
| `listOf(steps)` | 4875 |  |
| `isClosedStatusName(name)` | 4998 | Is this status name one that closes a ticket? |
| `mandatoryFieldsCheck(ticketIds)` | 5006 | Tickets that would close with mandatory fields empty, or null when the question could not be answered. Asked in chunks for a large selection. |
| `confirmCloseWithMandatoryFields(ticketIds)` | 5033 | Ask, then say. Resolves true when the close may go ahead: nothing is missing, the analyst chose to close anyway, or the question could not be answered. Resolves false when nothing should be sent. |
| `fieldsOf(tk)` | 5039 |  |
| `lines(list)` | 5067 | Several: one line per ticket, capped so a big selection stays readable. |
| `assignPriority()` | 5096 | Assign priority. Sends priority_id (or null for the "no priority" blank option) to assign_ticket.php; the SLA engine recomputes lazily on next read, so we don't need a separate recompute call here. |
| `confidentialIcon()` | 5132 | Normal / Confidential (discussion #62). Confidential keeps a ticket from the requester's managers; the service desk is unaffected. Lowering it back to Normal is only ever done here, by a person - nothing automatic does. |
| `assignSensitivity()` | 5136 |  |
| `label(v)` | 5139 |  |
| `assignOrigin()` | 5166 | Assign origin |
| `assignFirstTimeFix()` | 5195 | Assign first time fix |
| `assignItTraining()` | 5224 | Assign IT training provided |
| `assignOwner()` | 5253 | Assign owner (analyst) |
| `requestCsatSurvey()` | 5283 | Delete ticket |
| `deleteTicket()` | 5306 |  |
| `restoreTicketFromTrash(ticketId)` | 5346 | Restore a ticket from the Trash folder. |
| `clearReadingPaneIfTicket(ticketId)` | 5365 | Clear the reading pane if it's showing the given ticket (it just left the trash). |
| `permanentlyDeleteFromTrash(ticketId, ticketNumber)` | 5375 | Permanently delete a ticket from the Trash folder (irreversible). |
| `auditAuthor(entry)` | 5407 | Who made a history entry. The endpoint says WHICH case it is (analyst / system / former) rather than leaving a blank name to be guessed at; this turns that into the words, which is where the translations live. |
| `showAuditHistory()` | 5415 | Show audit history modal |
| `closeAuditModal()` | 5478 | Close audit modal |
| `refreshCurrentView()` | 5486 | Refresh current view |
| `escapeHtml(text)` | 5494 | Utility: Escape HTML |
| `rowNameSuffix(email)` | 5531 | The name with its separator, or nothing at all when the name is off — so "off" leaves "SD-1042" and not "SD-1042 - ", which is what appending an empty name to a hardcoded " - " would have produced. |
| `inboxRowName(email)` | 5536 |  |
| `senderLabel(name, address, withAngles)` | 5548 |  |
| `formatDateTime(dateStr)` | 5570 |  |
| `formatFullDateTime(dateStr)` | 5591 | Utility: Format full date/time (always shows date and time) |
| `formatNaiveFullDateTime(dateStr)` | 5601 | Format a NAIVE wall-clock datetime (a user-entered scheduling value stored WITHOUT a zone, e.g. a ticket's scheduled work-start) exactly as typed — no timezone conversion, so "2pm" reads 2pm for every analyst. Scheduling times are naive; only server-stamped UTC timestamps (received/created/…) convert. |
| `toggleTicketProperties(event)` | 5609 | Toggle ticket properties panel |
| `updatePropertiesSummary()` | 5629 | Update summary values when properties change |
| `loadCmdbObjects(ticketId)` | 5661 |  |
| `renderCmdbObjects(ticketId)` | 5673 |  |
| `openLinkCmdbPicker(ticketId)` | 5689 |  |
| `renderResults()` | 5697 |  |
| `pick(r)` | 5717 |  |
| `loadTicketDomains(ticketId)` | 5772 |  |
| `renderTicketDomains(ticketId)` | 5784 |  |
| `openLinkDomainPicker(ticketId)` | 5799 |  |
| `renderResults()` | 5805 |  |
| `pick(r)` | 5822 |  |
| `search()` | 5836 |  |
| `removeTicketDomain(ev, domainId, ticketId)` | 5857 |  |
| `loadTicketProjects(ticketId)` | 5883 |  |
| `openLinkProjectPicker(ticketId)` | 5899 |  |
| `renderResults()` | 5904 |  |
| `pick(r)` | 5920 |  |
| `search()` | 5933 |  |
| `removeTicketProject(ev, projectId, ticketId)` | 5954 |  |
| `removeCmdbObject(ev, linkId, ticketId)` | 5970 |  |
| `loadTicketAssets(ticketId)` | 5999 |  |
| `assetDisplayName(a)` | 6012 | The one-line name for an asset: hostname if it has one, else the tag. |
| `renderTicketAssets(ticketId)` | 6016 |  |
| `openLinkAssetPicker(ticketId)` | 6039 |  |
| `renderResults()` | 6050 |  |
| `search(q)` | 6083 |  |
| `pick(r)` | 6099 |  |
| `removeTicketAsset(ev, linkId, ticketId)` | 6138 |  |
| `loadNotes(ticketId)` | 6158 | Load notes for a ticket |
| `loadTicketAttachments(ticketId)` | 6173 | Load attachments for a ticket |
| `renderAttachmentInfoBar()` | 6188 | Render the attachment info bar |
| `formatDateDMY(dateStr)` | 6220 | A stored UTC timestamp in the analyst's zone and chosen format. |
| `showAttachmentList()` | 6228 | Show attachment list modal |
| `attachmentCardsHtml(trackerLink)` | 6324 | Phone-only body for the attachment list: no table (six columns cannot fit a phone), one full-width card per attachment instead - the preview when the browser can show one, then the filename and every column the table had as label/value lines. Tapping the details downloads, as a table row does. Desktop never calls this (showAttachmentList gates on ticketMenuIsSheet). |
| `line(label, value)` | 6325 |  |
| `closeAttachmentListModal()` | 6360 | Close attachment list modal |
| `sendAttachmentToTracker(btn)` | 6374 | Send one attachment up to the issue this ticket is linked to. |
| `openAttachment(attachmentId)` | 6423 | Open/download an attachment |
| `renderNotes()` | 6428 | Render notes |
| `safeExternalUrl(url)` | 6522 | A DMS entry's URL is typed by an analyst, so it reaches here as data and must never become an href on trust — `javascript:` in that box would otherwise run on every colleague who opens the ticket. Same allowlist rule as `safeHref()` in documents.js, restated rather than shared because it is one regex and the alternative is a cross-module util contract for two lines. |
| `noteFileSize(bytes)` | 6531 | ⚠️ `formatFileSize()` already exists at the top of this file and is used for email attachments. Reused deliberately — a second one here would mean the same file reported a different size in two places on the same screen. It returns 'NaN undefined' for a null size, so callers guard rather than it being changed under the code that already depends on it. |
| `renderPendingNoteFiles()` | 6538 | Paint the chosen-files list in the modal. Rebuilt wholesale rather than patched: the list is tiny and an index-based remove has to stay in step with the array it indexes into. |
| `openNoteModal()` | 6560 | Open note modal |
| `closeNoteModal()` | 6621 | Close note modal |
| `saveNote()` | 6627 | Save note |
| `correspondentAddress(email)` | 6736 | The address of the PERSON on a message — never our own service desk. |
| `openReplyModal()` | 6745 |  |
| `openForwardModal()` | 6797 | Open forward modal |
| `closeEmailModal()` | 6824 | Close email modal |
| `splitPlural(n, baseKey)` | 6864 | Pick the singular or plural translation for a count. |
| `openSplitModal(ticketId, emailId)` | 6875 |  |
| `closeSplitModal()` | 6892 |  |
| `loadSplitMessages()` | 6901 | Fetch every movable message on the ticket and paint the checklist. The whole set comes from the server (markers already excluded) so the dialog offers exactly what the split will accept — the same reason the anchor preview was never counted in JS. |
| `renderSplitList()` | 6927 | Paint the checklist newest-first (matching the reading pane) from splitSelected. |
| `splitToggle(id, on)` | 6948 |  |
| `splitSelectNewer(ev)` | 6959 | Tick the opened-from message and everything newer than it — the old contiguous default, now a one-click helper rather than the only option. "Newer" means later in time, which is ABOVE the anchor in the newest-first list. |
| `splitSelectAll(ev)` | 6973 |  |
| `splitClearSel(ev)` | 6980 |  |
| `splitUpdateState()` | 6988 | Recompute the count, subject default, warning and the Split button's state. |
| `undoSplit(splitId)` | 7024 | Undo a split — send the messages back and bin the ticket that was created. |
| `confirmSplit()` | 7055 |  |
| `openSubjectModal()` | 7098 |  |
| `closeSubjectModal()` | 7115 |  |
| `saveSubject()` | 7120 |  |
| `loadMergeSettings()` | 7169 |  |
| `openMergeModal()` | 7182 |  |
| `mergeEffectText(s, count)` | 7236 | Spell out what the configured policy will actually do, in plain words. |
| `closeMergeModal()` | 7248 |  |
| `confirmMerge()` | 7252 |  |
| `showMergeSummaryStage(data)` | 7296 |  |
| `startMergeSummaryProgress()` | 7330 |  |
| `paint()` | 7335 |  |
| `stopMergeSummaryProgress()` | 7344 |  |
| `streamMergeSummary(ticketId)` | 7350 |  |
| `pump()` | 7367 |  |
| `saveMergeSummary()` | 7406 |  |
| `discardMergeSummary()` | 7424 |  |
| `selectEmailByTicketId(ticketId)` | 7431 | Open whichever list row belongs to a ticket id (after a merge, the survivor). |
| `loadReplyTemplatesForPicker(force = false)` | 7451 |  |
| `toggleReplyTemplateMenu(event)` | 7463 |  |
| `closeReplyTemplateMenu()` | 7483 |  |
| `renderReplyTemplateMenu()` | 7496 |  |
| `insertReplyTemplate(templateId)` | 7539 |  |
| `openSaveReplyTemplateModal(mode, id)` | 7569 |  |
| `closeSaveReplyTemplateModal()` | 7590 |  |
| `savePersonalReplyTemplate()` | 7594 |  |
| `deleteMyReplyTemplate(id)` | 7628 |  |
| `setReplyCleanupVisibility(mode)` | 7663 |  |
| `replyCleanupTextToHtml(text)` | 7670 | Convert plain-text-with-blank-lines (Claude's output) to TinyMCE-friendly HTML |
| `cleanupReplyDraft()` | 7681 |  |
| `showReplyCleanupUndoBar()` | 7790 |  |
| `hideReplyCleanupUndoBar()` | 7813 |  |
| `sendEmail()` | 7842 | Send email via Microsoft Graph API |
| `prepareAttachments()` | 7916 | Prepare attachments by converting to base64 |
| `fileToBase64(file)` | 7932 | Convert file to base64 |
| `logout()` | 7946 | Logout |
| `openNewTicketModal()` | 7957 | New Ticket Modal Functions |
| `onNewTicketCompanyChange()` | 8025 | Refill the New Ticket type list once a company is chosen (#1554). |
| `loadNewTicketMailboxes()` | 8044 | Load the mailboxes this ticket can be sent from (scoped to the active company) and populate the New Ticket modal's mailbox picker. Fires async; the modal can open before it returns. |
| `closeNewTicketModal()` | 8076 |  |
| `createNewTicket()` | 8080 |  |
| `reqEls()` | 8192 |  |
| `reqReset()` | 8205 | Back to the empty state: nothing chosen, nothing typed, no new-person form. |
| `reqCloseList()` | 8222 |  |
| `reqChoose(user)` | 8231 | Commit a chosen requester and swap the input for the chip. |
| `reqShowNew(term)` | 8249 | Reveal the new-person fields, pre-filled from whatever was typed. |
| `reqRenderResults(users, term)` | 8268 |  |
| `reqSearch()` | 8303 |  |
| `reqMove(delta)` | 8316 | Move the keyboard cursor. Rows include the trailing "add" row. |
| `reqCommitActive()` | 8331 |  |
| `reqActivateOption(el)` | 8340 |  |
| `initRequesterPicker()` | 8356 |  |
| `openReqBrowse()` | 8399 |  |
| `closeReqBrowse()` | 8413 |  |
| `reqBrowseLoad()` | 8417 |  |
| `openSearchModal()` | 8466 |  |
| `closeSearchModal()` | 8495 |  |
| `initSearchModalDrag()` | 8519 |  |
| `onmousedown(e)` | 8523 |  |
| `onmousemove(e)` | 8537 |  |
| `onmouseup()` | 8551 |  |
| `performSearch()` | 8559 |  |
| `renderSearchResults(results)` | 8606 |  |
| `performContentSearch(query)` | 8636 | Its own function because the results answer a different question and so carry a different shape: a snippet, and which parts of the ticket matched. |
| `renderContentSearchResults(data)` | 8659 |  |
| `T(k, p)` | 8661 |  |
| `partName(t)` | 8682 |  |
| `selectSearchResult(emailId)` | 8707 |  |
| `clearSearch()` | 8713 |  |
| `setScheduleDuration(minutes)` | 8756 | Put `minutes` in the duration select. |
| `syncScheduleAllDay()` | 8772 | All-day means no start time and no duration, so both fields go away. |
| `openScheduleModal(ticketId, ticketRef, sched)` | 8791 | Open Schedule work. |
| `p(n)` | 8810 |  |
| `closeScheduleModal()` | 8842 |  |
| `applyScheduleLocally(ticketId, start, end, allDay)` | 8855 | Reflect a saved schedule in whatever the page is already holding. |
| `saveSchedule()` | 8866 |  |
| `clearSchedule()` | 8909 |  |
| `openTicketAiChat()` | 8944 |  |
| `closeTicketAiChat()` | 8968 |  |
| `askTicketAi()` | 8973 |  |
| `_sendTicketAiMessage(question, isAutoContext)` | 8981 |  |
| `formatTicketAiResponse(text, articlesList)` | 9048 |  |
| `toggleTicketPopout()` | 9124 | --- Pop-out (full-screen) ticket view --- Toggles a body class that hides the folder list + email list and floats the ticket properties container as a right-hand panel. Pure CSS — no DOM restructuring. Preference persists in localStorage so the analyst's choice sticks across reloads / ticket selections. |
| `selectEmailFullScreen(emailId)` | 9134 | Double-click on an email row: open it AND pop out. Sets the popout pref so the syncPopoutToTicketState call inside displayEmail applies the class once the ticket renders. Goes through the same storage path as the toggle button so the state is consistent (an F5 mid-popout will land you in 3-col view, but as soon as you pick a ticket again you're back in popout). |
| `loadTimeEntries(ticketId)` | 9145 |  |
| `formatMinutes(mins)` | 9172 | Convert minutes int to a short display string: 45 → "45m", 90 → "1h 30m". |
| `renderTimeEntries(totalMinutes)` | 9180 |  |
| `saveTimeEntry()` | 9231 |  |
| `deleteTimeEntry(id)` | 9263 |  |
| `syncPopoutToTicketState(hasTicket)` | 9289 | Sync body.ticket-popout to the actual reading-pane state. Called by the ticket-render path (hasTicket=true: apply class if pref says so) and by every empty / loading / error state in the reading pane (hasTicket=false: always strip the class). Tying popout to a rendered ticket avoids the trap where an F5 with the pref saved leaves the user with folder + list hidden and the empty "select a ticket" message in the reading pane. |
| `openTicketContextMenu(event, ticketId, ticketRef)` | 9314 |  |
| `populateContextStatusSubmenu()` | 9412 | Build the Set-status submenu HTML from the active ticket_statuses lookup. Tick mark on the row matching the currently-open ticket's status (only shows when right-clicking the ticket that's in the reading pane, since context actions can target any ticket regardless of selection). |
| `populateContextPrioritySubmenu()` | 9437 | Build the Set-priority submenu HTML from the active ticket_priorities lookup. Priority is nullable on tickets, so the first row is a "no priority" option that clears the assignment. Same chip + tick pattern as the status submenu — colour swatch from the priority's stored colour. |
| `setPriorityFromContext(priorityId)` | 9467 | Set a ticket's priority from the right-click menu. Empty string clears the priority (priority_id is nullable on tickets). SLA recomputes lazily on the next ticket fetch — no explicit recompute call needed. |
| `populateContextDepartmentSubmenu()` | 9517 | Build the Set-department submenu HTML from the analyst's team departments (same `departments` lookup as the in-panel Department dropdown). department_id is nullable, so the first row is a "(no department)" option that clears it. |
| `setDepartmentFromContext(departmentId)` | 9544 | Set a ticket's department from the right-click menu. Empty string clears it (department_id is nullable). Refreshes folder counts + the list because the inbox can be grouped by department. |
| `populateContextCompanySubmenu()` | 9589 | Build the Move-to-company submenu (multi-company installs only; hidden at N=1). Lists the companies this analyst can access; the current one is ticked when right-clicking the ticket open in the reading pane. |
| `moveToCompanyFromContext(tenantId)` | 9612 | Move a ticket to another company from the right-click menu. The endpoint writes the audit entry server-side, so (unlike the other context actions) there's no client-side logAudit here. |
| `populateContextTypeSubmenu()` | 9642 | Build the Set-type submenu HTML from the active ticket_types lookup (same `ticketTypes` source as the in-panel Type dropdown). ticket_type_id is nullable, so the first row is a "(no type)" option that clears it. |
| `setTypeFromContext(typeId)` | 9668 | Set a ticket's type from the right-click menu. Empty string clears it (ticket_type_id is nullable). |
| `populateContextAssigneeSubmenu()` | 9713 | Build the Assign-to submenu HTML from the loaded analysts list. Picking an analyst sets both assigned_analyst_id and owner_id (mirrors the drag-to-analyst-folder behaviour in assign_ticket.php). The first row is an "Unassigned" option that clears both fields. |
| `populateContextTeamSubmenu()` | 9750 | The Assign-to-team submenu (#1566). |
| `setTeamFromContext(teamId)` | 9791 | Hand a ticket (or the whole selection) to a team. Empty string takes it out of every queue. |
| `setAssigneeFromContext(analystId)` | 9838 | Set a ticket's assignee from the right-click menu. Empty string = unassign. Sends assigned_analyst_id to assign_ticket.php, which sets both assigned_analyst_id and owner_id (same behaviour as drag-to-folder). |
| `setStatusFromContext(statusName)` | 9884 | Set a ticket's status from the right-click menu — works on whichever ticket was right-clicked, even if a different ticket is open in the reading pane. |
| `closeTicketContextMenu()` | 9924 |  |
| `ticketMenuIsSheet()` | 9948 |  |
| `openTicketMenuSheet(menu)` | 9952 |  |
| `openTicketMenuLevel(menu, label, sub)` | 9989 |  |
| `cancel()` | 10016 |  |
| `preventDefault()` | 10031 |  |
| `contextMoveToTrash()` | 10052 | Right-click a ticket -> Move to trash (soft-delete the context-menu target). |
| `availableSnoozePresets()` | 10102 |  |
| `snoozeWakeHour()` | 10106 |  |
| `atHourLocal(hour, addDays)` | 10113 | A Date at `hour` today plus `addDays`. Mirrors the server's "tonight"/"tomorrow" arithmetic; "tonight" rolls forward a day when 18:00 has already gone. |
| `nextMondayLocal(hour)` | 10121 |  |
| `formatWakeTime(value)` | 10133 | "Today 15:00" / "Tomorrow 09:00" / "Mon 4 Aug, 09:00" — in the analyst's zone. Deliberately always carries the time: "Thursday" alone leaves them wondering whether the ticket is back first thing or at the end of the day. |
| `inboxRowStyle(field)` | 10172 |  |
| `inboxAnyStyleIs(placement)` | 10179 | Is any field currently asking for this placement? Lets us skip empty containers. |
| `inboxInitials(name)` | 10188 | "Ed Mozley" → "EM". Falls back to the first two characters of a single word, so a mononym or a service account still renders something rather than a blank chip that looks like a bug. |
| `inboxSafeColour(value)` | 10196 | A safe CSS colour, or null. Anything unrecognised is dropped rather than emitted. |
| `inboxRowStripes(email)` | 10202 | The left-edge stripes. Both priority and status may ask for one; they stack. |
| `inboxRowBlocks(email)` | 10221 | The top-right blocks. Same stacking rule as stripes. |
| `inboxRowChips(email)` | 10240 | Pills and dots for the footer row, plus the agent chip. |
| `colourField(field, value, colour)` | 10243 |  |
| `snoozeRowPill(snoozedUntil, reason)` | 10279 |  |
| `populateContextSnoozeSubmenu()` | 10293 | Build the Snooze flyout. Rebuilt on every open so the labels carry live times — a menu built at page load would still be offering "Tomorrow · Wed 09:00" on Thursday, and an analyst reads the label, not the key behind it. |
| `ctxTargetIsSnoozed()` | 10311 | Is the context-menu target asleep? Read from the loaded list row, or from the open ticket when the menu was raised on the one in the reading pane. |
| `ctxSnoozeTargets()` | 10319 | Which tickets does a snooze/wake act on? Same rule as every other context action: the whole selection when the menu was raised inside it, else the one row. |
| `snoozeFromContext(preset, untilLocal, reason)` | 10323 |  |
| `wakeFromContext()` | 10358 |  |
| `wakeTickets(ids)` | 10365 | Shared by the context menu and the reading-pane banner button. |
| `openSnoozeModal()` | 10397 |  |
| `closeSnoozeModal()` | 10419 |  |
| `saveCustomSnooze()` | 10424 |  |
| `buildSnoozeBanner(email)` | 10444 | Reading-pane banner on a sleeping ticket. Quiet like the split banners rather than loud like merged-away: nothing is wrong here, the ticket is just resting, and the one thing an analyst wants is the way out of it. |
| `startPresence(ticketId)` | 10484 | Start (or move) the heartbeat to a ticket. Safe to call repeatedly. |
| `stopPresence()` | 10504 | Stop announcing entirely (the reading pane emptied). |
| `beatPresence()` | 10513 |  |
| `leavePresence(ticketId)` | 10540 | Fire-and-forget leave. Uses sendBeacon during teardown, when fetch is unreliable. |
| `setPresenceComposing(on)` | 10562 | Tell the server whether our composer is open. |
| `joinNames(names)` | 10575 | Join names the way a person would: "A", "A and B", "A, B and C". The conjunction is translated — `t()` returns the KEY when a string is missing, so it must be a real one rather than a `\|\| 'and'` fallback that would render the literal text "common.and" on screen. |
| `renderPresenceStrip()` | 10587 | Paint the strip. Two states, because they deserve different weight: someone merely having the ticket open is information, someone WRITING is the moment your work becomes duplicated effort. |
| `renderComposerCollisionWarning()` | 10637 | The warning inside our own composer. |
| `openTrashContextMenu(event)` | 10661 |  |
| `closeTrashContextMenu()` | 10673 |  |
| `emptyTrash()` | 10677 |  |
| `openContextLinkTask()` | 10743 | Right-click → Link to task (discussion #83). |
| `openLinkTaskModal(ticketId, ticketRef)` | 10763 |  |
| `closeLinkTaskModal()` | 10771 |  |
| `linkTaskSearchDebounced()` | 10772 |  |
| `loadLinkTaskList()` | 10774 |  |
| `pickLinkTask(idx)` | 10807 |  |
| `openContextLinkCmdb()` | 10836 |  |
| `closeContextCmdbModal()` | 10848 |  |
| `linkContextCmdbObject(objectId, objectName)` | 10891 |  |
| `openContextSchedule()` | 10928 | Schedule work on the right-clicked ticket, which may not be the one open in the reading pane. The row in `emails` carries the schedule columns, so the modal prefills what this ticket is already set to rather than the open one's. |
| `openContextRecordTime()` | 10938 |  |
| `closeContextTimeModal()` | 10954 |  |
| `saveContextTimeEntry()` | 10958 |  |
| `loadSlaState(ticketId)` | 11007 | --- SLA panel in the reading pane --------------------------------------- Fetches /api/tickets/get_ticket_sla.php and renders a small status panel showing response + resolution targets, elapsed / remaining / percent, and a green/amber/red colour-coded badge per target. Hides itself silently if SLA is disabled for the ticket (no priority, no target set, ticket pre-dates cutoff, SLA disabled globally) — so the section just doesn't appear and doesn't bother the analyst with "SLA disabled for this ticket" noise. |
| `renderSlaPanel(sla)` | 11021 |  |
| `fmt(mins)` | 11026 |  |
| `renderRow(label, target)` | 11035 |  |
| `ticketIsClosed(email)` | 11095 | Is this ticket in a status the admin has marked as closed? |
| `buildWriteUpButton(email)` | 11101 |  |
| `openWriteUpModal()` | 11113 |  |
| `closeWriteUpModal()` | 11145 |  |
| `wuRetryWithAnswers()` | 11150 |  |
| `wuStream(payload)` | 11170 | Stream the write-up. The server sends the verdict as its own event before any prose, so nothing is rendered until we know whether this is an article or a refusal — otherwise the words "VERDICT: ARTICLE" land in the analyst's draft. |
| `statusEl()` | 11172 |  |
| `contentEl()` | 11173 |  |
| `handle(event, data)` | 11189 |  |
| `wuFinish(data)` | 11234 |  |
| `wuSaveDraft()` | 11270 |  |
| `loadMySignatures(force)` | 11315 |  |
| `signatureWrap(sig)` | 11331 |  |
| `applyDefaultSignature()` | 11336 | Drop the analyst's default signature into a freshly opened composer. |
| `setSignatureInEditor(sig)` | 11354 | Put this signature in, replacing whichever one is already there. |
| `toggleSignatureMenu(event)` | 11382 |  |
| `closeSignatureMenu()` | 11394 |  |
| `renderSignatureMenu()` | 11406 |  |
| `pickSignature(id)` | 11441 |  |
| `aiSummaryOn()` | 11483 |  |
| `aiReadOn()` | 11484 |  |
| `buildAiSummarySlot()` | 11487 | The slot. Empty markup when the feature is off, so nothing reserves space. |
| `buildReadForMeButton()` | 11492 |  |
| `loadAiSummary(ticketId)` | 11503 |  |
| `renderAiSummary()` | 11532 |  |
| `toggleAiSummary()` | 11596 |  |
| `refreshAiSummary(auto)` | 11604 |  |
| `showAiSummaryHistory()` | 11657 | Every version ever written, because nothing here is ever overwritten. |
| `openReadForMe()` | 11685 | Opening the panel READS what is already stored — from the database, never the provider — so a briefing you have seen comes back instantly and free. Only "Read again" spends anything, and only when there is nothing stored at all is one written without being asked for. |
| `runReadForMe()` | 11709 | ⚠️ A REASONING MODEL CAN TAKE A MINUTE, and every call here is PAID. The first version showed a motionless "Reading the ticket…" for the whole of it, which is precisely when somebody clicks again — so a slow answer billed twice and the second call overwrote the first. The guard is the part that matters; the counter only stops it LOOKING broken. |
| `aiReadRender(b, versionCount)` | 11745 | One renderer for a stored briefing and a freshly written one, so a re-read cannot come back looking different from what reopening shows. |
| `aiReadShowError(code)` | 11769 |  |
| `showAiReadHistory()` | 11775 | Every briefing ever written for this ticket — nothing is overwritten. |
| `showAiPanel(title, html)` | 11794 |  |
| `closeAiPanel()` | 11814 |  |
| `aiErrorText(code)` | 11820 | Every failure this can have, said in words rather than as a code. |

## API endpoints it calls

- [api/system/get_tenants.php](/code/files/api/system/get_tenants.php.md)
- [api/problem-management/list.php](/code/files/api/problem-management/list.php.md)
- [api/problem-management/save.php](/code/files/api/problem-management/save.php.md)
- [api/problem-management/link_ticket.php](/code/files/api/problem-management/link_ticket.php.md)
- [api/problem-management/unlink_ticket.php](/code/files/api/problem-management/unlink_ticket.php.md)
- [api/change-management/list.php](/code/files/api/change-management/list.php.md)
- [api/change-management/save.php](/code/files/api/change-management/save.php.md)
- [api/change-management/link_ticket.php](/code/files/api/change-management/link_ticket.php.md)
- [api/change-management/unlink_ticket.php](/code/files/api/change-management/unlink_ticket.php.md)
- [api/tickets/get_ticket_tasks.php](/code/files/api/tickets/get_ticket_tasks.php.md)
- [api/tickets/search_linkable_tasks.php](/code/files/api/tickets/search_linkable_tasks.php.md)
- [api/tickets/save_ticket_task.php](/code/files/api/tickets/save_ticket_task.php.md)
- [api/tickets/delete_ticket_task.php](/code/files/api/tickets/delete_ticket_task.php.md)
- [api/integrations/connections_for_ticket.php](/code/files/api/integrations/connections_for_ticket.php.md)
- [api/integrations/escalate_ticket.php](/code/files/api/integrations/escalate_ticket.php.md)
- [api/tickets/list_linkable_tickets.php](/code/files/api/tickets/list_linkable_tickets.php.md)
- [api/tickets/create_ticket_link.php](/code/files/api/tickets/create_ticket_link.php.md)
- [api/tickets/delete_ticket_link.php](/code/files/api/tickets/delete_ticket_link.php.md)
- [api/self-service/get_recording.php](/code/files/api/self-service/get_recording.php.md)
- [api/tickets/get_ticket_cmdb_objects.php](/code/files/api/tickets/get_ticket_cmdb_objects.php.md)
- [api/tickets/save_ticket_cmdb_object.php](/code/files/api/tickets/save_ticket_cmdb_object.php.md)
- [api/cmdb/search_objects.php](/code/files/api/cmdb/search_objects.php.md)
- [api/domains/links.php](/code/files/api/domains/links.php.md)
- [api/projects/links.php](/code/files/api/projects/links.php.md)
- [api/tickets/delete_ticket_cmdb_object.php](/code/files/api/tickets/delete_ticket_cmdb_object.php.md)
- [api/tickets/get_ticket_assets.php](/code/files/api/tickets/get_ticket_assets.php.md)
- [api/tickets/search_linkable_assets.php](/code/files/api/tickets/search_linkable_assets.php.md)
- [api/tickets/save_ticket_asset.php](/code/files/api/tickets/save_ticket_asset.php.md)
- [api/tickets/delete_ticket_asset.php](/code/files/api/tickets/delete_ticket_asset.php.md)
- [api/integrations/send_attachment.php](/code/files/api/integrations/send_attachment.php.md)
- [api/documents/download.php](/code/files/api/documents/download.php.md)
- [api/knowledge/ai_chat.php](/code/files/api/knowledge/ai_chat.php.md)
- [api/tickets/save_time_entry.php](/code/files/api/tickets/save_time_entry.php.md)
- [api/tickets/ai_summary.php](/code/files/api/tickets/ai_summary.php.md)
- [api/tickets/ai_read.php](/code/files/api/tickets/ai_read.php.md)

## Loaded by

- [tickets/index.php](/code/files/tickets/index.php.md)

## Traps

> [!WARNING]
> **Line 10747:** on a phone the strip picker opens inside the Links sheet, which

