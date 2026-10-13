# assets/js/lms-native-player.js

> JavaScript - 264 lines

LMS — the learner's player for an authored course.

One lesson per step: read the body, answer that lesson's questions, move on.
Answers are held locally until the end and graded in one go by the server —
the client has no answer key to check against, by design (see
api/lms/course_content.php), so it cannot tell you if you're right and cannot
be made to lie about it either.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `LMSPlayer(()` | 10 | LMS — the learner's player for an authored course. |
| `esc(s)` | 35 |  |
| `elapsed()` | 36 |  |
| `init()` | 38 |  |
| `renderToc()` | 68 |  |
| `renderLesson()` | 86 |  |
| `unanswered()` | 136 | Every question in the course must be answered before it can be graded. |
| `go(i)` | 144 |  |
| `next()` | 152 |  |
| `prev()` | 157 |  |
| `saveBookmark(unloading)` | 159 |  |
| `finish()` | 176 |  |
| `renderResult(d)` | 207 |  |

## Loaded by

- [lms/native-player.php](/code/files/lms/native-player.php.md)
- [self-service/course.php](/code/files/self-service/course.php.md)

