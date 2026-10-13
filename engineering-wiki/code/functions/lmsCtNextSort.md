# lmsCtNextSort()

Next sort position on a test.

```php
function lmsCtNextSort(PDO $conn, int $testId): int
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 195.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$testId` | `int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 197 | `lmsCtNextSort` | read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) |  |

## Called from

- [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) - in [lmsCtAttach()](/code/functions/lmsCtAttach.md)

