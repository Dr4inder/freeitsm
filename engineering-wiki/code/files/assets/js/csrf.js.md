# assets/js/csrf.js

> JavaScript - 109 lines

Adds the session's CSRF token to every request this page sends to FreeITSM (S4 - see includes/csrf.php). Loaded into every page's <head> by the server, before any other script, so code written before tokens existed - and code written after, by anyone - is covered without knowing about it.

`fetch()`                 X-CSRF-Token header
  XMLHttpRequest          X-CSRF-Token header
  <form method="post">    hidden _csrf_token field (on submit, and form.submit())
  navigator.sendBeacon()  ?_csrf= in the URL - a beacon cannot carry headers
  EventSource             ?_csrf= in the URL - neither can a stream

Only same-origin requests get the token: it must never be sent to another site.
GET and HEAD are left alone, except for EventSource, whose streams can write.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `sameOrigin(url)` | 27 |  |
| `withQuery(url)` | 30 |  |
| `stamp(form)` | 77 |  |

