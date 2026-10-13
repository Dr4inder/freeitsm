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
| `mcOpened()` | 170 |  |
| `mcRemember(id, open)` | 175 |  |
| `mcApply(host, opts)` | 192 | Collapse one rendered message if it is taller than the threshold. |
| `paint(open)` | 224 |  |
| `tgGroupOlder(container)` | 249 |  |
| `mcSweep(root)` | 301 |  |
| `ticketCompanyId(email)` | 343 | The company a ticket's lookup lists should come from. NULL tenant_id = unrouted, which Default owns by convention. |
| `listForTicket(byCompany, fallback, email)` | 350 | Per-company list if we have one for this ticket, else the page-wide list. |
| `logAudit(ticketId, fieldName, oldValue, newValue)` | 395 |  |
| `getDisplayName(type, id)` | 413 |  |
| `sharedApiBase()` | 433 |  |
| `loadFolderGroupingPreference()` | 437 |  |
| `loadViewFilterPreference()` | 466 |  |
| `viewFilterMineActive()` | 480 |  |
| `analystFolderLabel(an)` | 487 |  |
| `viewFilterParams()` | 491 |  |
| `setViewFilter(key, value)` | 498 |  |
| `updateViewFilterUI()` | 513 |  |
| `toggleViewFilterMenu(event)` | 540 |  |
| `closeViewFilterMenu()` | 550 |  |
| `loadSearchIncludeClosedPreference()` | 566 |  |
| `saveSearchIncludeClosed(checked)` | 575 |  |
| `searchIncludeClosed()` | 583 |  |
| `setFolderGrouping(mode)` | 588 |  |
| `initAttachmentHandlers()` | 656 |  |
| `handleFiles(files)` | 697 |  |
| `renderAttachments()` | 709 |  |
| `removeAttachment(index)` | 731 |  |
| `getFileIcon(filename)` | 737 |  |
| `formatFileSize(bytes)` | 755 |  |
| `initTinyMCE()` | 764 |  |
| `loadDepartments()` | 804 |  |
| `loadTicketTypes()` | 820 |  |
| `loadTicketTeams()` | 846 | The teams a ticket can be handed to (#1566). |
| `loadTicketClassification()` | 873 |  |
| `categoriesForType(typeId, email)` | 896 |  |
| `categoryOptionsFor(typeId, selectedId, email)` | 907 |  |
| `loadTicketOrigins()` | 922 |  |
| `loadMoveCompanies()` | 940 |  |
| `moveTicketCompany(targetId)` | 957 |  |
| `loadTicketStatuses()` | 984 |  |
| `loadTicketPriorities()` | 998 |  |
| `loadAnalysts()` | 1012 |  |
| `loadFolderCounts()` | 1026 |  |
| `renderFolders()` | 1042 |  |
| `updateActiveFolderClasses()` | 1286 |  |
| `toggleFolder(folderId, groupId, opts = {})` | 1330 |  |
| `selectFolder(type, id = null)` | 1398 |  |
| `selectDeptStatus(deptId, status)` | 1422 |  |
| `selectTeamStatus(teamId, status)` | 1432 |  |
| `selectUnassignedStatus(status)` | 1443 |  |
| `selectAllStatus(status)` | 1453 |  |
| `selectAnalystStatus(analystId, status)` | 1462 |  |
| `attachEmailDragHandlers()` | 1480 |  |
| `attachFolderDropHandlers()` | 1553 |  |
| `cancelDragHover()` | 1632 |  |
| `handleTicketDrop(targetEl, ticketId, ticketNumber)` | 1640 |  |
| `loadEmails()` | 1826 |  |
| `companyChip(email)` | 1907 | Which company a ticket belongs to, shown on the row in the consolidated view. |
| `renderEmailList()` | 1917 |  |
| `loadInboxSlaIndicators()` | 1981 | Populate the SLA dot in each email row via the batch endpoint. |
| `renderInboxSlaIndicator(row)` | 2008 | Build the inline dot + label for one email row. |
| `setSelectedEmailRow(emailId)` | 2050 |  |
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
| `renderKeepModeWarning()` | 2342 |  |
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
| `selectEmail(emailId)` | 2712 |  |
| `loadTicketById(ticketId)` | 2772 |  |
| `displayEmail(email, recordings)` | 2798 |  |
| `openContextLinkProblem()` | 3186 |  |
| `openLinkProblemModal(ticketId, ticketRef, subject)` | 3198 |  |
| `closeLinkProblemModal()` | 3207 |  |
| `linkProblemSearchDebounced()` | 3208 |  |
| `loadLinkProblemList()` | 3210 |  |
| `pickProblem(problemId)` | 3227 |  |
| `createProblemFromIncident()` | 3228 |  |
| `doLinkTicketProblem(target)` | 3239 |  |
| `unlinkTicketFromProblem(problemId)` | 3253 |  |
| `openContextLinkChange()` | 3268 |  |
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
| `syncLinksStripEmpty()` | 3606 | Hide the strip's "Not linked to anything yet" note once anything at all has been linked — including the pills that arrive after the strip was drawn. Called by both async loaders; safe to call when the note isn't there. |
| `openStripPicker(placeholder)` | 3632 | Shared picker chrome for the Links strip. |
| `toggleLinkAddMenu(e)` | 3650 |  |
| `closeLinkAddMenu()` | 3657 |  |
| `linkAddChoose(kind)` | 3661 |  |
| `loadTicketTasks(ticketId)` | 3688 |  |
| `renderTicketTasks(ticketId)` | 3704 |  |
| `openLinkTaskPicker(ticketId)` | 3746 | One picker, both verbs. Typing searches existing tasks; if what you typed matches nothing (or nothing quite right) the first row creates a task with that title. That is why linking and creating are not two menu entries: you see the near-matches as you type, so you link the task that already exists instead of quietly making a second one. |
| `createTaskForTicket(ticketId, title)` | 3857 |  |
| `linkTaskToTicket(ticketId, taskId)` | 3862 |  |
| `postTaskLink(ticketId, body, okMessage)` | 3867 |  |
| `unlinkTicketTask(event, taskId, ticketId)` | 3890 |  |
| `openEscalateTrackerModal(ticketId, ref)` | 3929 |  |
| `renderEscalateAttachments(files)` | 3996 | The files that will travel with the issue. |
| `renderEscalateConfidential(isConfidential)` | 4024 | A confidential ticket (discussion #62) can still be escalated, but only on purpose: a warning and a box to tick, above the attachments. The server refuses the escalation without it, so this is the explanation, not the guard. |
| `closeEscalateTrackerModal()` | 4042 |  |
| `submitEscalateTracker()` | 4048 |  |
| `openContextLinkTicket()` | 4095 |  |
| `openLinkTicketModal(ticketId, ticketRef, subject)` | 4105 |  |
| `closeLinkTicketModal()` | 4115 |  |
| `linkTicketSearchDebounced()` | 4116 |  |
| `loadLinkTicketList()` | 4118 |  |
| `pickLinkTicket(targetId)` | 4133 |  |
| `unlinkTicketLink(linkId)` | 4150 |  |
| `buildRecordingsStrip(recordings)` | 4162 |  |
| `formatRecordingDuration(seconds)` | 4187 |  |
| `loadCorrespondenceThread(ticketId, isAuto = false)` | 4195 |  |
| `stopChannelAutoRefresh()` | 4271 |  |
| `Tc(key, params)` | 4283 |  |
| `channelDisplayLabel(channelType)` | 4288 |  |
| `renderChannelComposer(ticketId)` | 4295 |  |
| `loadChannelTemplates()` | 4377 |  |
| `onChannelTemplatePick(ticketId)` | 4397 |  |
| `updateChannelTemplatePreview()` | 4416 |  |
| `sendChannelTemplate(ticketId)` | 4427 |  |
| `sendChannelMessage(ticketId)` | 4456 |  |
| `sendChannelAttachment(ticketId)` | 4491 |  |
| `aiSuggestChannelReply(ticketId)` | 4528 |  |
| `aiSummariseChannel(ticketId)` | 4552 |  |
| `assignDepartment()` | 4574 |  |
| `assignTicketType()` | 4616 |  |
| `assignTeam()` | 4660 | Hand the ticket to a team, or take it out of one (#1566). |
| `refilterCategoriesForType()` | 4702 |  |
| `assignCategory()` | 4726 |  |
| `assignClosureCategory()` | 4731 |  |
| `assignResolutionCode()` | 4736 |  |
| `assignClassificationField(selectId, field, auditLabel)` | 4742 |  |
| `assignStatus()` | 4785 |  |
| `isClosedStatusName(name)` | 4998 | Is this status name one that closes a ticket? |
| `mandatoryFieldsCheck(ticketIds)` | 5006 | Tickets that would close with mandatory fields empty, or null when the question could not be answered. Asked in chunks for a large selection. |
| `confirmCloseWithMandatoryFields(ticketIds)` | 5033 | Ask, then say. Resolves true when the close may go ahead: nothing is missing, the analyst chose to close anyway, or the question could not be answered. Resolves false when nothing should be sent. |
| `assignPriority()` | 5096 |  |
| `confidentialIcon()` | 5132 |  |
| `assignSensitivity()` | 5136 |  |
| `assignOrigin()` | 5166 |  |
| `assignFirstTimeFix()` | 5195 |  |
| `assignItTraining()` | 5224 |  |
| `assignOwner()` | 5253 |  |
| `requestCsatSurvey()` | 5283 |  |
| `deleteTicket()` | 5306 |  |
| `restoreTicketFromTrash(ticketId)` | 5346 |  |
| `clearReadingPaneIfTicket(ticketId)` | 5365 |  |
| `permanentlyDeleteFromTrash(ticketId, ticketNumber)` | 5375 |  |
| `auditAuthor(entry)` | 5407 |  |
| `showAuditHistory()` | 5415 |  |
| `closeAuditModal()` | 5478 |  |
| `refreshCurrentView()` | 5486 |  |
| `escapeHtml(text)` | 5494 |  |
| `rowNameSuffix(email)` | 5531 | The name with its separator, or nothing at all when the name is off — so "off" leaves "SD-1042" and not "SD-1042 - ", which is what appending an empty name to a hardcoded " - " would have produced. |
| `inboxRowName(email)` | 5536 |  |
| `senderLabel(name, address, withAngles)` | 5548 |  |
| `formatDateTime(dateStr)` | 5570 |  |
| `formatFullDateTime(dateStr)` | 5591 |  |
| `formatNaiveFullDateTime(dateStr)` | 5601 |  |
| `toggleTicketProperties(event)` | 5609 |  |
| `updatePropertiesSummary()` | 5629 |  |
| `loadCmdbObjects(ticketId)` | 5661 |  |
| `renderCmdbObjects(ticketId)` | 5673 |  |
| `openLinkCmdbPicker(ticketId)` | 5689 |  |
| `loadTicketDomains(ticketId)` | 5772 |  |
| `renderTicketDomains(ticketId)` | 5784 |  |
| `openLinkDomainPicker(ticketId)` | 5799 |  |
| `removeTicketDomain(ev, domainId, ticketId)` | 5857 |  |
| `loadTicketProjects(ticketId)` | 5883 |  |
| `openLinkProjectPicker(ticketId)` | 5899 |  |
| `removeTicketProject(ev, projectId, ticketId)` | 5954 |  |
| `removeCmdbObject(ev, linkId, ticketId)` | 5970 |  |
| `loadTicketAssets(ticketId)` | 5999 |  |
| `assetDisplayName(a)` | 6012 | The one-line name for an asset: hostname if it has one, else the tag. |
| `renderTicketAssets(ticketId)` | 6016 |  |
| `openLinkAssetPicker(ticketId)` | 6039 |  |
| `removeTicketAsset(ev, linkId, ticketId)` | 6138 |  |
| `loadNotes(ticketId)` | 6158 |  |
| `loadTicketAttachments(ticketId)` | 6173 |  |
| `renderAttachmentInfoBar()` | 6188 |  |
| `formatDateDMY(dateStr)` | 6220 |  |
| `showAttachmentList()` | 6228 |  |
| `attachmentCardsHtml(trackerLink)` | 6324 |  |
| `closeAttachmentListModal()` | 6360 |  |
| `sendAttachmentToTracker(btn)` | 6374 | Send one attachment up to the issue this ticket is linked to. |
| `openAttachment(attachmentId)` | 6423 |  |
| `renderNotes()` | 6428 |  |
| `safeExternalUrl(url)` | 6522 |  |
| `noteFileSize(bytes)` | 6531 |  |
| `renderPendingNoteFiles()` | 6538 |  |
| `openNoteModal()` | 6560 |  |
| `closeNoteModal()` | 6621 |  |
| `saveNote()` | 6627 |  |
| `correspondentAddress(email)` | 6736 | The address of the PERSON on a message — never our own service desk. |
| `openReplyModal()` | 6745 |  |
| `openForwardModal()` | 6797 |  |
| `closeEmailModal()` | 6824 |  |
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
| `replyCleanupTextToHtml(text)` | 7670 |  |
| `cleanupReplyDraft()` | 7681 |  |
| `showReplyCleanupUndoBar()` | 7790 |  |
| `hideReplyCleanupUndoBar()` | 7813 |  |
| `sendEmail()` | 7842 |  |
| `prepareAttachments()` | 7916 |  |
| `fileToBase64(file)` | 7932 |  |
| `logout()` | 7946 |  |
| `openNewTicketModal()` | 7957 |  |
| `onNewTicketCompanyChange()` | 8025 | Refill the New Ticket type list once a company is chosen (#1554). |
| `loadNewTicketMailboxes()` | 8044 |  |
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
| `performSearch()` | 8559 |  |
| `renderSearchResults(results)` | 8606 |  |
| `performContentSearch(query)` | 8636 |  |
| `renderContentSearchResults(data)` | 8659 |  |
| `selectSearchResult(emailId)` | 8707 |  |
| `clearSearch()` | 8713 |  |
| `setScheduleDuration(minutes)` | 8756 | Put `minutes` in the duration select. |
| `syncScheduleAllDay()` | 8772 | All-day means no start time and no duration, so both fields go away. |
| `openScheduleModal(ticketId, ticketRef, sched)` | 8791 | Open Schedule work. |
| `closeScheduleModal()` | 8842 |  |
| `applyScheduleLocally(ticketId, start, end, allDay)` | 8855 | Reflect a saved schedule in whatever the page is already holding. |
| `saveSchedule()` | 8866 |  |
| `clearSchedule()` | 8909 |  |
| `openTicketAiChat()` | 8944 |  |
| `closeTicketAiChat()` | 8968 |  |
| `askTicketAi()` | 8973 |  |
| `_sendTicketAiMessage(question, isAutoContext)` | 8981 |  |
| `formatTicketAiResponse(text, articlesList)` | 9048 |  |
| `toggleTicketPopout()` | 9124 |  |
| `selectEmailFullScreen(emailId)` | 9134 |  |
| `loadTimeEntries(ticketId)` | 9145 |  |
| `formatMinutes(mins)` | 9172 |  |
| `renderTimeEntries(totalMinutes)` | 9180 |  |
| `saveTimeEntry()` | 9231 |  |
| `deleteTimeEntry(id)` | 9263 |  |
| `syncPopoutToTicketState(hasTicket)` | 9289 |  |
| `openTicketContextMenu(event, ticketId, ticketRef)` | 9314 |  |
| `populateContextStatusSubmenu()` | 9412 |  |
| `populateContextPrioritySubmenu()` | 9437 |  |
| `setPriorityFromContext(priorityId)` | 9467 |  |
| `populateContextDepartmentSubmenu()` | 9517 |  |
| `setDepartmentFromContext(departmentId)` | 9544 |  |
| `populateContextCompanySubmenu()` | 9589 |  |
| `moveToCompanyFromContext(tenantId)` | 9612 |  |
| `populateContextTypeSubmenu()` | 9642 |  |
| `setTypeFromContext(typeId)` | 9668 |  |
| `populateContextAssigneeSubmenu()` | 9713 |  |
| `populateContextTeamSubmenu()` | 9750 | The Assign-to-team submenu (#1566). |
| `setTeamFromContext(teamId)` | 9791 | Hand a ticket (or the whole selection) to a team. Empty string takes it out of every queue. |
| `setAssigneeFromContext(analystId)` | 9838 |  |
| `setStatusFromContext(statusName)` | 9884 |  |
| `closeTicketContextMenu()` | 9924 |  |
| `ticketMenuIsSheet()` | 9948 |  |
| `openTicketMenuSheet(menu)` | 9952 |  |
| `openTicketMenuLevel(menu, label, sub)` | 9989 |  |
| `wireTicketLongPress()` | 10011 |  |
| `cancel()` | 10016 |  |
| `contextMoveToTrash()` | 10052 |  |
| `availableSnoozePresets()` | 10102 |  |
| `snoozeWakeHour()` | 10106 |  |
| `atHourLocal(hour, addDays)` | 10113 |  |
| `nextMondayLocal(hour)` | 10121 |  |
| `formatWakeTime(value)` | 10133 |  |
| `inboxRowStyle(field)` | 10172 |  |
| `inboxAnyStyleIs(placement)` | 10179 | Is any field currently asking for this placement? Lets us skip empty containers. |
| `inboxInitials(name)` | 10188 | "Ed Mozley" → "EM". Falls back to the first two characters of a single word, so a mononym or a service account still renders something rather than a blank chip that looks like a bug. |
| `inboxSafeColour(value)` | 10196 | A safe CSS colour, or null. Anything unrecognised is dropped rather than emitted. |
| `inboxRowStripes(email)` | 10202 | The left-edge stripes. Both priority and status may ask for one; they stack. |
| `inboxRowBlocks(email)` | 10221 | The top-right blocks. Same stacking rule as stripes. |
| `inboxRowChips(email)` | 10240 | Pills and dots for the footer row, plus the agent chip. |
| `snoozeRowPill(snoozedUntil, reason)` | 10279 |  |
| `populateContextSnoozeSubmenu()` | 10293 |  |
| `ctxTargetIsSnoozed()` | 10311 |  |
| `ctxSnoozeTargets()` | 10319 |  |
| `snoozeFromContext(preset, untilLocal, reason)` | 10323 |  |
| `wakeFromContext()` | 10358 |  |
| `wakeTickets(ids)` | 10365 |  |
| `openSnoozeModal()` | 10397 |  |
| `closeSnoozeModal()` | 10419 |  |
| `saveCustomSnooze()` | 10424 |  |
| `buildSnoozeBanner(email)` | 10444 |  |
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
| `openContextSchedule()` | 10928 |  |
| `openContextRecordTime()` | 10938 |  |
| `closeContextTimeModal()` | 10954 |  |
| `saveContextTimeEntry()` | 10958 |  |
| `loadSlaState(ticketId)` | 11007 |  |
| `renderSlaPanel(sla)` | 11021 |  |
| `ticketIsClosed(email)` | 11095 | Is this ticket in a status the admin has marked as closed? |
| `buildWriteUpButton(email)` | 11101 |  |
| `openWriteUpModal()` | 11113 |  |
| `closeWriteUpModal()` | 11145 |  |
| `wuRetryWithAnswers()` | 11150 |  |
| `wuStream(payload)` | 11170 | Stream the write-up. The server sends the verdict as its own event before any prose, so nothing is rendered until we know whether this is an article or a refusal — otherwise the words "VERDICT: ARTICLE" land in the analyst's draft. |
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
| `openReadForMe()` | 11685 |  |
| `runReadForMe()` | 11709 |  |
| `aiReadRender(b, versionCount)` | 11745 |  |
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

