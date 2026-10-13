# assets/js/knowledge.js

> JavaScript - 3622 lines

Knowledge Base JavaScript

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadCompanies()` | 75 | Companies this analyst can file an article against. Same source and hide-unless-more-than-one idiom as the tickets/changes "Move to company" pickers — on a single-company install the control never appears. |
| `audienceFromControls()` | 111 | The editor shows the three stored audiences as TWO choices plus an opt-in tickbox. This pair converts between the two shapes; nothing else in the product knows the difference, because the stored value is unchanged. |
| `audienceToControls(stored)` | 123 |  |
| `updateAudienceHint()` | 133 | Spell out what the chosen audience actually means, in the editor. |
| `resetVisibilityFields()` | 156 | Put the two visibility controls back to the safe default (a new article). |
| `visibilityPayload()` | 168 | The visibility half of a save payload. |
| `loadAnalysts()` | 184 | Load analysts for owner dropdown |
| `initTinyMCE()` | 208 | Initialize TinyMCE editor |
| `setup(editor)` | 257 |  |
| `kbEditorFullScreen()` | 277 | Just the editor, filling the screen - TinyMCE's own fullscreen plugin. |
| `kbEditorIsFullScreen()` | 283 |  |
| `initTagInput()` | 296 | Initialize tag input functionality |
| `loadBrowseModePreference()` | 376 |  |
| `loadLayoutPreference()` | 387 |  |
| `applyLayout(save)` | 407 |  |
| `setLayout(mode)` | 421 |  |
| `kbSortDetails(col)` | 449 |  |
| `renderDetailsLayout()` | 456 |  |
| `val(a, col)` | 463 |  |
| `arrow(c)` | 474 |  |
| `renderTreeLayout()` | 524 | The whole shape at once: every folder, expanded, with its articles inside. |
| `byName(a, b)` | 532 | ⚠️ ALPHABETICAL, and by NAME rather than by whatever order the list happened to arrive in. The articles come back newest-first, which is right for a list you are scanning for recent work and wrong for a tree, where you are looking for a particular thing by its name. |
| `article(a, depth)` | 543 |  |
| `walk(parent, depth)` | 554 |  |
| `applyBrowseMode()` | 584 |  |
| `loadSidebarModePreference()` | 592 |  |
| `applySidebarMode(mode)` | 602 |  |
| `kbConfirm(opts)` | 629 | The app's shared confirmation dialog, with a safety net. |
| `kbPrompt(title, value)` | 636 |  |
| `kbPromptAccept()` | 660 |  |
| `kbPromptCancel()` | 668 | Cancel resolves with null — the same thing `prompt()` returns, so callers that check for null keep working unchanged. |
| `kbPromptClose()` | 673 |  |
| `loadFolders()` | 687 |  |
| `folderChildren(parent)` | 718 | Children of `parent`, in the order the server sent them (by name). |
| `renderFolderTree(rootCount)` | 722 |  |
| `walk(parent, depth)` | 735 |  |
| `renderFolderPicker()` | 765 | Fill the editor's folder picker, indented so the shape is readable. |
| `walk(parent, depth)` | 775 |  |
| `goUpOneLevel()` | 796 | Up one level. |
| `selectFolder(value)` | 803 |  |
| `createFolderPrompt()` | 814 |  |
| `renameFolderPrompt(id, current)` | 823 |  |
| `deleteFolderPrompt(id, name)` | 829 |  |
| `folderAction(payload, okKey)` | 839 |  |
| `kbDragStart(e, type, id)` | 881 |  |
| `kbDragEnd()` | 894 |  |
| `kbDragOver(e)` | 904 |  |
| `kbDragLeave(e)` | 915 |  |
| `kbDrop(e, folderId)` | 919 |  |
| `kbContextMenu(e, type, id, name)` | 950 | The right-click menu. |
| `closeContextMenu()` | 1021 |  |
| `renameArticlePrompt(id, current)` | 1035 | Rename an article without opening the editor. |
| `createFolderIn(parentId)` | 1054 | "New folder" from a folder's own menu means a subfolder of THAT folder. |
| `kbTreeIsVisible()` | 1083 | Is the folder tree actually on screen? |
| `folderPath(id)` | 1089 | The chain from the root down to the folder being viewed. |
| `renderBreadcrumb()` | 1101 |  |
| `renderFolderRows()` | 1129 | Subfolders of wherever we are, as rows above the articles. |
| `renderCardTags(article)` | 1189 |  |
| `pill(t)` | 1191 |  |
| `kbShowAllTags(el)` | 1225 | Show every tag on the article in a small dialog. |
| `closeTagsModal()` | 1243 |  |
| `kbFolderLabel(article)` | 1267 | Which folder an article is in, shown on the card at "All articles". |
| `kbRowIsShortcut(articleId)` | 1281 |  |
| `openExceptionsModal()` | 1295 | Everything with its OWN permissions rather than its parent's. |
| `closeExceptionsModal()` | 1322 |  |
| `openArticlePermModal()` | 1327 | The article being read. Its own rules, not its folder's. |
| `openPermModal(type, id, name)` | 1332 |  |
| `closePermModal()` | 1343 |  |
| `permLoad()` | 1352 |  |
| `renderInherited(d)` | 1389 | What this inherits, shown READ-ONLY. |
| `renderPermList()` | 1421 |  |
| `permSetMode(askIfWiping)` | 1449 | Save the two tickboxes. |
| `permRemove(entryId, name)` | 1487 | Take somebody off the list. |
| `permAdd(type, id)` | 1506 |  |
| `permPost(payload)` | 1514 |  |
| `permSearch()` | 1534 |  |
| `loadTags()` | 1553 |  |
| `loadArticles(search = '', tagIds = [])` | 1568 | Load articles |
| `renderTagFilters()` | 1634 | Render tag filters in sidebar |
| `toggleTagFilter(tagId)` | 1652 | Toggle tag filter |
| `kbVisibleArticleIds()` | 1708 | The article ids in the order they are ON SCREEN. |
| `kbRowEl(id)` | 1714 |  |
| `kbRenderSelection()` | 1719 | Repaint ticks, row highlighting and the bar from the Set. |
| `kbSetSelection(ids, { anchor = null, focus = null } = {})` | 1731 |  |
| `kbSelectRangeTo(id, { add = false } = {})` | 1740 | Everything between the anchor and `id`, as displayed. |
| `kbToggleOne(id)` | 1752 |  |
| `kbCheckboxClick(e, id)` | 1763 | A click on the tick itself. Returns nothing — the tick is the mechanism, so this never opens anything. |
| `kbRowSelectClick(e, id)` | 1777 | A click on the row itself. Returns true if it was handled as a SELECTION, in which case the caller must not open the article. |
| `kbRowClick(e, id)` | 1785 | Every article row's onclick. |
| `clearArticleSelection()` | 1790 |  |
| `selectAllVisibleArticles()` | 1797 |  |
| `kbMoveFocus(delta, { extend = false, keepSelection = false } = {})` | 1805 |  |
| `kbSelectionKeydown(e)` | 1832 | ⚠️ A DOCUMENT-LEVEL KEY HANDLER IN A MODULE THAT CONTAINS A RICH TEXT EDITOR has to be paranoid about when it is allowed to act. Swallowing Space or Ctrl+A while somebody is writing an article would be a far worse bug than the one this fixes, so the guards come first and refuse by default. |
| `kbSelectBox(id)` | 1861 | The tick, rendered the same way in every view that has rows. |
| `renderBulkBar()` | 1868 |  |
| `kbRenderBulkFolders()` | 1885 | "Move them to…" — the folder list, rebuilt whenever the bar appears because folders can be created while a selection is held. |
| `walk(parent, depth)` | 1891 |  |
| `applyBulkMove()` | 1912 | Move everything selected into one folder. |
| `applyBulkAudience()` | 1946 |  |
| `renderArticleList()` | 1989 | Render article list |
| `debounceSearch()` | 2091 | Debounced search |
| `viewArticle(articleId)` | 2099 | View article detail |
| `renderArticleDetail()` | 2121 | Render article detail |
| `openCreateArticle()` | 2204 | Open create article view |
| `editCurrentArticle()` | 2231 | Edit current article |
| `toggleEditorPopout()` | 2283 | Per-analyst editor popout state — same localStorage pattern the tickets inbox uses for its full-screen toggle. The CSS does all the layout; this just flips a class on .knowledge-container. |
| `applyEditorPopoutFromPref()` | 2290 |  |
| `saveAsNewVersion()` | 2299 | Save as new version |
| `saveArticle()` | 2354 | Save article |
| `deleteCurrentArticle()` | 2401 | Delete current article |
| `toggleRecycleBin()` | 2430 | Recycle Bin functions |
| `loadRecycleBin()` | 2451 |  |
| `restoreArticle(id)` | 2506 |  |
| `hardDeleteArticle(id, title)` | 2528 |  |
| `viewArchivedArticle(id)` | 2552 |  |
| `closeArchivedArticleModal()` | 2578 |  |
| `cancelEdit()` | 2584 | Cancel edit |
| `syncArticleUrl(view)` | 2621 | Keep the address bar on the article you are actually looking at. |
| `showView(view)` | 2658 | Show/hide views |
| `addTag(tagName)` | 2688 | Tag input functions |
| `removeTag(tagName)` | 2696 |  |
| `renderSelectedTags()` | 2701 |  |
| `showTagSuggestions(query)` | 2711 |  |
| `hideSuggestions()` | 2742 |  |
| `jsAttr(value)` | 2760 | A JS string literal that is safe INSIDE a double-quoted HTML attribute. |
| `escapeHtml(text)` | 2782 |  |
| `toggleShareDropdown()` | 2790 | Share dropdown functions |
| `closeShareDropdownOnClickOutside(e)` | 2802 |  |
| `closeShareDropdown()` | 2810 |  |
| `shareArticleLink()` | 2816 | Share article link - copy to clipboard |
| `buildArticlePdf()` | 2841 | Build a searchable jsPDF document from the current article |
| `ensureSpace(needed)` | 2895 |  |
| `printLines(lines, x, lineH)` | 2900 | Print wrapped lines one-by-one, adding pages as needed |
| `renderNode(node)` | 2908 |  |
| `shareArticlePdf()` | 3026 | Export article as PDF |
| `shareArticleBoth()` | 3035 | Open email share modal with both link and PDF options |
| `closeShareEmailModal()` | 3050 |  |
| `sendShareEmail()` | 3055 | Send share email |
| `blobToBase64(blob)` | 3118 | Convert blob to base64 |
| `formatDate(dateStr)` | 3189 | Server-stamped UTC timestamps (created/modified/archived). Parse as UTC and render in the analyst's chosen zone so the calendar day is correct locally. |
| `openAiChat()` | 3197 |  |
| `closeAiChat()` | 3203 |  |
| `askAi()` | 3208 |  |
| `formatAiResponse(text, articlesList)` | 3280 |  |
| `kbFolderOptions(selectedId)` | 3379 |  |
| `walk(parent, depth)` | 3381 |  |
| `kbMoveCurrentArticle()` | 3395 |  |
| `kbCloseMoveModal()` | 3406 |  |
| `kbConfirmMoveArticle()` | 3411 |  |
| `mountEditorDocuments()` | 3435 | The documents panel inside the EDITOR — where attaching actually happens. |
| `openAuditModal(type, id, name)` | 3486 |  |
| `closeAuditModal()` | 3499 |  |
| `openArticleAuditModal()` | 3506 | The current article's history, from the article itself. |
| `auditLoad()` | 3511 |  |
| `renderAuditEntry(e)` | 3540 | One line of history. |
| `renderAuditDetail(e)` | 3572 | The detail blob, in words where we understand it. |
| `principalLabel(raw)` | 3603 | "team:21" -> "Team 21" is useless; resolve what we can from what is loaded. |
| `formatDateTime(dateStr)` | 3618 | A stored timestamp as a date AND a time in the reader's zone. |

## API endpoints it calls

- [api/system/get_tenants.php](/code/files/api/system/get_tenants.php.md)
- [api/system/get_user_preference.php](/code/files/api/system/get_user_preference.php.md)
- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)
- [api/knowledge/knowledge_bulk_audience.php](/code/files/api/knowledge/knowledge_bulk_audience.php.md)

## Loaded by

- [knowledge/index.php](/code/files/knowledge/index.php.md)

