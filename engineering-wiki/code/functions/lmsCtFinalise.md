# lmsCtFinalise()

Close a sitting and store its score. Only the first close counts.

```php
function lmsCtFinalise(PDO $conn, array $s, string $reason): bool
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 336.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$s` | `array` |  |  |
| `$reason` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 342 | `lmsCtFinalise` | **update** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) (`submitted_datetime`, `finish_reason`, `score_percent`, `skills_json`) |  |

## Calls

[lmsCtDeadline()](/code/functions/lmsCtDeadline.md), [lmsCtScore()](/code/functions/lmsCtScore.md)

## Called from

- [api/lms/test_public.php](/code/files/api/lms/test_public.php.md)
- [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) - in [lmsCtFinaliseOverdue()](/code/functions/lmsCtFinaliseOverdue.md)
- [lms/test.php](/code/files/lms/test.php.md)

