# includes/self_service_settings.php

> PHP - 130 lines

'waves' was removed after review: it drew a chain of overlapping ovals rather than texture, and no amount of lightening made it calm. An install that had already chosen it degrades to no pattern, because the getter below blanks any value not on this list.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [selfServicePortalSettings()](/code/functions/selfServicePortalSettings.md) | 37 | Every self-service portal setting, with its default. |
| [selfServicePortalLogoUrl()](/code/functions/selfServicePortalLogoUrl.md) | 108 | The portal logo as a URL the browser can actually fetch, or '' when there is none (the caller then falls back to the main branding logo). |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 55 | `selfServicePortalSettings` | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Included by:** [api/self-service/close_ticket.php](/code/files/api/self-service/close_ticket.php.md), [api/system/self_service_portal.php](/code/files/api/system/self_service_portal.php.md), [self-service/includes/header.php](/code/files/self-service/includes/header.php.md), [self-service/my-equipment.php](/code/files/self-service/my-equipment.php.md), [system/self-service/index.php](/code/files/system/self-service/index.php.md)

