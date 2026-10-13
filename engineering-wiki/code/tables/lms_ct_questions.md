# lms_ct_questions

LMS competency tests (3.0.0) The question bank. answers_json is [{"text":..., "marks":n}] - a choice question has one answer worth 1, a graded one four worth e.g. 5/3/1/0. status: draft (written, not yet checked) | approved | hidden.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `skill` | `VARCHAR(120) NOT NULL` |  |
| `difficulty` | `VARCHAR(20) NOT NULL` |  |
| `format` | `VARCHAR(20) NOT NULL` |  |
| `question_text` | `TEXT NOT NULL` |  |
| `answers_json` | `TEXT NOT NULL` |  |
| `explanation` | `TEXT NULL` |  |
| `status` | `VARCHAR(20) NOT NULL DEFAULT 'draft'` |  |
| `source` | `VARCHAR(20) NOT NULL DEFAULT 'ai'` |  |
| `role_context` | `VARCHAR(255) NULL` |  |
| `created_by_analyst_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):332 |  | update | `skill`, `difficulty`, `format`, `question_text`, `answers_json`, `explanation`, `status`, `updated_datetime` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):349 |  | update | `status`, `updated_datetime` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):357 |  | delete |  |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md):171 | `lmsCtInsertQuestion` | insert | `skill`, `difficulty`, `format`, `question_text`, `answers_json`, `explanation`, `status`, `source`, `role_context`, `created_by_analyst_id` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md) | L79, L118, L128, L257, L265, L281 ... |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) | lmsCtTestQuestions L185 |  |

