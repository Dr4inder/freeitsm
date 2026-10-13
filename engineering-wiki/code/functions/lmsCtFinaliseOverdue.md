# lmsCtFinaliseOverdue()

Close every sitting whose clock has run out. Cheap; called whenever results are read.

```php
function lmsCtFinaliseOverdue(PDO $conn): int
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 347.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 349 | `lmsCtFinaliseOverdue` | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |

## Calls

[lmsCtFinalise()](/code/functions/lmsCtFinalise.md), [lmsCtState()](/code/functions/lmsCtState.md)

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)

