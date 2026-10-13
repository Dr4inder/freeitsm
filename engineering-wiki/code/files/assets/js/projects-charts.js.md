# assets/js/projects-charts.js

> JavaScript - 705 lines

Projects - charts (3.3.0): the burn-up on a project's Overview, and "where the money goes" and spend over time on its Budget tab. Plain SVG, no library.

The rules they follow (the dataviz method, checked 2026-10-09):
 - Two categorical series, slots 1 and 2 (blue, orange) - validated for
   colour-blind separation and contrast on the app's own light (#fff) and
   dark (#1e2228) surfaces; the dark steps are chosen, not flipped
   (--prj-viz-1 / --prj-viz-2 in projects.css).
 - Thin marks: 2px lines, bars <= 24px with rounded data ends, 4px end dots
   with a 2px surface ring; hairline solid gridlines.
 - A legend for every two-series chart; values selectively (line ends, bar
   tips); text in text colours, never the series colour.
 - A hover layer (crosshair + one tooltip for both series on the line; per
   bar on the bars), the same on keyboard focus, and a table view - the
   tooltip never holds a value nobody can reach otherwise.
 - Names go in with textContent (they are users' words).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `num(v)` | 23 |  |
| `el(name, attrs, parent)` | 25 |  |
| `html(tag, cls, text)` | 31 |  |
| `nice(max)` | 38 | A clean axis maximum and step: 0 / 5 / 10 / 15, 0 / 2,000 / 4,000. |
| `legend(series)` | 44 |  |
| `tableView(head, rows)` | 54 |  |
| `frame(container, tableLabel, chartLabel, buildTable)` | 66 | The chart / table switch, and where the chart draws. |
| `tooltip(plot)` | 84 |  |
| `tipRow(tip, value, name, cls)` | 90 |  |
| `burnup(container, opts)` | 104 | Burn-up: scope (everything in the project so far) and done, over time, with the target finish as a reference line. opts: {points: [{d: 'Y-m-d', scope, done}], target, series: [scopeName, doneName], unit: '' \| 'h', fmtDate, labels: {table, chart, date, target, aria}} |
| `dn(s)` | 114 |  |
| `X(d)` | 118 |  |
| `Y(v)` | 119 |  |
| `path(key)` | 138 |  |
| `show(i)` | 154 |  |
| `hide()` | 167 |  |
| `bars(container, opts)` | 189 | Grouped horizontal bars - two values per category (planned, actual). opts: {rows: [{label, a, b}], series: [aName, bName], fmt: v => text, labels: {table, chart, category, aria}} A missing value (null) draws no bar and reads "-". |
| `on()` | 219 |  |
| `spend(container, opts)` | 243 | Spend over time (3.3.0): cumulative planned and actual spend as steps, the forecast as a dashed continuation of actual from today to the finish, and the amounts to measure against (the budget, the baseline's budget, the tolerance) as plain reference lines labelled in text colour - they are thresholds, not series, so they take no series colour. opts: {points: [{d, planned, actual\|null}], forecast: {from, to, start, end}\|null, refs: [{v, label}], today, target, fmt, fmtTick, fmtDate, series: {actual, planned, forecast}, labels: {table, chart, date, today, target, at_finish, aria}} |
| `dn(s)` | 259 |  |
| `X(d)` | 264 |  |
| `Y(v)` | 265 |  |
| `step(list, key)` | 294 | Steps: the money moves on the day, not in a slope between days. |
| `valueAt(d)` | 317 |  |
| `show(i)` | 319 |  |
| `hide()` | 333 |  |
| `slot(n)` | 351 | A series class for categorical slot n (1-6), or a neutral ('n', 'n2'). |
| `stack(container, opts)` | 359 | Horizontal stacked bars (3.3.0) - one row per group (a stage, a project), segments per series (task statuses). Segments keep a 2px surface gap; the row's total and an optional note sit at its end in text colour. opts: {rows: [{label, values: [n...], note?}], series: [{name, slot}], labels: {table, chart, group, total, aria}, fmt?, max?} |
| `on()` | 382 |  |
| `flow(container, opts)` | 404 | Stacked area over time (3.3.0) - the cumulative flow diagram. Series are stacked bottom-up in the order given; a vertical marker can say where real history starts. Crosshair + one tooltip for every band, as the burn-up. opts: {points: [{d, values: [n...]}], series: [{name, slot}], marker?: {d, label}, fmtDate, labels: {table, chart, date, aria}} |
| `dn(s)` | 412 |  |
| `X(d)` | 416 |  |
| `Y(v)` | 417 |  |
| `show(i)` | 450 |  |
| `hide()` | 462 |  |
| `burndown(container, opts)` | 484 | Burndown (3.3.0): the work still to do over time, against an IDEAL line from where it stood on the first day to nothing at the target - above the line is behind. One series (slot 1); the ideal is a dashed reference in ink. opts: {points: [{d, remaining}], target, unit, fmtDate, labels: {table, chart, date, remaining, ideal, target, aria}} |
| `dn(s)` | 486 |  |
| `ideal(d)` | 492 |  |
| `X(d)` | 500 |  |
| `Xn(n)` | 501 |  |
| `Y(v)` | 502 |  |
| `show(i)` | 529 |  |
| `hide()` | 542 |  |
| `milestones(container, opts)` | 565 | Milestones across rows (3.3.0) - one row per project, a diamond per milestone on a shared calendar, with today marked. State is a STATUS, so it is never colour alone: reached is a filled good diamond, missed a filled critical one, coming up an outline - and the legend, tooltip and table say it in words. opts: {rows: [{label, items: [{d, name, state}]}], today, fmtDate, labels: {table, chart, project, milestone, date, state, states: {done, missed, due}, today, aria}} |
| `dn(s)` | 575 |  |
| `X(d)` | 578 |  |
| `on()` | 597 |  |
| `lines(container, opts)` | 622 | Several lines over time on one money axis (3.3.0) - earned value: planned value, earned value and actual cost. Up to three series (slots 1-3, the all-pairs-safe set); a null value ends that line (earned value stops today). Reference lines as `spend()`; crosshair + one tooltip for every line. opts: {points: [{d, values: [n\|null...]}], series: [{name, slot}], refs?: [{v, label}], today?, fmt, fmtTick, fmtDate, labels: {table, chart, date, today, aria}} |
| `dn(s)` | 630 |  |
| `X(d)` | 634 |  |
| `Y(v)` | 635 |  |
| `show(i)` | 671 |  |
| `hide()` | 683 |  |

## Loaded by

- [projects/index.php](/code/files/projects/index.php.md)
- [projects/view.php](/code/files/projects/view.php.md)

