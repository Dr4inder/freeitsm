# includes/inbox_display.php

> PHP - 203 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [inboxDisplayRegistry()](/code/functions/inboxDisplayRegistry.md) | 42 | The registry: every field that can appear on a row, and the styles it accepts. |
| [inboxDisplayDefaults()](/code/functions/inboxDisplayDefaults.md) | 90 | The shipped default, used when neither the install nor the analyst has chosen. |
| [inboxDisplayNormalise()](/code/functions/inboxDisplayNormalise.md) | 106 | Coerce anything into a valid config. |
| [inboxDisplayInstallDefault()](/code/functions/inboxDisplayInstallDefault.md) | 130 | The install-wide default an administrator has set, or the shipped one. |
| [inboxDisplayForAnalyst()](/code/functions/inboxDisplayForAnalyst.md) | 152 | What THIS analyst should see: their own choice, else the install default. |
| [inboxDisplayIsPersonal()](/code/functions/inboxDisplayIsPersonal.md) | 187 | Has this analyst chosen for themselves, or are they following the install default? |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 133 | `inboxDisplayInstallDefault` | read [system_settings](/code/tables/system_settings.md) |  |
| 162 | `inboxDisplayForAnalyst` | read [user_preferences](/code/tables/user_preferences.md) |  |
| 194 | `inboxDisplayIsPersonal` | read [user_preferences](/code/tables/user_preferences.md) |  |

## How it hangs together

**Included by:** [api/tickets/save_inbox_display.php](/code/files/api/tickets/save_inbox_display.php.md), [tickets/index.php](/code/files/tickets/index.php.md), [tickets/settings/index.php](/code/files/tickets/settings/index.php.md)

