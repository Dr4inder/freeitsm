# assets/js/lms.js

> JavaScript - 882 lines

LMS Dashboard JavaScript Handles CRUD for courses, learning groups, assignments, and progress tracking.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `init()` | 19 |  |
| `openCreateModal()` | 34 |  |
| `createCourse(e)` | 41 |  |
| `switchTab(tab)` | 64 |  |
| `loadCourses()` | 79 |  |
| `renderCourses()` | 90 |  |
| `openUploadModal()` | 129 |  |
| `uploadCourse(e)` | 138 |  |
| `deleteCourse(id)` | 188 |  |
| `loadGroups()` | 205 |  |
| `renderGroups()` | 216 |  |
| `loadAnalysts()` | 236 |  |
| `openGroupModal(group = null)` | 244 |  |
| `editGroup(id)` | 260 |  |
| `saveGroup(e)` | 265 |  |
| `deleteGroup(id)` | 304 |  |
| `loadAssignments()` | 320 |  |
| `renderAssignments()` | 331 |  |
| `openAssignModal(assignmentId)` | 365 | Create, or edit an existing assignment when given its id. |
| `assignTargetChanged()` | 453 |  |
| `searchAssignPeople()` | 464 |  |
| `saveAssignment(e)` | 498 |  |
| `deleteAssignment(id)` | 547 |  |
| `loadProgress()` | 563 |  |
| `fillAnalystFilter(learners, current)` | 615 |  |
| `renderProgress(data)` | 626 |  |
| `viewLearnerData(learnerKey, courseId)` | 676 |  |
| `formatTime(timeStr)` | 802 |  |
| `formatJson(obj, indent = 0)` | 826 |  |
| `openModal(id)` | 850 |  |
| `closeModal(id)` | 851 |  |
| `esc(str)` | 856 |  |
| `statusText(status)` | 866 |  |

## Loaded by

- [lms/index.php](/code/files/lms/index.php.md)

