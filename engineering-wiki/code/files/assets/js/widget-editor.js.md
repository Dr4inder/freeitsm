# assets/js/widget-editor.js

> JavaScript - 423 lines

WidgetEditor — shared form logic for creating/editing dashboard widgets. Used by both the library page (inline panel) and the dashboard page (modal).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `we(key, english, params)` | 9 | Translate, or the English written at the call site (i18n.js). |
| `propertyLabel(p)` | 15 |  |
| `propertyInSentence(p)` | 38 | The same property as it reads INSIDE a sentence - not a lower-cased title. |
| `seriesLabel(s)` | 55 |  |
| `seriesInSentence(s)` | 58 |  |
| `timeGroupingLabel(g)` | 62 |  |
| `timeUnit(g)` | 71 | The unit as a noun: "per day". Was derived by stripping "ly" off "Daily", which gave "dai". |
| `dateRangeLabel(r)` | 79 |  |
| `dateRangeInSentence(r)` | 91 |  |
| `getValidChartTypes(aggProp, seriesProp)` | 127 |  |
| `escapeHtml(str)` | 134 |  |
| `generateDescription()` | 140 |  |
| `autoFillDescription()` | 188 |  |
| `buildDeptCheckboxes()` | 193 |  |
| `onPropertyChange()` | 204 |  |
| `updateChartTypeOptions()` | 244 |  |
| `updateFilterableVisibility()` | 268 |  |
| `bindEventListeners()` | 279 |  |
| `init(base)` | 298 |  |
| `populateForm(w)` | 310 |  |
| `resetForm()` | 337 |  |
| `collectFormData()` | 354 |  |
| `validateForm()` | 374 |  |
| `saveWidget()` | 387 |  |

## Loaded by

- [tickets/dashboard/index.php](/code/files/tickets/dashboard/index.php.md)
- [tickets/dashboard/library.php](/code/files/tickets/dashboard/library.php.md)

