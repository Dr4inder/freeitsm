# assets/js/subscribe.js

> JavaScript - 182 lines

Behaviour for the shared "add this calendar to your phone" dialogue.

Markup comes from includes/subscribe_modal.php; both the Calendar module and
Preferences (an analyst's own scheduled work) mount one. Keyed by the same id
prefix the markup was rendered with, so a page could carry more than one.

Each mount names the endpoint that mints its feed URL. That endpoint returns
{ scheme, host, path, url, insecure } — the components as well as the finished
URL, so the host can be swapped in the browser without another round trip.

⚠️ Needs qrcode.min.js. Without it everything still works; only the QR is
missing, which is why its failure is swallowed rather than reported.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `$(id)` | 22 |  |
| `t(key, fallback)` | 24 |  |
| `refresh(id)` | 33 | Rebuild the URL + QR from whatever host is currently typed. |
| `apply(id, d)` | 59 |  |
| `normalise(d)` | 83 | Endpoints differ in shape: the calendar's returns scheme/host/path, the work-calendar one returns a finished url. Accept either, so a caller is not forced to change its API to use this. |

## Loaded by

- [calendar/index.php](/code/files/calendar/index.php.md)
- [system/preferences/index.php](/code/files/system/preferences/index.php.md)

