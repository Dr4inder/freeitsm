# lmsCtAttach()

Put bank questions on a test (already-there ones are skipped). Returns how many were added.

```php
function lmsCtAttach(PDO $conn, int $testId, array $questionIds): int
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 203.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$testId` | `int` |  |  |
| `$questionIds` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 206 | `lmsCtAttach` | **insert** [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) (`test_id`, `question_id`, `sort_order`) |  |

## Calls

[lmsCtNextSort()](/code/functions/lmsCtNextSort.md)

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)

