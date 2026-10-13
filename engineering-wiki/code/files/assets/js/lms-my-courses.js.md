# assets/js/lms-my-courses.js

> JavaScript - 170 lines

LMS — My Courses (learner landing). Lists the courses assigned to me with my own status, how far through I am, and a Launch button. Read-only; no management here.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `statusPill(row)` | 26 |  |
| `launchLabel(status)` | 33 |  |
| `progressBar(row)` | 51 | The progress bar, and the reason it always carries words. |
| `cardHtml(row)` | 72 |  |
| `render()` | 98 |  |
| `applyLayout(save)` | 116 |  |
| `loadLayoutPreference()` | 136 |  |
| `load()` | 146 |  |

## API endpoints it calls

- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)
- [api/system/get_user_preference.php](/code/files/api/system/get_user_preference.php.md)

## Loaded by

- [lms/my-courses.php](/code/files/lms/my-courses.php.md)

