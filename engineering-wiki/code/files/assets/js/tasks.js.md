# assets/js/tasks.js

> JavaScript - 3451 lines

FreeITSM Tasks Module — Board, List, Detail Panel, Drag & Drop

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadCardSettings()` | 113 |  |
| `timeAllowedFor(task)` | 134 | Where the time features are offered: 'both', 'tasks', 'subtasks' or 'off' (Settings → Time). A top-level task and a subtask are the same record told apart by parent_task_id, so this is the only thing that distinguishes them. |
| `formatMinutes(mins)` | 142 | Minutes as people say them: 90 -> "1h 30m". Matches the ticket time panel. |
| `loadDropdowns()` | 152 |  |
| `loadTasks()` | 173 |  |
| `setFilter(filter)` | 193 |  |
| `setTeamFilter(teamId)` | 211 |  |
| `setAnalystFilter(analystId)` | 220 |  |
| `buildSearchText(t)` | 233 | Lowercased haystack of a task's title + plain-text description, pre-computed once per load so as-you-type filtering stays cheap |
| `taskMatchesSearch(t)` | 245 |  |
| `setSearch(value)` | 252 | Filters the board/list as you type — no server round-trip |
| `clearSearch()` | 260 |  |
| `taskMatchesTag(t)` | 267 |  |
| `setTagFilter(tagId)` | 272 |  |
| `taskMatchesProject(t)` | 280 |  |
| `setProjectFilter(v)` | 286 |  |
| `refreshProjectFilter()` | 298 | The Project filter lists the projects the loaded tasks belong to - nothing to fetch, and never a project with no tasks here to show. Hidden when no task on the board belongs to a project, so an install that does not use Projects sees no change at all. |
| `taskMatchesContractor(t)` | 317 |  |
| `setContractorFilter(v)` | 324 |  |
| `refreshContractorFilter()` | 330 |  |
| `applyTagSettings()` | 348 | Populate the sidebar tag filter and show/hide it per the surface setting |
| `saveTaskPreference(key, value)` | 372 | Remember a board preference for this analyst (GH #131). |
| `switchView(view)` | 381 |  |
| `buildBoardColumns()` | 404 | Build one board column per status — run once after statuses load |
| `startColumnDrag(e, column)` | 436 |  |
| `onMove(e2)` | 443 |  |
| `onUp()` | 463 |  |
| `persistColumnOrder()` | 477 |  |
| `switchBoardGroup(group)` | 508 |  |
| `renderBoardByAnalyst()` | 517 |  |
| `statusRank(name)` | 545 | Within a column, in status order (the board's own column order), then the board position each task already has. |
| `dropOnAnalystColumn(taskId, targetColumn)` | 575 | Drop a card on another analyst's column: reassign it. Returns true if handled. |
| `renderBoard()` | 589 |  |
| `renderCard(t)` | 611 |  |
| `boardSubtasksHtml(t)` | 713 | The subtasks listed, indented, under their card. Rides on the same Settings -> Card "subtasks" switch as the 2/5 bar: somebody who turned subtasks off the card does not want them back as a list. The personal preference in System -> Preferences tidies the list away once every one is complete. |
| `formatShortDate(dateStr)` | 729 | Short date for the start badge, e.g. "12 Jun" |
| `descExcerpt(html)` | 736 | Plain-text excerpt of a (HTML) description, capped at 250 characters. DOMParser keeps it inert — no scripts run and no resources load. |
| `formatDueBadge(dateStr)` | 744 |  |
| `showQuickAdd(col)` | 760 |  |
| `handleQuickAdd(event, status, col)` | 775 |  |
| `startDrag(e, card)` | 812 |  |
| `onMove(e2)` | 819 |  |
| `onUp(e2)` | 829 |  |
| `initDrag(card, e)` | 840 |  |
| `moveDrag(e)` | 862 |  |
| `endDrag(e)` | 900 |  |
| `endDrag(e)` | 985 | Fix: simplified endDrag reorder call |
| `renderList()` | 1071 |  |
| `sortList(field)` | 1120 |  |
| `statusColour(name)` | 1129 | Configured colour for a status name (falls back to a neutral grey) |
| `lookupOptions(list, current)` | 1136 | <option> markup for a status/priority dropdown — always keeps the task's current value, even if it is no longer in the active list |
| `taskViewIsModal()` | 1148 | Does this analyst open tasks in the large window? Set per analyst in System → Preferences and published by tasks/index.php, so the choice is known before anything opens rather than fetched on the way. |
| `applyModalLayout(body)` | 1158 | The same content, laid out in two columns: the things that want width on the left, the properties down the right. Called only in the large-window view. |
| `modalLayoutIsTabs()` | 1202 |  |
| `applyModalTabs(body)` | 1224 |  |
| `setModalTabCount(btn, n)` | 1295 |  |
| `showModalTab(key)` | 1306 |  |
| `toggleModalLayout()` | 1318 | Columns ⇄ tabs, remembered per analyst. Mirrors `toggleTaskView()`. |
| `paintViewToggle()` | 1343 | The header button that swaps between the side panel and the large window. Drawn per state: an expand icon while you are in the drawer, a shrink icon while you are in the window, so the icon shows what pressing it will DO. |
| `paintLayoutToggle()` | 1363 | The columns/tabs button, which only exists in the large window. |
| `toggleTaskView()` | 1385 | Swap the view, remember it, and redraw the task that is already open. |
| `openDetailPanel(taskId)` | 1409 |  |
| `closeDetailPanel()` | 1450 |  |
| `renderDetailPanel(task)` | 1458 |  |
| `loadInvolved(taskId)` | 1771 | Fetch and draw the Involved section for the open task. |
| `renderInvolved()` | 1792 |  |
| `postInvolved(action, analystId)` | 1832 |  |
| `addInvolved(analystId)` | 1854 |  |
| `removeInvolved(analystId)` | 1855 |  |
| `setInvolvedDone(analystId, done)` | 1856 |  |
| `postTaskChange(payload, failedKey)` | 1873 | Post a change and SAY SO IF IT DID NOT HAPPEN. Returns true on success. |
| `loadMoveCompanies()` | 1906 |  |
| `moveToCompanyFromPanel(sel)` | 1930 | Move the open task to the company just chosen in the panel. |
| `saveField(field, value)` | 1958 |  |
| `loadTaskChecklists(taskId)` | 1982 |  |
| `renderTaskChecklists()` | 1993 |  |
| `T(k, p)` | 1997 |  |
| `chkDragStart(e)` | 2062 |  |
| `chkDragOver(e)` | 2072 |  |
| `chkDragEnd(e)` | 2086 |  |
| `postTaskChecklist(payload)` | 2102 |  |
| `attachTaskChecklist()` | 2123 |  |
| `toggleTaskChecklistItem(itemId, box)` | 2129 |  |
| `removeTaskChecklist(checklistId)` | 2143 |  |
| `confirmChecklistCompletion(taskId, newStatusName, currentStatusName)` | 2164 | Before completing a task from ANY route in this page (the status box, a drag into a closed column, a subtask tick): ask the server what completing it now would run into. A Critical checklist with steps outstanding is refused here with the list; a Standard one asks first. The server enforces the Critical case regardless - this exists so nobody meets a bare refusal, and so a Standard override is a decision rather than an accident. |
| `isClosed(name)` | 2165 |  |
| `confirmChecklistCompletionById(taskId)` | 2170 |  |
| `fmt(groups)` | 2177 |  |
| `confirmCloseWithInvolved(newStatusName)` | 2200 | Closing a task while people on it have not ticked their part off. |
| `workValue(stored, allDay)` | 2219 | ── Scheduled work (GH #112) ─────────────────────────────────────── |
| `workPayload(value)` | 2227 | An all-day slot is a whole day, so a date-only box sends midnight to midnight rather than a time nobody chose. |
| `saveWorkStart(value)` | 2232 |  |
| `saveWorkEnd(value)` | 2240 |  |
| `openTaskAndFocusTime(taskId)` | 2254 | "Log time" from the right-click menu. Opens the task and puts the cursor in the minutes box rather than inventing a second little dialog for it — one place where time is recorded, and you land looking at what is already there. |
| `deleteTaskById(taskId, task)` | 2265 | Delete from the right-click menu, which may be a card that is not the one open in the panel — so it takes the id rather than using selectedTaskId. |
| `loadTaskTime(taskId)` | 2294 |  |
| `renderTaskTime(taskId, d)` | 2305 |  |
| `addTaskTime(taskId)` | 2368 |  |
| `deleteTaskTime(entryId)` | 2392 |  |
| `tagChipHtml(tag, removable)` | 2419 | One tag chip; pass removable=true for the editable chips in the panel |
| `renderTagSection()` | 2429 |  |
| `closeTagPicker()` | 2443 |  |
| `filterTagPicker()` | 2448 |  |
| `tagPickerKey(e)` | 2472 | Enter picks the first option (an existing match, or the create row) |
| `addDetailTag(tagId)` | 2479 |  |
| `removeDetailTag(tagId)` | 2490 |  |
| `createAndAddTag()` | 2496 |  |
| `saveDetailTags()` | 2523 |  |
| `toggleSubtask(id, completing)` | 2529 |  |
| `renderRecurrenceSection(task)` | 2575 |  |
| `describeRecurrence(r)` | 2614 | One sentence describing a rule, built from the same parts the editor sets. |
| `T(k, p)` | 2617 |  |
| `toggleRecurrenceEditor()` | 2654 |  |
| `renderRecurrenceEditor(r)` | 2666 | The editor. Only the rows that apply to the chosen frequency are shown. |
| `T(k)` | 2667 |  |
| `sel(a, b)` | 2675 |  |
| `chk(x)` | 2676 |  |
| `wdName(i)` | 2678 |  |
| `recurEditorRefresh()` | 2765 | Show only the rows the chosen frequency and ending actually use. |
| `show(sel, on)` | 2771 |  |
| `recurrenceFormPayload()` | 2789 | The editor's current settings, as the API wants them. |
| `val(id)` | 2790 |  |
| `on(id)` | 2791 |  |
| `previewRecurrence()` | 2817 | Show the dates the current settings would produce, before committing to them (Ed's idea). "Every second Tuesday of the month, 5 times" is not something most people can turn into dates in their head, and without this the only way to find out what a repeat does is to save it and wait. |
| `showRecurrencePreview(d)` | 2829 |  |
| `T(k, p)` | 2830 |  |
| `recurPreviewEsc(e)` | 2884 |  |
| `closeRecurrencePreview()` | 2886 |  |
| `saveRecurrence()` | 2892 |  |
| `stopRecurrence()` | 2906 |  |
| `subtaskRowHtml(s)` | 2949 | One subtask row in the task window: drag handle, tick box, priority, title, who has it, then Start and Due as columns that line up down the list. |
| `dateInput(field, value, label)` | 2955 |  |
| `subtaskHeadHtml()` | 2982 | The column headings over the two date columns. Same grid as a row, so the headings sit exactly over their dates. |
| `setSubtaskDate(subtaskId, field, input)` | 2990 |  |
| `subtaskDragStart(e)` | 3003 |  |
| `subtaskDragOver(e)` | 3012 |  |
| `subtaskDragEnd(e)` | 3025 |  |
| `appendSubtaskRow(sub)` | 3062 | Put one newly-created subtask into the list already on screen, without a refetch (which is the thing `addSubtask()` exists to avoid). |
| `addSubtask()` | 3091 | Add a subtask to the task the panel is showing. |
| `addComment()` | 3149 |  |
| `searchLink(query, type)` | 3181 |  |
| `linkItem(field, id)` | 3214 | Link a ticket or a change to the open task. |
| `removeLink(field)` | 3242 |  |
| `deleteCurrentTask()` | 3249 |  |
| `loadProjectChoices()` | 3282 | The live projects the task window can file a task under. Only fetched for analysts who can open Projects (TASK_CAN_PROJECTS) - the endpoint refuses everyone else, and they see the project as plain text instead. |
| `projectFieldHtml(task)` | 3295 | Top-level tasks only: a subtask belongs wherever its parent does. Offers the live projects (plus the task's own, if that one has since finished), and links to the project's page. The server refuses a project from another company. |
| `loadContractorChoices()` | 3318 |  |
| `contractorFieldHtml(task)` | 3331 | A supplier doing the work, and optionally the person there. Choosing one needs Contracts (where suppliers live); without it the field only names the contractor. The assignee above stays the person here who chases it. |
| `setTaskContractor(taskId, supplierId, contactId)` | 3352 |  |
| `setTaskProject(taskId, sel)` | 3368 |  |
| `loadLookups()` | 3386 |  |
| `escAttr(value)` | 3400 | Escape a value for safe use inside an HTML attribute |
| `taskPreviewBadge(type, id)` | 3424 | The ⓘ preview badge (#91). Guarded, so a page that somehow loaded without record-preview.js loses the preview rather than the whole detail pane. |
| `linkedRecord(url, label)` | 3428 |  |
| `esc(text)` | 3434 |  |
| `formatDateTime(dt)` | 3441 |  |

## API endpoints it calls

- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)
- [api/system/get_tenants.php](/code/files/api/system/get_tenants.php.md)
- [api/projects/list.php](/code/files/api/projects/list.php.md)
- [api/projects/task_assign.php](/code/files/api/projects/task_assign.php.md)

## Loaded by

- [tasks/index.php](/code/files/tasks/index.php.md)

