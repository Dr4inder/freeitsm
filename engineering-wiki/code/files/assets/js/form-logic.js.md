# assets/js/form-logic.js

> JavaScript - 460 lines

FormLogic — the one shared brain for the Forms module.

The three places a form gets drawn (the builder preview, forms/fill.php and the
portal's self-service/catalogue.php) each keep their own markup and CSS, because
they genuinely look different and merging them would change how existing forms
render. What they must NOT each keep their own copy of is the *thinking*: which
types exist, which carry options, and whether a field is currently visible.
That all lives here.

⚠️ Mirrors includes/form_logic.php, which is the source of truth — the server
re-evaluates visibility on submit, because a browser can simply not run this.
Change one, change the other; tests/forms-logic runs the same cases through both.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `lookupLabel(raw)` | 37 | A lookup answer is JSON: {"id":11,"label":"LT-001"}. The LABEL is what a condition compares against, because 'is LT-001' is what a form builder means — nobody writes a rule against a database id. |
| `configOf(field)` | 50 | A field's config as an object. |
| `lookupSource(field)` | 56 |  |
| `fieldWidth(field)` | 70 | A field's width in twelfths. Absent means full, which is every field that predates the layout work. |
| `isAnswerable(type)` | 92 | Does this field type collect an answer? |
| `hasOptions(type)` | 93 |  |
| `isMultiValue(type)` | 94 |  |
| `noteStyle(field)` | 105 | A note's named style, defaulting when unset or unrecognised. |
| `labelPosition(field)` | 120 | Where a question's label sits. Mirrors FormsService::LABEL_POSITIONS. |
| `imageUrl(field, base)` | 139 | The URL an image block's picture is fetched from. |
| `imageMaxWidth(field)` | 145 | How wide an image may draw, as a percentage of its column. |
| `gridColumns(field)` | 168 | A table question's columns AS STORED — retired ones included. |
| `gridLiveColumns(field)` | 174 | The columns still being asked — what a filler draws. |
| `gridRows(raw)` | 184 | A table question's answer: always a list of rows, each a map of column id → value. |
| `noteBody(field)` | 195 | A note's optional longer text, beneath its title. |
| `dateMode(field)` | 201 | The mode of a datetime field, defaulting when unset. Mirrors FormsService::dateModeOf(). |
| `dateInputType(mode)` | 207 | The HTML input type a given mode needs. |
| `formatDateValue(raw)` | 221 | Render a stored value for READING (submissions table, CSV, detail drawer). |
| `parseOptions(raw)` | 226 | Options come back as a JSON string from the API but as a live array in the builder. |
| `normaliseValue(raw)` | 236 | Same as the PHP: a scalar string plus a list, so one operator handles both shapes. |
| `testRule(rule, valuesByFieldId)` | 263 |  |
| `visibility(fields, values)` | 304 | fields: array of {id, field_type, config} IN sort_order. values: { fieldId: answer }. Returns { fieldId: true\|false }. |
| `canReference(fields, fieldIndex, candidateIndex)` | 330 | True when a rule on `field` may point at `candidate` — earlier fields only, which is what stops cycles. |
| `attachLookups(root, searchUrl)` | 350 | Wire up every lookup box inside `root`. |
| `close()` | 362 |  |
| `choose(id, label)` | 364 |  |
| `search()` | 374 |  |

## API endpoints it calls

- [api/forms/image.php](/code/files/api/forms/image.php.md)

## Loaded by

- [forms/collection.php](/code/files/forms/collection.php.md)
- [forms/fill.php](/code/files/forms/fill.php.md)
- [forms/submissions.php](/code/files/forms/submissions.php.md)

