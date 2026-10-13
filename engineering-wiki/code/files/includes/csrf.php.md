# includes/csrf.php

> PHP - 288 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [csrfRequestPath()](/code/functions/csrfRequestPath.md) | 63 | The request's path relative to the app root, e.g. "api/tickets/save.php". |
| [csrfIsExempt()](/code/functions/csrfIsExempt.md) | 73 |  |
| [csrfIsStateChanging()](/code/functions/csrfIsStateChanging.md) | 81 |  |
| [csrfHasSessionCookie()](/code/functions/csrfHasSessionCookie.md) | 88 | Did this request arrive with a session cookie at all? Without one there is nothing to forge. |
| [csrfSessionIsAuthenticated()](/code/functions/csrfSessionIsAuthenticated.md) | 94 | Is the session signed in - an analyst or a portal user? |
| [csrfToken()](/code/functions/csrfToken.md) | 104 | The session's token, created if missing. Works whether the session is open, or was opened read_and_close (then it is reopened just long enough to save). Returns '' when there is no session to keep it in. |
| [csrfRotate()](/code/functions/csrfRotate.md) | 126 | A new token - at sign-in, so a token seen before login is worthless after it. |
| [csrfProvidedToken()](/code/functions/csrfProvidedToken.md) | 134 | The token the request carried, from the header, a form field, or the query string. |
| [csrfOwnHosts()](/code/functions/csrfOwnHosts.md) | 147 | This app's own host[:port], as the browser addresses it: the Host header, and - only when asked, because it costs a query - the configured public address (for a proxy that rewrites Host). |
| [csrfSameOrigin()](/code/functions/csrfSameOrigin.md) | 172 | Did this request come from this app's own pages? true / false, or null when the browser did not say (not a browser, or a very old one). |
| [csrfRefuse()](/code/functions/csrfRefuse.md) | 201 | Refuse, in the shape the caller expects: JSON for the API, a short page for a form post. |
| [csrfEnforce()](/code/functions/csrfEnforce.md) | 226 | The central check. Runs on include of request_guard.php (so on every request that loads functions.php), after the endpoint has started its session. |
| [csrfRequireToken()](/code/functions/csrfRequireToken.md) | 244 | For the rare GET that changes something and is called by the app itself (an EventSource stream that writes, for instance): require the token explicitly. |
| [csrfHeadTags()](/code/functions/csrfHeadTags.md) | 254 | The tags every page needs: the token and the script that sends it. |
| [csrfStartPageInjection()](/code/functions/csrfStartPageInjection.md) | 270 | Put `csrfHeadTags()` into every HTML page without editing each one: the page's output is buffered and the tags are inserted straight after its <head>. Pages only - an API response, a file, a stream and anything that is not HTML pass through untouched. |

## How it hangs together

**Includes:** [includes/public_url.php](/code/files/includes/public_url.php.md)

**Included by:** [includes/request_guard.php](/code/files/includes/request_guard.php.md), [includes/session_security.php](/code/files/includes/session_security.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [publicBaseUrlSetting()](/code/functions/publicBaseUrlSetting.md)

