# lmsCtInsertQuestion()

Insert a validated question into the bank.

```php
function lmsCtInsertQuestion(
    PDO $conn,
    array $q,
    string $source,
    ?string $role,
    ?int $analystId
): int
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 167.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$q` | `array` |  |  |
| `$source` | `string` |  |  |
| `$role` | `?string` |  |  |
| `$analystId` | `?int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 169 | `lmsCtInsertQuestion` | **insert** [lms_ct_questions](/code/tables/lms_ct_questions.md) (`skill`, `difficulty`, `format`, `question_text`, `answers_json`, `explanation`, `status`, `source`, `role_context`, `created_by_analyst_id`, `created_datetime`) |  |

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)

