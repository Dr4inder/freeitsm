# assets/js/workflow-executions.js

> JavaScript - 316 lines

Workflows — execution log.

Filters are held in the URL, so a filtered view is shareable, bookmarkable and
deep-linkable — which is what lets the Watchtower card and the status tallies
link straight to "the failures from today" rather than dropping you at an
unfiltered list and leaving you to find them.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `esc(s)` | 12 |  |
| `fmtWhen(s)` | 32 | started_datetime is a server-stamped UTC instant → show in the analyst's zone. |
| `fmtTook(a, b)` | 39 | How long the run took. Both timestamps are UTC, so the difference is safe. |
| `statusPill(status, dry)` | 48 |  |
| `readUrlIntoControls()` | 62 |  |
| `currentParams()` | 71 |  |
| `pushUrl()` | 81 |  |
| `load()` | 88 |  |
| `fillFacets(f)` | 131 |  |
| `renderTally(tally)` | 149 | Status counts across the whole log — and one-click filters into it. |
| `renderPager(d)` | 161 |  |
| `open(id)` | 179 |  |
| `renderDetail(d)` | 194 |  |
| `renderStep(s)` | 240 |  |

## API endpoints it calls

- [api/workflow/executions.php](/code/files/api/workflow/executions.php.md)
- [api/workflow/execution_detail.php](/code/files/api/workflow/execution_detail.php.md)

## Loaded by

- [workflow/executions.php](/code/files/workflow/executions.php.md)

