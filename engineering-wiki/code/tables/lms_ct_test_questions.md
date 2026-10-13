# lms_ct_test_questions

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `test_id` | `INT NOT NULL` |  |
| `question_id` | `INT NOT NULL` |  |
| `sort_order` | `INT NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):234 |  | delete |  |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):307 |  | delete |  |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):315 |  | update | `sort_order` |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md):204 | `lmsCtAttach` | insert | `test_id`, `question_id`, `sort_order` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md) | L73, L112, L251, L259 |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) | lmsCtTestQuestions L183, lmsCtNextSort L195 |  |

