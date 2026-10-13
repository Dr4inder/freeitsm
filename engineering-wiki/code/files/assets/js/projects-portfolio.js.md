# assets/js/projects-portfolio.js

> JavaScript - 368 lines

Projects - the portfolio page (3.2.0).

Loads every project the analyst may see ONCE and filters in the browser:
the views are questions people actually ask (what is live, what do I lead,
what needs attention), and the search narrows whichever view is open. The
list is already company-scoped by the server, so nothing here decides who
may see what.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `inView(p, v)` | 26 |  |
| `byTarget(a, b)` | 42 |  |
| `sorted(rows)` | 43 |  |
| `healthStrip()` | 60 | One stacked bar, part to whole: how many live projects are on track, at risk, off track, or have no health yet. Health colours are STATUS colours, and each segment carries its word and count in the legend (and a tooltip), so colour never carries the meaning alone - green and amber sit close for protan vision (palette validator, 2026-10-09). |
| `word(k)` | 68 | 'none' is a live project with no health worked out - not the ring's "Finished"; it only shows when there is one. |
| `roadmap(rows)` | 84 | Every project in the view as a bar from its start to its target finish, in its own colour (identity), filled to its progress, with its next milestone as a diamond, a line for today. Health is on the row's label as a word, not on the bar - the bar's colour already means "which project". The cards are the table twin. Built from the Timeline's own classes (.prj-tl-*). |
| `dn(s)` | 86 |  |
| `x(n)` | 100 |  |
| `matches(p)` | 135 |  |
| `card(p, i)` | 141 |  |
| `render()` | 186 |  |
| `set(k, v)` | 197 |  |
| `short(s)` | 225 |  |
| `charts(ordered)` | 227 |  |
| `name(id)` | 235 |  |
| `money(v)` | 257 |  |
| `score(s)` | 272 |  |
| `load()` | 299 |  |
| `newProject()` | 317 |  |
| `exportView(format)` | 322 | The projects in the view, in the view's order, as a spreadsheet (3.3.0). |

## API endpoints it calls

- [api/projects/export.php](/code/files/api/projects/export.php.md)

## Loaded by

- [projects/index.php](/code/files/projects/index.php.md)

