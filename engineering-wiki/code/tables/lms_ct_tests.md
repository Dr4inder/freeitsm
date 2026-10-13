# lms_ct_tests

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `title` | `VARCHAR(200) NOT NULL` |  |
| `role_description` | `TEXT NULL` |  |
| `time_limit_minutes` | `INT NULL` |  |
| `pass_mark` | `INT NULL` |  |
| `is_archived` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `created_by_analyst_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):198 |  | update | `title`, `role_description`, `time_limit_minutes`, `pass_mark`, `updated_datetime` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):204 |  | insert | `title`, `role_description`, `time_limit_minutes`, `pass_mark`, `created_by_analyst_id`, `created_datetime` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):237 |  | update | `is_archived`, `updated_datetime` |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):242 |  | delete |  |  |
| [api/lms/tests.php](/code/files/api/lms/tests.php.md):291 |  | update | `updated_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/lms/tests.php](/code/files/api/lms/tests.php.md) | ctLoadSitting L64, L79, L91, L137, L200, L251 ... |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) | lmsCtBuildSnapshot L222 |  |

