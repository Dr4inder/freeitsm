# lms_ct_test_skills

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `test_id` | `INT NOT NULL` |  |
| `skill` | `VARCHAR(120) NOT NULL` |  |
| `difficulty` | `VARCHAR(20) NOT NULL` |  |
| `format` | `VARCHAR(20) NOT NULL` |  |
| `question_count` | `INT NOT NULL DEFAULT 5` |  |
| `sort_order` | `INT NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):206 |  | update | `skill`, `difficulty`, `format`, `question_count`, `sort_order` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):207 |  | insert | `test_id`, `skill`, `difficulty`, `format`, `question_count`, `sort_order` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):217 |  | delete |  |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):235 |  | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md) | L73, L89, L245 |  |

