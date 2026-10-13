# assets/js/lms.js

> JavaScript - 882 lines

LMS Dashboard JavaScript Handles CRUD for courses, learning groups, assignments, and progress tracking.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `LMS(()` | 5 | LMS Dashboard JavaScript Handles CRUD for courses, learning groups, assignments, and progress tracking. |
| `init()` | 19 | Init |
| `openCreateModal()` | 34 | Creating an authored course Only the shell is made here — the title, the blurb and the pass mark. The lessons are written in the editor, so we go straight there. |
| `createCourse(e)` | 41 |  |
| `switchTab(tab)` | 64 | Tab switching |
| `loadCourses()` | 79 | Courses |
| `renderCourses()` | 90 |  |
| `openUploadModal()` | 129 |  |
| `uploadCourse(e)` | 138 |  |
| `onload()` | 162 |  |
| `onerror()` | 166 |  |
| `deleteCourse(id)` | 188 |  |
| `loadGroups()` | 205 | Learning Groups |
| `renderGroups()` | 216 |  |
| `loadAnalysts()` | 236 |  |
| `openGroupModal(group = null)` | 244 |  |
| `editGroup(id)` | 260 |  |
| `saveGroup(e)` | 265 |  |
| `deleteGroup(id)` | 304 |  |
| `loadAssignments()` | 320 | Assignments |
| `renderAssignments()` | 331 |  |
| `openAssignModal(assignmentId)` | 365 | Create, or edit an existing assignment when given its id. |
| `assignTargetChanged()` | 453 |  |
| `searchAssignPeople()` | 464 |  |
| `saveAssignment(e)` | 498 |  |
| `deleteAssignment(id)` | 547 |  |
| `loadProgress()` | 563 | Progress |
| `fillAnalystFilter(learners, current)` | 615 | Takes `learners` now — analysts AND portal users — each keyed "type:id" rather than by a bare id, because analyst 12 and portal user 12 are two different people and a plain number cannot tell them apart. |
| `renderProgress(data)` | 626 |  |
| `viewLearnerData(learnerKey, courseId)` | 676 | `learnerKey` is "analyst:12" or "user:257". Split from the right, because only the id is guaranteed free of colons. |
| `formatTime(timeStr)` | 802 |  |
| `formatJson(obj, indent = 0)` | 826 |  |
| `openModal(id)` | 850 | Modal helpers |
| `closeModal(id)` | 851 |  |
| `esc(str)` | 856 | Utilities |
| `statusText(status)` | 866 | Translate a normalised LMS status code to its display label. Unknown codes (e.g. SCORM-reported values without a key) fall back to a prettified version of the raw code. |

## Loaded by

- [lms/index.php](/code/files/lms/index.php.md)

