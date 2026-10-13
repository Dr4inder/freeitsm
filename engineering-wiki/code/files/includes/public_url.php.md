# includes/public_url.php

> PHP - 166 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [publicBaseUrlSetting()](/code/functions/publicBaseUrlSetting.md) | 50 | The address an administrator has explicitly configured, or '' if none. |
| [publicUrlWithAppPath()](/code/functions/publicUrlWithAppPath.md) | 90 | Make sure the configured address carries the app's sub-path exactly once. |
| [publicBaseUrlForget()](/code/functions/publicBaseUrlForget.md) | 109 | Forget the cached root - after the setting is saved, or between test cases. |
| [publicBaseUrl()](/code/functions/publicBaseUrl.md) | 124 | The root every outbound link should be built on, without a trailing slash. |
| [publicAbsoluteUrl()](/code/functions/publicAbsoluteUrl.md) | 162 | An absolute URL for an app-relative path, e.g. 'self-service/tickets.php?id=9'. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 54 | `publicBaseUrlSetting` | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Includes:** [includes/session_security.php](/code/files/includes/session_security.php.md)

**Included by:** [api/domains/settings.php](/code/files/api/domains/settings.php.md), [api/lms/tests.php](/code/files/api/lms/tests.php.md), [api/tickets/get_public_base_url.php](/code/files/api/tickets/get_public_base_url.php.md), [asset-management/labels.php](/code/files/asset-management/labels.php.md), [includes/asset_labels.php](/code/files/includes/asset_labels.php.md), [includes/csrf.php](/code/files/includes/csrf.php.md), [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), [includes/integrations/integrations.php](/code/files/includes/integrations/integrations.php.md), [includes/managers.php](/code/files/includes/managers.php.md), [includes/notifications_router.php](/code/files/includes/notifications_router.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), [includes/template_email.php](/code/files/includes/template_email.php.md)

**Calls:** [requestIsHttps()](/code/functions/requestIsHttps.md)

