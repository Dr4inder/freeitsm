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
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):212 |  | update | `skill`, `difficulty`, `format`, `question_count`, `sort_order` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):213 |  | insert | `test_id`, `skill`, `difficulty`, `format`, `question_count`, `sort_order` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):223 |  | delete |  |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):241 |  | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md) | L79, L95, L251 |  |

