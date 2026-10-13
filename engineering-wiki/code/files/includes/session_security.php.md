# includes/session_security.php

> PHP - 179 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [requestIsHttps()](/code/functions/requestIsHttps.md) | 58 | Is this request actually over HTTPS? |
| [requestScheme()](/code/functions/requestScheme.md) | 90 | 'https' or 'http' — the scheme to put on an absolute URL built from this request. |
| [sessionCookieOptions()](/code/functions/sessionCookieOptions.md) | 103 | The attributes an authenticated session cookie must carry. |
| [sessionPromoteToAuthenticated()](/code/functions/sessionPromoteToAuthenticated.md) | 128 | Call at every point that turns an anonymous session into an identified one, and whenever a password changes. |
| [sessionCookieParamsAreHardened()](/code/functions/sessionCookieParamsAreHardened.md) | 160 | Did the server's own configuration already give the session cookie the attributes we require? (i.e. did one of .user.ini / .htaccess / docker php.ini apply?) |

## How it hangs together

**Includes:** [includes/csrf.php](/code/files/includes/csrf.php.md)

**Included by:** [api/auth/request_password_reset.php](/code/files/api/auth/request_password_reset.php.md), [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md), [includes/csat.php](/code/files/includes/csat.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/landing.php](/code/files/includes/landing.php.md), [includes/oidc.php](/code/files/includes/oidc.php.md), [includes/public_url.php](/code/files/includes/public_url.php.md), [includes/self_service_email.php](/code/files/includes/self_service_email.php.md)

**Calls:** [csrfRotate()](/code/functions/csrfRotate.md)

