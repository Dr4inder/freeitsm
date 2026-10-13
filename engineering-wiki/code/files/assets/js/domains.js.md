# assets/js/domains.js

> JavaScript - 151 lines

Domains module (#154) — helpers every Domains page shares.

window.Dom: `api()`, `esc()`, and the little renderers (grade badge, countdown
pill, status, locks, a check finding) so the register, the domain page, the
dashboard and the table view draw a domain the same way.

Every URL is built from window.DOM_API (set by the page from BASE_URL) —
never a root-relative "/api/…", which 404s on an install in a sub-directory.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `esc(v)` | 16 |  |
| `api(path, body)` | 21 |  |
| `fmtDate(d)` | 35 |  |
| `grade(g, big)` | 40 |  |
| `daysPill(days, warnAt)` | 47 | "in 12 days" / "expired 3 days ago", coloured by urgency. |
| `status(name, colour)` | 61 |  |
| `lockIcon(state, icon, labelKey)` | 71 |  |
| `locks(r)` | 78 | Transfer lock, registry lock, DNSSEC — three glances. |
| `purpose(p)` | 87 |  |
| `renewal(m)` | 88 |  |
| `tags(s)` | 90 |  |
| `finding(f)` | 100 | One check finding. Its words come from lang/…/domains.php (check.<key>.title / .advice) with the finding's params filled in; the stored JSON carries no English, so a German analyst reads German. |
| `money(v, cur)` | 115 |  |
| `tick()` | 126 | The no-cron fallback: ask the server to do a short scheduled batch. Fire and forget — the server decides whether an hour has passed, and the page never waits on it. |
| `openModal(id)` | 130 |  |
| `closeModal(id)` | 131 |  |
| `fillSelect(sel, list, opts)` | 134 | Fill a <select> from a list of {id,name}. |

## Loaded by

- [domains/accounts/index.php](/code/files/domains/accounts/index.php.md)
- [domains/dashboard/index.php](/code/files/domains/dashboard/index.php.md)
- [domains/index.php](/code/files/domains/index.php.md)
- [domains/settings/index.php](/code/files/domains/settings/index.php.md)
- [domains/table/index.php](/code/files/domains/table/index.php.md)
- [domains/view.php](/code/files/domains/view.php.md)

