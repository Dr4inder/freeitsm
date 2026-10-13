# assets/js/lms-tests.js

> JavaScript - 622 lines

LMS -> Tests (competency tests). One file for the three analyst pages, chosen by <body data-ct-page="index|edit|result">: index - Tests, Question bank and Candidates tabs edit - the test builder: role, skills, questions, sending to candidates result - one candidate's result Shared pieces: the question editor and the bank picker (modals built here, so no page carries a copy of their markup). All writes go to api/lms/tests.php.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `L(key, en, p)` | 18 |  |
| `esc(s)` | 19 |  |
| `$(id)` | 20 |  |
| `get(params)` | 22 |  |
| `post(body)` | 25 |  |
| `toast(msg, kind)` | 31 |  |
| `fail(d)` | 38 |  |
| `diffLabel(d)` | 40 |  |
| `fmtLabel(f)` | 41 |  |
| `statusLabel(s)` | 42 |  |
| `stateLabel(s)` | 43 |  |
| `when(utc)` | 47 |  |
| `pct(n)` | 48 |  |
| `opts(list, sel, label)` | 49 |  |
| `modal(id, title, bodyHtml, actionsHtml)` | 52 | ------------------------------------------------------------------ modal shell |
| `closeModal(m)` | 66 |  |
| `questionCard(q, o)` | 72 | ------------------------------------------------------------------ question card |
| `editQuestion(q, onSaved, testId)` | 95 |  |
| `readRows()` | 110 |  |
| `draw()` | 118 |  |
| `bankFilters(prefix, skills, withStatus)` | 161 | ------------------------------------------------------------------ bank (shared by the tab and the picker) |
| `bankQuery(prefix, statusOverride)` | 172 |  |
| `wireFilters(prefix, run)` | 176 |  |
| `pickFromBank(testId, already, done)` | 185 |  |
| `count()` | 193 |  |
| `run()` | 194 |  |
| `candidatesTable(rows, showTest)` | 220 | ------------------------------------------------------------------ candidates table (index tab + builder) |
| `showLink(link, note, emailed)` | 240 |  |
| `linkNote(days)` | 255 |  |
| `wireSittingActions(host, reload)` | 256 |  |
| `sendToCandidate(testId, canEmail, done)` | 273 |  |
| `initIndex()` | 295 | ================================================================== INDEX |
| `show(tab)` | 297 |  |
| `loadTests()` | 305 |  |
| `loadBank()` | 327 |  |
| `runBank()` | 338 |  |
| `bulk()` | 355 |  |
| `loadCandidates()` | 386 |  |
| `initEdit()` | 402 | ================================================================== EDIT (builder) |
| `skillRow(sk)` | 408 |  |
| `readTest()` | 423 |  |
| `save(quiet)` | 432 |  |
| `haveFor(sk)` | 440 |  |
| `load()` | 443 |  |
| `render()` | 458 |  |
| `loadSittings()` | 482 |  |
| `fill(rows)` | 487 |  |
| `next()` | 491 |  |
| `initResult()` | 568 | ================================================================== RESULT |

## API endpoints it calls

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)

