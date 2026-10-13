# includes/waffle-menu.php

> PHP - 2336 lines

Shared Waffle Menu Component Cross-module navigation menu for ITSM system

Required variables before including:
  `$path_prefix` - Path to root (e.g., '../' or '../../')
  `$current_module` - Current module identifier (tickets, assets, knowledge, changes, calendar, morning-checks, reporting)

Optional variables:
  `$analyst_name` - User's display name (defaults to 'Analyst')

## Functions

| Function | Line | What it does |
|---|--:|---|
| [renderWaffleMenuButton()](/code/functions/renderWaffleMenuButton.md) | 660 | Output the waffle menu button and panel |
| [renderWaffleMenuPanel()](/code/functions/renderWaffleMenuPanel.md) | 672 |  |
| [renderWaffleMenuJS()](/code/functions/renderWaffleMenuJS.md) | 737 |  |
| [renderNotificationBell()](/code/functions/renderNotificationBell.md) | 1219 | The global notification bell (discussion #55). |
| [renderWarRoomAlerts()](/code/functions/renderWarRoomAlerts.md) | 1233 |  |
| [renderHeaderRight()](/code/functions/renderHeaderRight.md) | 1436 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 758 | `renderWaffleMenuJS` | read [user_preferences](/code/tables/user_preferences.md) |  |
| 1243 | `renderWarRoomAlerts` | read [user_preferences](/code/tables/user_preferences.md) |  |
| 1469 | `renderHeaderRight` | read [users](/code/tables/users.md), read [auth_providers](/code/tables/auth_providers.md) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md), [includes/module-colors.php](/code/files/includes/module-colors.php.md), [includes/i18n.php](/code/files/includes/i18n.php.md), [includes/theme.php](/code/files/includes/theme.php.md), [includes/documents_panel.php](/code/files/includes/documents_panel.php.md), [includes/notification_bell.php](/code/files/includes/notification_bell.php.md), [includes/tenancy-switcher.php](/code/files/includes/tenancy-switcher.php.md), [includes/back_link.php](/code/files/includes/back_link.php.md)

**Included by:** [change-management/includes/header.php](/code/files/change-management/includes/header.php.md), [index.php](/code/files/index.php.md), [problem-management/includes/header.php](/code/files/problem-management/includes/header.php.md)

**Loads scripts:** `includes/toast.js`

**Calls:** [backLinkHtml()](/code/functions/backLinkHtml.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [documentsPanelAssets()](/code/functions/documentsPanelAssets.md), [getModuleColors()](/code/functions/getModuleColors.md), [notificationBellRender()](/code/functions/notificationBellRender.md), [renderTenantSwitcher()](/code/functions/renderTenantSwitcher.md), [sessionIsAdmin()](/code/functions/sessionIsAdmin.md), [t()](/code/functions/t.md)

