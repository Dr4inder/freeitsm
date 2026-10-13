# assets/js/leases.js

> JavaScript - 404 lines

Assets -> Leases (3.5.0). Drives both pages: asset-management/leases/ the list + Due back (LEASES_CFG.page = 'list') asset-management/leases/view.php one lease (LEASES_CFG.page = 'lease')

Rules live server-side in includes/leases.php; this file only renders and
posts. Modals are built here so both pages share one copy.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `t(k, p)` | 15 |  |
| `tc(k, p)` | 16 |  |
| `esc(s)` | 17 |  |
| `d(v)` | 22 |  |
| `toast(msg, type)` | 23 |  |
| `today()` | 24 |  |
| `addDays(ymd, n)` | 25 |  |
| `money(v, cur)` | 26 |  |
| `get(path, params)` | 32 |  |
| `post(path, body)` | 39 |  |
| `fail(e)` | 45 |  |
| `endBadge(end)` | 48 | "Ends" with how near it is: overdue / within 90 days. |
| `modal(title, bodyHtml, onSave, saveLabel)` | 59 | Modals (one generic builder) |
| `close()` | 67 |  |
| `field(label, inner, hint)` | 82 |  |
| `opts(list, sel, blank)` | 85 |  |
| `val(w, name)` | 89 |  |
| `leaseForm(lease)` | 92 |  |
| `ccList(list)` | 96 |  |
| `scheduleForm(leaseId, s)` | 130 |  |
| `assetForm(row, sched)` | 155 |  |
| `addAssetsForm(sched)` | 173 |  |
| `count()` | 188 |  |
| `initList()` | 214 |  |
| `show(which)` | 216 |  |
| `loadList()` | 232 |  |
| `dueTable(rows, withLease)` | 258 |  |
| `loadDue()` | 273 |  |
| `loadLease()` | 287 | One lease |
| `renderLease(l)` | 297 |  |
| `wireLease(box, l)` | 357 |  |
| `sched(el)` | 358 |  |
| `row(el, s)` | 359 |  |

## Loaded by

- [asset-management/leases/index.php](/code/files/asset-management/leases/index.php.md)
- [asset-management/leases/view.php](/code/files/asset-management/leases/view.php.md)

