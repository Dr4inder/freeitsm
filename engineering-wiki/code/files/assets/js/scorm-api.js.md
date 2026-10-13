# assets/js/scorm-api.js

> JavaScript - 245 lines

SCORM API Bridge

Provides both SCORM 1.1/1.2 (window.API) and SCORM 2004 (window.API_1484_11)
objects. SCORM content running in the iframe walks up the frame tree to find
these objects and calls their methods to read/write learner data.

Requires window.SCORM_CONFIG = { courseId, analystId, scormVersion, apiEndpoint }

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadCmiData()` | 28 |  |
| `saveCmiData()` | 44 |  |
| `doInitialize()` | 67 |  |
| `doFinish()` | 79 |  |
| `doGetValue(element)` | 95 |  |
| `doSetValue(element, value)` | 123 |  |
| `doCommit()` | 147 |  |
| `doGetLastError()` | 157 |  |
| `doGetErrorString(code)` | 170 | i18n-exempt: these strings are defined by the SCORM 2004 run-time specification, not by FreeITSM. They are returned to the CONTENT PACKAGE through `GetErrorString()`, which compares them and logs them; a course built to the spec expects "Not Initialized" in English whatever language the learner reads. Translating them would break conformance, and no learner ever sees them. The header block above says the same for Content-Type, which is an HTTP header name. |
| `doGetDiagnostic(code)` | 185 |  |
| `isReadOnly(element)` | 191 |  |
| `getChildrenFor(element)` | 209 |  |

## Loaded by

- [lms/player.php](/code/files/lms/player.php.md)
- [self-service/course.php](/code/files/self-service/course.php.md)

