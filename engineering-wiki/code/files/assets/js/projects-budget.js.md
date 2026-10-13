# assets/js/projects-budget.js

> JavaScript - 295 lines

Projects - the Budget tab (3.2.0). Rules: includes/projects/budget.php.

Planned against actual in the PROJECT's currency, with labour worked out from
the time logged on its tasks. Amounts in another currency (a contract) are
shown and never added; changing the project's currency is a relabel, and the
page says so before anyone confirms. Rates have dates, so a new rate never
re-prices the past - the panel shows the project's own rate history.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 13 |  |
| `money(v, cur)` | 18 |  |
| `hours(min)` | 23 |  |
| `canChange()` | 27 |  |
| `call(body)` | 28 |  |
| `render()` | 30 |  |
| `drawEarned(b, cur)` | 125 | Earned value (3.3.0): planned value (orange - the plan, as on Spend over time), actual cost (blue - what was spent, likewise) and earned value (aqua - the work done, valued at its budget), with today's indices in words as well as numbers. |
| `word(v, good, bad)` | 132 |  |
| `drawSpend(b, cur)` | 156 | Spend over time (3.3.0): cumulative planned and actual, the forecast, and what to measure them against. |
| `drawChart(b, cur)` | 186 | Planned against actual per category; labour's actual is the costed time (3.3.0). |
| `openLine(line)` | 209 |  |
| `saveLine()` | 234 |  |
| `deleteLine()` | 246 |  |
| `changeCurrency()` | 253 |  |
| `wire()` | 262 |  |
| `render(c)` | 283 |  |
| `shown()` | 290 | The tab was shown: the chart measures its width, so it draws now (3.3.0). |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

