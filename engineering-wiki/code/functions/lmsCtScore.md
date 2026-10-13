# lmsCtScore()

Score a snapshot against the candidate's answers ({question index: answer index}). Each question counts equally: marks chosen / best marks on offer. Unanswered scores 0. Returns [overall percent, per-skill breakdown].

```php
function lmsCtScore(array $snapshot, array $responses): array
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 313.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$snapshot` | `array` |  |  |
| `$responses` | `array` |  |  |

**Returns:** `array`

## Called from

- [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) - in [lmsCtFinalise()](/code/functions/lmsCtFinalise.md)

