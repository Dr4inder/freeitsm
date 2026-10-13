# includes/back_link.php

> PHP - 55 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [backLinkUrlValid()](/code/functions/backLinkUrlValid.md) | 18 | True when `$url` is a plain http(s) address - the only kind ever rendered. |
| [backLinkSettings()](/code/functions/backLinkSettings.md) | 24 | The three settings, raw - for System -> Branding. |
| [backLinkHtml()](/code/functions/backLinkHtml.md) | 41 | The link's HTML for a header ('portal' or 'analyst'), or '' when it is not set up, not meant for this side, or its address is not a plain http(s) one. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 28 | `backLinkSettings` | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Included by:** [api/system/get_branding.php](/code/files/api/system/get_branding.php.md), [api/system/save_branding.php](/code/files/api/system/save_branding.php.md), [includes/waffle-menu.php](/code/files/includes/waffle-menu.php.md), [self-service/includes/header.php](/code/files/self-service/includes/header.php.md)

