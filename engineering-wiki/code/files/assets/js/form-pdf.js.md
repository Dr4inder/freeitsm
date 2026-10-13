# assets/js/form-pdf.js

> JavaScript - 444 lines

FormPdf — turning a form submission into a PDF, and the formatting decisions that go with it.

🔑 WHY THIS FILE EXISTS. All of this began life inside forms/submissions.php,
which shows the submissions of ONE form. A collection shows the submissions of
SEVERAL, and needs identical documents. Two copies would have drifted the
first time a field type changed — the same reasoning that made the row export
icon reuse the panel's export rather than grow a twin.

⚠️ THE ONE SIGNATURE CHANGE. Everything here takes an explicit `form`
({ title, fields }) instead of closing over a page-global `formData`. On a
collection page every row may belong to a different form, so "the form" can
no longer be a property of the page.

Depends on: jspdf (vendored), window.t (i18n), window.fmtDate (timezones),
FormLogic (lookup labels + naive date values).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `decodeMultiValue(raw)` | 24 |  |
| `gridSummary(f, rows)` | 47 | A table's answer in one line, for a list cell or anywhere a whole table will not fit: "3 rows". |
| `gridCellText(col, value)` | 54 | One cell's stored value as text, by the column's own type. |
| `fieldValueParts(f, raw)` | 68 |  |
| `approvalParts(sub)` | 134 |  |
| `cleanForFileName(v)` | 146 |  |
| `submissionFileName(form, sub)` | 166 | "Software Request - Ed Mozley - 19.09.2026.pdf" |
| `bundleFileName(title, n)` | 183 | "Software Request - 6 submissions - 19.09.2026.pdf" |
| `loadBrandLogo(url)` | 194 |  |
| `newDoc()` | 207 |  |
| `drawSubmission(doc, form, sub, num, logo)` | 221 | Draw ONE submission into an existing document, starting at the top of the current page. Everything that decides what a record LOOKS like lives here and nowhere else, so one form's export and a collection bundle can never disagree about what a record contains. |
| `room(needed)` | 231 |  |
| `stampFooters(doc)` | 368 |  |
| `exportOne(form, sub, num, logoUrl)` | 382 | One submission, one file. |
| `exportBundle(items, bundleTitle, logoUrl)` | 394 | Many submissions, one file, a page break between each. |
| `exportSeparate(items, logoUrl)` | 412 | Many submissions, one file each. ⚠️ Fired back to back, browsers drop all but the first few — the downloads are queued by the page, not by the click — so leave a beat between them. |

## Loaded by

- [forms/collection.php](/code/files/forms/collection.php.md)
- [forms/submissions.php](/code/files/forms/submissions.php.md)

