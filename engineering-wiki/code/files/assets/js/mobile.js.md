# assets/js/mobile.js

> JavaScript - 5842 lines

============================================================================ mobile.js — Mobile-only inbox master-detail behaviour (Outlook-style pane stack). Paired with mobile.css (LAYER 2).

HARD RULE mirror of the CSS: every behaviour here is gated on
   matchMedia('(max-width: 768px)'), so on desktop it is inert — no pane
   switching, and the injected sub-bar is display:none. Desktop is untouched.

   Loaded AFTER inbox.js so it can wrap the global selectEmail / selectFolder
   handlers that the list rows and folder items already call.
   ==========================================================================

## Functions

| Function | Line | What it does |
|---|--:|---|
| `injectViewsHamburger()` | 25 | The views hamburger (top-right) -> right-side slide-in drawer. |
| `moveTenantIntoWaffle()` | 46 | Company switcher into the waffle drawer — also shared, also a no-op at N=1. |
| `syncMorningChecksControls()` | 85 | MORNING CHECKS (#1270) — the date picker, Today and Save to PDF move into the views drawer on a phone. |
| `syncShell()` | 102 |  |
| `initAssetsMobile()` | 196 |  |
| `setPane(p)` | 197 |  |
| `currentPane()` | 198 |  |
| `pushPane(p)` | 199 |  |
| `selectAsset(assetId)` | 229 |  |
| `show()` | 235 |  |
| `syncAssetsBar()` | 245 |  |
| `initCalendarMobile()` | 280 | ================================================================== CALENDAR (#998) |
| `tr(key, fallback)` | 286 | Prefer the module's own translations; fall back only if a key is missing (i18n's lookup echoes the key back when it can't resolve). |
| `buildSheet(cls, title)` | 308 |  |
| `openSheet(el)` | 328 | Opening a sheet pushes a history entry so the DEVICE BACK BUTTON closes it, the same move that makes the ticket pane stack feel native rather than like a resized website. |
| `hideSheets()` | 332 |  |
| `closeSheet()` | 336 |  |
| `sidebarIntoSheet()` | 349 | Relocated rather than rebuilt so `#categoryFilterList` keeps its id and `renderCategoryFilters()` still finds it, and so the subscribe block keeps its own wiring. Moved lazily on first open and moved BACK when the viewport leaves mobile, so resizing a desktop browser through the breakpoint can't strand the sidebar inside a hidden sheet (16a hides it in the container). |
| `sidebarBackToPage()` | 357 |  |
| `localDateLabel(dateStr)` | 374 |  |
| `renderAgenda()` | 389 |  |
| `openDaySheet(dateStr)` | 460 |  |
| `openEventModal(eventId, dateStr, hour)` | 469 |  |
| `scrollToWorkingHours()` | 490 | Week and day views are 24 rows of 60px and open at the top, so a phone lands on 12 AM — three screens above anything that happens in a working day. On a desktop pane you at least see through to ~10 AM; at 360px you see 12 AM to 6 AM and nothing else. Scroll to 7 AM after a render. Mobile only: the desktop start position is untouched. |
| `renderCalendar()` | 501 |  |
| `after()` | 503 |  |
| `syncCalendarBar()` | 512 |  |
| `initChangesMobile()` | 536 | ================================================================== SERVICE STATUS (#1004) |
| `tr(key, fallback)` | 540 | Local, like every other module branch has: the sibling `tr`s are nested inside THEIR functions and are not in scope here. A missing one is a runtime ReferenceError that no parse check would catch. |
| `setPane(name)` | 546 |  |
| `showView(view)` | 556 |  |
| `wireRichTextCards()` | 590 | ================================================================= Rich text on a phone: CARDS, and ONE editor at a time (#1189) ================================================================= #1187 put the whole tabbed widget full screen. That fixed the typing but left six TinyMCE instances living in the form, and Ed came back with "the tinymce editor is still causing a bit of havoc with the screen layout" — which it was: six iframes, each with its own toolbar, sizing themselves independently inside a 312px column. |
| `panels()` | 603 |  |
| `tabFor(key)` | 606 |  |
| `areaFor(key)` | 609 |  |
| `liveEditor(id)` | 613 |  |
| `excerpt(html)` | 622 | The card shows an EXCERPT, never the stored markup. Assigning it through textContent means no author-written HTML is ever parsed into this page, so the card needs no sanitiser — see the safe-html rule. `innerHTML` on a detached div is only used to let the browser do entity decoding and tag stripping for us. |
| `renderCards()` | 654 |  |
| `currentValue(key)` | 696 |  |
| `openField(key)` | 703 |  |
| `setup(editor)` | 730 |  |
| `closeField()` | 740 |  |
| `initEditors(callback)` | 767 |  |
| `destroyEditors()` | 784 |  |
| `setEditorContent(id, content)` | 791 |  |
| `getEditorContent(id)` | 799 |  |
| `refreshFormLayout()` | 812 |  |
| `sync()` | 824 |  |
| `initProblemsMobile()` | 834 |  |
| `setPane(name)` | 835 |  |
| `pmOpenDetail()` | 844 |  |
| `pmBackToList()` | 859 |  |
| `sync()` | 867 | Rotating to a desktop width must not leave the sidebar hidden. |
| `initStatusMobile()` | 872 |  |
| `tr(key, fallback)` | 876 |  |
| `setTab(name)` | 902 |  |
| `syncStatusBar()` | 930 |  |
| `initKnowledgeMobile()` | 965 | ================================================================== KNOWLEDGE (#1000) |
| `tr(key, fallback)` | 969 |  |
| `openSheet()` | 998 |  |
| `hideSheet()` | 1002 |  |
| `closeSheet()` | 1003 |  |
| `sidebarIntoPlace()` | 1013 | The search box is MOVED, not copied — `#articleSearch` keeps its id and its inline `onkeyup="debounceSearch()"`, so the module's own search keeps working with no rewiring. Its now-empty section in the sidebar is marked rather than found by position. |
| `sidebarBackToPage()` | 1024 |  |
| `syncBackLabel()` | 1052 |  |
| `wireMetaToggle()` | 1063 | ---- the collapsible meta block (Gmail-style) ---- The whole meta row is the control: a bigger target than a chevron, and its accessible name is the visible "Modified: …" text, so the toggle needs no label string in 24 languages. The reading pane is rebuilt on every article open, so this re-runs after each render and is idempotent. |
| `toggle()` | 1072 |  |
| `renderArticleDetail()` | 1084 |  |
| `wireFullScreenEditor()` | 1100 | ---- full-screen text editing ---- An "expand" control above the editor, and a Close bar inside it. Both labels reuse existing translated keys, so no new strings: `knowledge.editor.popout_title` already reads "Toggle full-screen view" in all 24 locales (it labels the desktop pop-out button, which is hidden on mobile), and the sheets' Close does the rest. Built after the editor exists, and idempotently — the editor view is not re-rendered, but syncKnowledgeBar can run again on resize. |
| `setFull(on)` | 1134 |  |
| `readView()` | 1161 |  |
| `setKbView(v)` | 1171 | Named setKbView, not setView: the inbox branch has a top-level setView-alike (`setPane`) and a plain `setView` here would read as the calendar module's view toggle. |
| `showView(view)` | 1176 |  |
| `stripEditorPopout()` | 1193 | ⚠️ The #762 trap, second sighting. `applyEditorPopoutFromPref()` reads localStorage on every edit and re-applies `.editor-popout`, which gives the form a FIXED 340px property panel — the whole screen at 360px, leaving the editor itself nothing. Neutralise at the source (the CSS in 17d is only the backstop), and leave the stored preference alone so the desktop behaviour is unchanged. |
| `syncKnowledgeBar()` | 1207 |  |
| `setPane(p)` | 1232 |  |
| `currentPane()` | 1233 |  |
| `pushPane(p)` | 1237 | Navigate INTO a pane, pushing a history entry so the device Back button (and our Back chevron) pops back out of it. |
| `selectEmail()` | 1252 |  |
| `loadTicketById()` | 1274 |  |
| `selectFolder()` | 1285 |  |
| `syncPopoutToTicketState()` | 1301 |  |
| `renderAttachmentInfoBar()` | 1312 |  |
| `relocateSections()` | 1384 | Move each section's node(s) into its sheet and add its toolbar button. Runs after every ticket render (the reading pane is rebuilt each time). Time/CMDB containers may still be empty (populated async) — relocating the container node is fine, its async loader finds it again by id. |
| `syncLinksCount()` | 1415 |  |
| `afterTicketRender()` | 1427 | Run after every ticket render: relocate the section sheets, then apply the reading-pane tidy-ups (subject-only heading + reference in the sub-bar, attachment badge, single-row action bar with a "…" overflow). |
| `getCurrentEmail()` | 1434 | inbox.js keeps the open ticket in the top-level `currentEmail` binding (shared across classic scripts). Read it defensively. |
| `decorateReadingPane()` | 1438 |  |
| `syncAttachBadge()` | 1460 | Compact yellow attachment badge on the subject row, replacing the full "…has N attachments" bar (hidden on mobile). Tapping it opens the list. |
| `buildToolbarOverflow()` | 1490 | Keep the action bar to a single row: five icons + a "…" button whose panel holds the rest (with their word labels). The toolbar is rebuilt on every render, so this re-collapses each time. |
| `showAuditHistory()` | 1553 |  |
| `openAuditSheet()` | 1559 |  |
| `splitStamp(text)` | 1575 | Split "Mon, 14 Jul 2026 09:32 AM" (formatFullDateTime's shape) into the day — said once, as a sticky heading — and the time, kept per entry. If the format ever changes and the time can't be found, the whole stamp rides in the time slot and the day headings simply don't appear. |
| `span(cls, text)` | 1580 |  |
| `renderAuditFeed(entries)` | 1591 | Build the day-grouped card feed from the audit rows (newest first, as the endpoint returns them). One card per change: field + time on top, old → new beneath, who did it under that; the date is a sticky heading said once per day. |
| `syncBar()` | 1655 | Injected chrome (sub-bar + views hamburger) is mobile-only; keep it out of desktop entirely (belt-and-suspenders alongside the `@media`-only styling). |
| `columns()` | 1691 |  |
| `build()` | 1695 |  |
| `mark()` | 1710 |  |
| `renderBoard()` | 1736 |  |
| `sync()` | 1743 |  |
| `labelCardFeed(table, columns)` | 2043 |  |
| `apply()` | 2087 |  |
| `wrapLabel(btn)` | 2179 | ⚠️ These buttons carry their label as a BARE TEXT NODE beside an <svg>, so `span:not(.action-btn-icon)` — LAYER 5's way of hiding a label — has nothing to match. Wrap it once, idempotently. |
| `clearOverflow()` | 2200 |  |
| `buildOverflow()` | 2212 |  |
| `ensureIcon(btn)` | 2296 |  |
| `moveIn()` | 2308 |  |
| `moveOut()` | 2329 |  |
| `sync()` | 2342 |  |
| `apply()` | 2403 |  |
| `clear()` | 2420 | ⚠️ And take it away again when the viewport leaves mobile, so a desktop browser dragged wide is left exactly as it would have been had it never been narrow. The Calendar round set the precedent for restoring rather than one-way conversion (LAYER 16). It also means the desktop control can assert `[title]` finds nothing here, which is a stronger check than asserting a tooltip does not show. |
| `onChange()` | 2433 |  |
| `t(key, fallback)` | 2488 |  |
| `rowIsRecord(tr)` | 2540 |  |
| `filter()` | 2547 |  |
| `clearFilter()` | 2566 |  |
| `setView(v)` | 2573 | ---- view state ------------------------------------------------- |
| `syncChrome()` | 2605 | ---- and it all goes away above 768px -------------------------- Injected chrome must be hidden off-mobile, and the body attribute has to go with it or a desktop resize would leave the page in a view whose CSS no longer exists — the strip would stay hidden with no switch left to bring it back. The Calendar round set the precedent for restoring rather than converting one way (LAYER 16), and this is the case that makes it non-optional. |
| `tr(key, fallback)` | 2671 | The panel's own heading is the honest label for the button that opens it — the editor's side panel is headed "Lessons" already, in whatever language the reader is using. |
| `panelLabel()` | 2676 |  |
| `open()` | 2693 |  |
| `close()` | 2704 |  |
| `sync()` | 2737 | ⚠️ And it all goes away above 768px: the button hides and the state attribute is removed, or a desktop resize would leave the page with a panel pinned open over the content and the CSS that positions it gone. The Calendar round set the precedent for restoring rather than converting one way. |
| `syncTabName()` | 2810 | The lesson's name, kept in step with the field as it is typed and as another lesson is chosen. Truncated by CSS rather than here, so the full name is still the button's accessible label. |
| `setPage(which)` | 2828 |  |
| `claim(el)` | 2848 |  |
| `restore()` | 2853 |  |
| `gather()` | 2862 |  |
| `sync()` | 2878 | ---- and it all goes away above 768px ---- The nodes go back where they came from and the page attribute is removed, or a desktop resize would leave half the lesson hidden with no switch to bring it back. |
| `tr(key, fallback)` | 2936 |  |
| `filtersIntoSheet()` | 2973 |  |
| `filtersBackToPage()` | 2978 |  |
| `openSheet()` | 2984 |  |
| `hideSheet()` | 2989 |  |
| `closeSheet()` | 2990 |  |
| `progressVisible()` | 2999 | ---- shown only on the Progress tab, and only on a phone ---- |
| `sync()` | 3002 |  |
| `tr(key, fallback)` | 3051 |  |
| `open()` | 3072 |  |
| `close()` | 3083 |  |
| `sync()` | 3140 | ⚠️ And it all goes away above 768px, or a desktop resize leaves the page with a fixed panel over the canvas and a scrim across it. |
| `tr(key, fallback)` | 3177 |  |
| `open()` | 3199 |  |
| `close()` | 3210 |  |
| `setTimeout(function ()` | 3245 |  |
| `sync()` | 3266 | ⚠️ And it all goes away above 768px, or a desktop resize leaves the page with a scrim across it and the palette parked off-screen. |
| `sectionOf(link)` | 3318 |  |
| `readOnly()` | 3433 | Read-only versions: the module's own handlers bail on `is_current`, so a synthesised event is harmless — but a ghost that follows your finger and then does nothing is worse than no gesture at all. |
| `buzz()` | 3438 |  |
| `clearTimer()` | 3442 |  |
| `cleanup()` | 3446 |  |
| `beginPlace(tile, pt)` | 3456 |  |
| `finishPlace(pt)` | 3477 |  |
| `beginMove(node, pt)` | 3499 |  |
| `relayMouse(type, pt)` | 3513 |  |
| `point(e)` | 3523 |  |
| `syncDel()` | 3623 |  |
| `sync()` | 3631 | ⚠️ And a resize out of mobile mid-drag must not strand a ghost, a lifted node, or a drag the module still thinks is in progress. |
| `reveal()` | 3679 |  |
| `tr(key, fallback)` | 3752 |  |
| `open()` | 3791 |  |
| `hide()` | 3797 |  |
| `close()` | 3798 |  |
| `treeIntoSheet()` | 3810 | Moved LAZILY on first open and moved BACK on the way to desktop. Relocating the real node rather than cloning it is what keeps `#folderTree` unique — a clone would give the page two elements with that id and `loadFolderTree()` would render into whichever came first. |
| `treeBackToPage()` | 3814 |  |
| `sync()` | 3857 | 5. …and it all goes away above 768px, or a desktop resize leaves the folder tree inside a hidden sheet with the page's own copy of it display:none in the container. |
| `tr(key, fallback)` | 3923 | Prefer the module's own translations; fall back only if a key is missing, which can happen if a page exports fewer namespaces. |
| `colCount()` | 3930 | Columns per row, read from the class rota.js sets on the grid. |
| `day()` | 3941 |  |
| `analyst()` | 3942 |  |
| `week()` | 3943 |  |
| `buildBar()` | 3949 |  |
| `placeActions(intoFooter)` | 3979 | Move the real Copy / Paste buttons, never copies of them: rota.js finds them with getElementById and toggles Paste's display, so a clone would leave it talking to the one still in the header. |
| `syncBarPressed()` | 3989 |  |
| `reserveSpace()` | 3999 | The footer's height is not a constant - it holds two rows, and Paste appears and disappears. Measure it and let the CSS reserve exactly that much, or the last analyst row hides behind it. |
| `buildChooser()` | 4006 |  |
| `renderChooser()` | 4023 | Labels harvested from the grid's own cells (section 21): the day chips read the day name and number the page already rendered, the analyst chips read the name. Nothing invented, so it is right in all 24 locales. |
| `syncChooserPressed()` | 4057 |  |
| `setView(v)` | 4072 |  |
| `defaults()` | 4081 | Day defaults to today when this week holds it; analyst to the first row. |
| `clearTags()` | 4094 |  |
| `dayLabel(iso)` | 4109 | The analyst view labels each stacked cell with its date, and it must be the format the operator chose in preferences. |
| `apply()` | 4118 |  |
| `goToThisWeek()` | 4190 |  |
| `sync()` | 4196 |  |
| `tr(key, fallback)` | 4273 |  |
| `buildBack()` | 4285 | 🔴 The open-a-record functions REDRAW the detail pane wholesale, which throws this button away with everything else. Exactly the same fault as the rota chooser: anything injected into a pane a page re-renders has to be put back, and the only reliable trigger is watching the pane. |
| `showPane(which)` | 4300 |  |
| `sync()` | 4336 |  |
| `SVG(paths)` | 4376 |  |
| `restore()` | 4398 |  |
| `fill()` | 4411 |  |
| `sync()` | 4438 |  |
| `iconFor(el)` | 4484 | Which icon belongs to which control, by the handler the page already wrote - not by position, which a future edit would quietly change. |
| `toIcons()` | 4495 |  |
| `toText()` | 4510 |  |
| `sync()` | 4519 |  |
| `build()` | 4562 |  |
| `toIcons()` | 4569 |  |
| `toText()` | 4582 |  |
| `reserve()` | 4596 | The footer is fixed, so the editor needs to reserve its height or the last step sits behind it. Measured rather than assumed - the bar is one row here, but a constant is wrong in whichever state you did not measure. |
| `sync()` | 4602 |  |
| `tr(key, fallback)` | 4654 |  |
| `build()` | 4667 |  |
| `setOpen(open)` | 4716 |  |
| `place(intoSheet)` | 4721 |  |
| `reserve()` | 4729 |  |
| `sync()` | 4735 |  |
| `tr(key, fallback)` | 4785 |  |
| `build()` | 4798 |  |
| `showView()` | 4858 |  |
| `setOpen(open)` | 4876 |  |
| `place(intoSheet)` | 4881 |  |
| `reserve()` | 4889 |  |
| `sync()` | 4894 |  |
| `build()` | 4952 |  |
| `toIcons()` | 4959 |  |
| `toText()` | 4974 |  |
| `reserve()` | 4985 | Reserve the footer's real height, so the last card is not behind it. |
| `sync()` | 4990 |  |
| `tr(key, fallback)` | 5036 |  |
| `esc(s)` | 5041 |  |
| `SVG(p)` | 5044 |  |
| `buildSheet()` | 5083 |  |
| `openSheet()` | 5105 |  |
| `closeSheet()` | 5106 |  |
| `syncDot()` | 5109 |  |
| `setView(v)` | 5113 |  |
| `act(id)` | 5123 |  |
| `sync()` | 5133 |  |
| `label()` | 5173 |  |
| `apply()` | 5177 |  |
| `tr(key, fallback)` | 5214 |  |
| `build()` | 5226 |  |
| `showView()` | 5280 |  |
| `setOpen(open)` | 5288 |  |
| `place(intoSheet)` | 5294 |  |
| `reserve()` | 5302 |  |
| `sync()` | 5307 |  |
| `build()` | 5362 |  |
| `toIcons()` | 5369 |  |
| `toText()` | 5387 |  |
| `reserve()` | 5397 |  |
| `sync()` | 5402 |  |
| `tr(key, fallback)` | 5452 |  |
| `txt(el)` | 5457 |  |
| `build()` | 5463 |  |
| `setOpen(open)` | 5495 |  |
| `laneWord()` | 5502 | The plan's own word for a lane, from the first lane's kind chip. |
| `openFor(row)` | 5506 |  |
| `fire(target, type)` | 5536 |  |
| `moveTo(laneId)` | 5543 |  |
| `decorate()` | 5554 |  |
| `strip()` | 5582 |  |
| `sync()` | 5600 |  |
| `tr(key, fallback)` | 5646 |  |
| `txt(el)` | 5651 |  |
| `headText(h)` | 5654 | A column heading's own words - text nodes only, so the count badge beside them does not come along. |
| `build()` | 5667 |  |
| `setOpen(open)` | 5698 |  |
| `openFor(card)` | 5704 |  |
| `fire(target, type)` | 5724 |  |
| `moveTo(moscow)` | 5731 |  |
| `decorate()` | 5744 |  |
| `strip()` | 5766 |  |
| `sync()` | 5784 |  |
| `apply()` | 5821 |  |

## Loaded by

- [asset-management/dashboard/index.php](/code/files/asset-management/dashboard/index.php.md)
- [asset-management/index.php](/code/files/asset-management/index.php.md)
- [asset-management/leases/index.php](/code/files/asset-management/leases/index.php.md)
- [asset-management/leases/view.php](/code/files/asset-management/leases/view.php.md)
- [asset-management/manager-access.php](/code/files/asset-management/manager-access.php.md)
- [asset-management/servers/index.php](/code/files/asset-management/servers/index.php.md)
- [asset-management/settings/index.php](/code/files/asset-management/settings/index.php.md)
- [asset-management/table.php](/code/files/asset-management/table.php.md)
- [asset-management/users.php](/code/files/asset-management/users.php.md)
- [calendar/help.php](/code/files/calendar/help.php.md)
- [calendar/index.php](/code/files/calendar/index.php.md)
- [calendar/settings/index.php](/code/files/calendar/settings/index.php.md)
- [calendar/table/index.php](/code/files/calendar/table/index.php.md)
- [change-management/table.php](/code/files/change-management/table.php.md)
- [checklists/edit/index.php](/code/files/checklists/edit/index.php.md)
- [checklists/help.php](/code/files/checklists/help.php.md)
- [checklists/index.php](/code/files/checklists/index.php.md)
- [checklists/settings/index.php](/code/files/checklists/settings/index.php.md)
- [cmdb/audit.php](/code/files/cmdb/audit.php.md)
- [cmdb/help.php](/code/files/cmdb/help.php.md)
- [cmdb/index.php](/code/files/cmdb/index.php.md)
- [cmdb/object.php](/code/files/cmdb/object.php.md)
- [cmdb/settings/index.php](/code/files/cmdb/settings/index.php.md)
- [contracts/contacts/index.php](/code/files/contracts/contacts/index.php.md)
- [contracts/edit.php](/code/files/contracts/edit.php.md)
- [contracts/help.php](/code/files/contracts/help.php.md)
- [contracts/index.php](/code/files/contracts/index.php.md)
- [contracts/rfp-builder/audit.php](/code/files/contracts/rfp-builder/audit.php.md)
- [contracts/rfp-builder/compare.php](/code/files/contracts/rfp-builder/compare.php.md)
- [contracts/rfp-builder/consolidate.php](/code/files/contracts/rfp-builder/consolidate.php.md)
- [contracts/rfp-builder/coverage.php](/code/files/contracts/rfp-builder/coverage.php.md)
- [contracts/rfp-builder/document.php](/code/files/contracts/rfp-builder/document.php.md)
- [contracts/rfp-builder/documents.php](/code/files/contracts/rfp-builder/documents.php.md)
- [contracts/rfp-builder/extracted.php](/code/files/contracts/rfp-builder/extracted.php.md)
- [contracts/rfp-builder/help.php](/code/files/contracts/rfp-builder/help.php.md)
- [contracts/rfp-builder/index.php](/code/files/contracts/rfp-builder/index.php.md)
- [contracts/rfp-builder/scoring.php](/code/files/contracts/rfp-builder/scoring.php.md)
- [contracts/rfp-builder/suppliers.php](/code/files/contracts/rfp-builder/suppliers.php.md)
- [contracts/rfp-builder/view.php](/code/files/contracts/rfp-builder/view.php.md)
- [contracts/settings/index.php](/code/files/contracts/settings/index.php.md)
- [contracts/suppliers/index.php](/code/files/contracts/suppliers/index.php.md)
- [contracts/suppliers/view/index.php](/code/files/contracts/suppliers/view/index.php.md)
- [contracts/view.php](/code/files/contracts/view.php.md)
- [domains/accounts/index.php](/code/files/domains/accounts/index.php.md)
- [domains/dashboard/index.php](/code/files/domains/dashboard/index.php.md)
- [domains/help.php](/code/files/domains/help.php.md)
- [domains/index.php](/code/files/domains/index.php.md)
- [domains/settings/index.php](/code/files/domains/settings/index.php.md)
- [domains/table/index.php](/code/files/domains/table/index.php.md)
- [domains/view.php](/code/files/domains/view.php.md)
- [files/help.php](/code/files/files/help.php.md)
- [files/index.php](/code/files/files/index.php.md)
- [files/settings/index.php](/code/files/files/settings/index.php.md)
- [forms/approvals.php](/code/files/forms/approvals.php.md)
- [forms/collection.php](/code/files/forms/collection.php.md)
- [forms/fill.php](/code/files/forms/fill.php.md)
- [forms/help.php](/code/files/forms/help.php.md)
- [forms/help/_bottom.php](/code/files/forms/help/_bottom.php.md)
- [forms/settings/index.php](/code/files/forms/settings/index.php.md)
- [forms/submissions.php](/code/files/forms/submissions.php.md)
- [knowledge/assistant/index.php](/code/files/knowledge/assistant/index.php.md)
- [knowledge/help.php](/code/files/knowledge/help.php.md)
- [knowledge/index.php](/code/files/knowledge/index.php.md)
- [knowledge/review/index.php](/code/files/knowledge/review/index.php.md)
- [knowledge/settings/index.php](/code/files/knowledge/settings/index.php.md)
- [lms/editor.php](/code/files/lms/editor.php.md)
- [lms/help.php](/code/files/lms/help.php.md)
- [lms/index.php](/code/files/lms/index.php.md)
- [lms/my-courses.php](/code/files/lms/my-courses.php.md)
- [lms/native-player.php](/code/files/lms/native-player.php.md)
- [lms/player.php](/code/files/lms/player.php.md)
- [morning-checks/help.php](/code/files/morning-checks/help.php.md)
- [morning-checks/index.php](/code/files/morning-checks/index.php.md)
- [morning-checks/settings/index.php](/code/files/morning-checks/settings/index.php.md)
- [network-mapper/diagram.php](/code/files/network-mapper/diagram.php.md)
- [network-mapper/help.php](/code/files/network-mapper/help.php.md)
- [network-mapper/index.php](/code/files/network-mapper/index.php.md)
- [process-mapper/help.php](/code/files/process-mapper/help.php.md)
- [process-mapper/index.php](/code/files/process-mapper/index.php.md)
- [process-mapper/settings/index.php](/code/files/process-mapper/settings/index.php.md)
- [projects/capacity.php](/code/files/projects/capacity.php.md)
- [projects/index.php](/code/files/projects/index.php.md)
- [projects/settings/index.php](/code/files/projects/settings/index.php.md)
- [projects/tutorial.php](/code/files/projects/tutorial.php.md)
- [projects/view.php](/code/files/projects/view.php.md)
- [reporting/help.php](/code/files/reporting/help.php.md)
- [reporting/index.php](/code/files/reporting/index.php.md)
- [reporting/intune/index.php](/code/files/reporting/intune/index.php.md)
- [reporting/packs/index.php](/code/files/reporting/packs/index.php.md)
- [reporting/tickets/index.php](/code/files/reporting/tickets/index.php.md)
- [service-status/help.php](/code/files/service-status/help.php.md)
- [service-status/index.php](/code/files/service-status/index.php.md)
- [service-status/settings/index.php](/code/files/service-status/settings/index.php.md)
- [software/dashboard/index.php](/code/files/software/dashboard/index.php.md)
- [software/dashboard/library.php](/code/files/software/dashboard/library.php.md)
- [software/help.php](/code/files/software/help.php.md)
- [software/index.php](/code/files/software/index.php.md)
- [software/licences/index.php](/code/files/software/licences/index.php.md)
- [software/settings/index.php](/code/files/software/settings/index.php.md)
- [system/ai/index.php](/code/files/system/ai/index.php.md)
- [system/analysts/index.php](/code/files/system/analysts/index.php.md)
- [system/api/docs.php](/code/files/system/api/docs.php.md)
- [system/api/index.php](/code/files/system/api/index.php.md)
- [system/branding/index.php](/code/files/system/branding/index.php.md)
- [system/calendar-sync/index.php](/code/files/system/calendar-sync/index.php.md)
- [system/colours/index.php](/code/files/system/colours/index.php.md)
- [system/companies/index.php](/code/files/system/companies/index.php.md)
- [system/cost-centres/index.php](/code/files/system/cost-centres/index.php.md)
- [system/date-formats/index.php](/code/files/system/date-formats/index.php.md)
- [system/db-verify/index.php](/code/files/system/db-verify/index.php.md)
- [system/debug-tools/includes/tool-page.php](/code/files/system/debug-tools/includes/tool-page.php.md)
- [system/debug-tools/index.php](/code/files/system/debug-tools/index.php.md)
- [system/demo-data/index.php](/code/files/system/demo-data/index.php.md)
- [system/docker/index.php](/code/files/system/docker/index.php.md)
- [system/email-routing-test/index.php](/code/files/system/email-routing-test/index.php.md)
- [system/encryption/index.php](/code/files/system/encryption/index.php.md)
- [system/help/index.php](/code/files/system/help/index.php.md)
- [system/help/_bottom.php](/code/files/system/help/_bottom.php.md)
- [system/index.php](/code/files/system/index.php.md)
- [system/integrations/help.php](/code/files/system/integrations/help.php.md)
- [system/integrations/index.php](/code/files/system/integrations/index.php.md)
- [system/integrations/provider.php](/code/files/system/integrations/provider.php.md)
- [system/integrations/slack.php](/code/files/system/integrations/slack.php.md)
- [system/integrations/tika.php](/code/files/system/integrations/tika.php.md)
- [system/managers/index.php](/code/files/system/managers/index.php.md)
- [system/modules/index.php](/code/files/system/modules/index.php.md)
- [system/orphaned-tickets/index.php](/code/files/system/orphaned-tickets/index.php.md)
- [system/photo-album/index.php](/code/files/system/photo-album/index.php.md)
- [system/portal-profile/index.php](/code/files/system/portal-profile/index.php.md)
- [system/preferences/index.php](/code/files/system/preferences/index.php.md)
- [system/roles/index.php](/code/files/system/roles/index.php.md)
- [system/search/index.php](/code/files/system/search/index.php.md)
- [system/security/index.php](/code/files/system/security/index.php.md)
- [system/self-service/index.php](/code/files/system/self-service/index.php.md)
- [system/sso/index.php](/code/files/system/sso/index.php.md)
- [system/sso/provider.php](/code/files/system/sso/provider.php.md)
- [system/status-portal/index.php](/code/files/system/status-portal/index.php.md)
- [system/teams/index.php](/code/files/system/teams/index.php.md)
- [system/topology/index.php](/code/files/system/topology/index.php.md)
- [system/webhooks/index.php](/code/files/system/webhooks/index.php.md)
- [tasks/calendar/index.php](/code/files/tasks/calendar/index.php.md)
- [tasks/help.php](/code/files/tasks/help.php.md)
- [tasks/index.php](/code/files/tasks/index.php.md)
- [tasks/settings/index.php](/code/files/tasks/settings/index.php.md)
- [tasks/table/index.php](/code/files/tasks/table/index.php.md)
- [tasks/timeline/index.php](/code/files/tasks/timeline/index.php.md)
- [tickets/activity.php](/code/files/tickets/activity.php.md)
- [tickets/calendar.php](/code/files/tickets/calendar.php.md)
- [tickets/csat/index.php](/code/files/tickets/csat/index.php.md)
- [tickets/csat/survey.php](/code/files/tickets/csat/survey.php.md)
- [tickets/dashboard/index.php](/code/files/tickets/dashboard/index.php.md)
- [tickets/dashboard/library.php](/code/files/tickets/dashboard/library.php.md)
- [tickets/help-calendar-sync.php](/code/files/tickets/help-calendar-sync.php.md)
- [tickets/help-email-templates.php](/code/files/tickets/help-email-templates.php.md)
- [tickets/help-mailbox-auth.php](/code/files/tickets/help-mailbox-auth.php.md)
- [tickets/help-sla.php](/code/files/tickets/help-sla.php.md)
- [tickets/help.php](/code/files/tickets/help.php.md)
- [tickets/index.php](/code/files/tickets/index.php.md)
- [tickets/manager-access.php](/code/files/tickets/manager-access.php.md)
- [tickets/rota.php](/code/files/tickets/rota.php.md)
- [tickets/settings/index.php](/code/files/tickets/settings/index.php.md)
- [tickets/triage/index.php](/code/files/tickets/triage/index.php.md)
- [tickets/users.php](/code/files/tickets/users.php.md)
- [war-room/help.php](/code/files/war-room/help.php.md)
- [war-room/index.php](/code/files/war-room/index.php.md)
- [war-room/settings/index.php](/code/files/war-room/settings/index.php.md)
- [watchtower/help.php](/code/files/watchtower/help.php.md)
- [watchtower/index.php](/code/files/watchtower/index.php.md)
- [watchtower/settings/index.php](/code/files/watchtower/settings/index.php.md)
- [workflow/editor.php](/code/files/workflow/editor.php.md)
- [workflow/executions.php](/code/files/workflow/executions.php.md)
- [workflow/help-ssl.php](/code/files/workflow/help-ssl.php.md)
- [workflow/help-webhooks.php](/code/files/workflow/help-webhooks.php.md)
- [workflow/help.php](/code/files/workflow/help.php.md)
- [workflow/index.php](/code/files/workflow/index.php.md)
- [workflow/settings/index.php](/code/files/workflow/settings/index.php.md)

