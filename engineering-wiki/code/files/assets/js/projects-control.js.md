# assets/js/projects-control.js

> JavaScript - 244 lines

Projects - the Change control tab (3.3.0). Rules: includes/projects/control.php.

Top: the agreed plan (a baseline) against the plan as it is now, headline
figures then what moved item by item. Pick an older baseline to compare
with that one instead. Below: change requests - raise, edit or withdraw one
still waiting, approve or reject (the server says who may: a setting).
The variance is worked out on the server; this file only draws it.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 13 |  |
| `call(body)` | 20 |  |
| `canChange()` | 21 |  |
| `cur()` | 22 |  |
| `money(v)` | 24 |  |
| `signed(n, fmt)` | 29 |  |
| `days(n)` | 30 |  |
| `hrs(n)` | 31 |  |
| `date(d)` | 32 |  |
| `reasonText(b)` | 34 |  |
| `baselineName(b)` | 40 |  |
| `compare(c)` | 43 |  |
| `row(label, from, to, delta, bad)` | 59 |  |
| `dated(kind, x)` | 74 |  |
| `request(r)` | 91 |  |
| `render()` | 127 |  |
| `$(id)` | 143 |  |
| `openRequest(r)` | 145 |  |
| `saveRequest()` | 160 |  |
| `approveEffect(r)` | 170 | What approving will do, said before anybody presses it. |
| `openDecide(id, decision)` | 186 |  |
| `decide()` | 199 |  |
| `takeBaseline()` | 206 |  |
| `wire()` | 213 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

