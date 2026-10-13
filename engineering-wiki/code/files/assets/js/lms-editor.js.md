# assets/js/lms-editor.js

> JavaScript - 572 lines

LMS course editor — lessons, questions, and the three AI helpers.

The AI never writes to the database. Every helper drops its draft into the
form the author is already looking at, and it is saved by the same validated
endpoint a hand-typed lesson goes through. That is what keeps a bad generation
a nuisance rather than a problem.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `LMSEditor(()` | 9 | LMS course editor — lessons, questions, and the three AI helpers. |
| `esc(s)` | 27 |  |
| `init()` | 31 |  |
| `initTinyMCE()` | 42 |  |
| `setEditorBody(html)` | 96 | Write to the editor, or remember it until the editor exists. Every caller goes through here so none of them has to know whether TinyMCE has finished starting up. |
| `snapshotBaseline()` | 132 | 🔴 WHAT "UNSAVED CHANGES" IS MEASURED AGAINST. It used to be the lesson as the API returned it, compared with `editor.getContent()`. Those two are not the same kind of string: TinyMCE RE-SERIALISES what you give it, and by default (`entity_encoding: 'named'`) it writes non-ASCII characters back as named entities. So a body stored as |
| `loadLessons()` | 139 |  |
| `renderLessonList()` | 151 |  |
| `dropOn(targetId)` | 183 |  |
| `selectLesson(id)` | 196 |  |
| `isDirty()` | 215 |  |
| `newLesson()` | 221 |  |
| `createLesson(title, body)` | 227 |  |
| `saveLesson()` | 234 |  |
| `deleteLesson(id)` | 251 |  |
| `currentLesson()` | 272 |  |
| `renderQuestions()` | 274 |  |
| `typeLabel(t)` | 302 |  |
| `openQuestionModal(q)` | 306 |  |
| `editQuestion(id)` | 323 |  |
| `addAnswerRow(text = '', correct = false)` | 328 |  |
| `onTypeChange()` | 343 |  |
| `saveQuestion(e)` | 381 |  |
| `deleteQuestion(id)` | 403 |  |
| `renderPassMark()` | 419 |  |
| `openCourseModal()` | 426 |  |
| `saveCourse(e)` | 433 |  |
| `generateOutline(e)` | 457 |  |
| `openLessonAiModal()` | 483 |  |
| `generateLesson(e)` | 499 |  |
| `generateQuiz()` | 519 |  |
| `escapeForHtml(s)` | 540 |  |
| `busy(btn, on)` | 542 |  |
| `post(endpoint, body)` | 548 |  |
| `closeModal(id)` | 561 |  |

## Loaded by

- [lms/editor.php](/code/files/lms/editor.php.md)

