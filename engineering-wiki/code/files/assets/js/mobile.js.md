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
| `syncAssetsBar()` | 245 |  |
| `initCalendarMobile()` | 280 |  |
| `tr(key, fallback)` | 286 |  |
| `buildSheet(cls, title)` | 308 |  |
| `openSheet(el)` | 328 |  |
| `hideSheets()` | 332 |  |
| `closeSheet()` | 336 |  |
| `sidebarIntoSheet()` | 349 |  |
| `sidebarBackToPage()` | 357 |  |
| `localDateLabel(dateStr)` | 374 |  |
| `renderAgenda()` | 389 |  |
| `openDaySheet(dateStr)` | 460 |  |
| `scrollToWorkingHours()` | 490 |  |
| `syncCalendarBar()` | 512 |  |
| `initChangesMobile()` | 536 |  |
| `tr(key, fallback)` | 540 |  |
| `setPane(name)` | 546 |  |
| `wireRichTextCards()` | 590 |  |
| `panels()` | 603 |  |
| `tabFor(key)` | 606 |  |
| `areaFor(key)` | 609 |  |
| `liveEditor(id)` | 613 |  |
| `excerpt(html)` | 622 |  |
| `renderCards()` | 654 |  |
| `currentValue(key)` | 696 |  |
| `openField(key)` | 703 |  |
| `closeField()` | 740 |  |
| `initProblemsMobile()` | 834 |  |
| `setPane(name)` | 835 |  |
| `initStatusMobile()` | 872 |  |
| `tr(key, fallback)` | 876 |  |
| `setTab(name)` | 902 |  |
| `syncStatusBar()` | 930 |  |
| `initKnowledgeMobile()` | 965 |  |
| `tr(key, fallback)` | 969 |  |
| `openSheet()` | 998 |  |
| `hideSheet()` | 1002 |  |
| `closeSheet()` | 1003 |  |
| `sidebarIntoPlace()` | 1013 |  |
| `sidebarBackToPage()` | 1024 |  |
| `syncBackLabel()` | 1052 |  |
| `wireMetaToggle()` | 1063 |  |
| `toggle()` | 1072 |  |
| `wireFullScreenEditor()` | 1100 |  |
| `setFull(on)` | 1134 |  |
| `readView()` | 1161 |  |
| `setKbView(v)` | 1171 |  |
| `stripEditorPopout()` | 1193 |  |
| `syncKnowledgeBar()` | 1207 |  |
| `setPane(p)` | 1232 |  |
| `currentPane()` | 1233 |  |
| `pushPane(p)` | 1237 |  |
| `relocateSections()` | 1384 |  |
| `syncLinksCount()` | 1415 |  |
| `afterTicketRender()` | 1427 |  |
| `getCurrentEmail()` | 1434 |  |
| `decorateReadingPane()` | 1438 |  |
| `syncAttachBadge()` | 1460 |  |
| `buildToolbarOverflow()` | 1490 |  |
| `openAuditSheet()` | 1559 |  |
| `splitStamp(text)` | 1575 |  |
| `span(cls, text)` | 1580 |  |
| `renderAuditFeed(entries)` | 1591 |  |
| `syncBar()` | 1655 |  |
| `columns()` | 1691 |  |
| `build()` | 1695 |  |
| `mark()` | 1710 |  |
| `sync()` | 1743 |  |
| `labelCardFeed(table, columns)` | 2043 |  |
| `apply()` | 2087 |  |
| `wrapLabel(btn)` | 2179 |  |
| `clearOverflow()` | 2200 |  |
| `buildOverflow()` | 2212 |  |
| `ensureIcon(btn)` | 2296 |  |
| `moveIn()` | 2308 |  |
| `moveOut()` | 2329 |  |
| `sync()` | 2342 |  |
| `apply()` | 2403 |  |
| `clear()` | 2420 |  |
| `t(key, fallback)` | 2488 |  |
| `rowIsRecord(tr)` | 2540 |  |
| `filter()` | 2547 |  |
| `clearFilter()` | 2566 |  |
| `setView(v)` | 2573 |  |
| `syncChrome()` | 2605 |  |
| `tr(key, fallback)` | 2671 |  |
| `panelLabel()` | 2676 |  |
| `open()` | 2693 |  |
| `close()` | 2704 |  |
| `sync()` | 2737 |  |
| `syncTabName()` | 2810 |  |
| `setPage(which)` | 2828 |  |
| `claim(el)` | 2848 |  |
| `restore()` | 2853 |  |
| `gather()` | 2862 |  |
| `sync()` | 2878 |  |
| `tr(key, fallback)` | 2936 |  |
| `filtersIntoSheet()` | 2973 |  |
| `filtersBackToPage()` | 2978 |  |
| `openSheet()` | 2984 |  |
| `hideSheet()` | 2989 |  |
| `closeSheet()` | 2990 |  |
| `progressVisible()` | 2999 |  |
| `sync()` | 3002 |  |
| `tr(key, fallback)` | 3051 |  |
| `open()` | 3072 |  |
| `close()` | 3083 |  |
| `sync()` | 3140 |  |
| `tr(key, fallback)` | 3177 |  |
| `open()` | 3199 |  |
| `close()` | 3210 |  |
| `sync()` | 3266 |  |
| `sectionOf(link)` | 3318 |  |
| `readOnly()` | 3433 |  |
| `buzz()` | 3438 |  |
| `clearTimer()` | 3442 |  |
| `cleanup()` | 3446 |  |
| `beginPlace(tile, pt)` | 3456 |  |
| `finishPlace(pt)` | 3477 |  |
| `beginMove(node, pt)` | 3499 |  |
| `relayMouse(type, pt)` | 3513 |  |
| `point(e)` | 3523 |  |
| `sync()` | 3631 |  |
| `reveal()` | 3679 |  |
| `tr(key, fallback)` | 3752 |  |
| `open()` | 3791 |  |
| `hide()` | 3797 |  |
| `close()` | 3798 |  |
| `treeIntoSheet()` | 3810 |  |
| `treeBackToPage()` | 3814 |  |
| `sync()` | 3857 |  |
| `tr(key, fallback)` | 3923 |  |
| `colCount()` | 3930 |  |
| `buildBar()` | 3949 |  |
| `placeActions(intoFooter)` | 3979 |  |
| `syncBarPressed()` | 3989 |  |
| `reserveSpace()` | 3999 |  |
| `buildChooser()` | 4006 |  |
| `renderChooser()` | 4023 |  |
| `syncChooserPressed()` | 4057 |  |
| `setView(v)` | 4072 |  |
| `defaults()` | 4081 |  |
| `clearTags()` | 4094 |  |
| `dayLabel(iso)` | 4109 |  |
| `apply()` | 4118 |  |
| `sync()` | 4196 |  |
| `tr(key, fallback)` | 4273 |  |
| `buildBack()` | 4285 |  |
| `showPane(which)` | 4300 |  |
| `sync()` | 4336 |  |
| `restore()` | 4398 |  |
| `fill()` | 4411 |  |
| `sync()` | 4438 |  |
| `iconFor(el)` | 4484 |  |
| `toIcons()` | 4495 |  |
| `toText()` | 4510 |  |
| `sync()` | 4519 |  |
| `build()` | 4562 |  |
| `toIcons()` | 4569 |  |
| `toText()` | 4582 |  |
| `reserve()` | 4596 |  |
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
| `reserve()` | 4985 |  |
| `sync()` | 4990 |  |
| `tr(key, fallback)` | 5036 |  |
| `esc(s)` | 5041 |  |
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

