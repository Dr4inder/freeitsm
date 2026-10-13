# lmsCtParseDrafts()

The model's reply -> validated drafts. Separate from the call so the parsing can be tested against sample replies without spending anything.

```php
function lmsCtParseDrafts(
    string $content,
    string $skill,
    string $difficulty,
    string $format,
    array $marks
): array
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 426.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$content` | `string` |  |  |
| `$skill` | `string` |  |  |
| `$difficulty` | `string` |  |  |
| `$format` | `string` |  |  |
| `$marks` | `array` |  |  |

**Returns:** `array`

## Calls

[lmsCtValidateQuestion()](/code/functions/lmsCtValidateQuestion.md), [parseClaudeJson()](/code/functions/parseClaudeJson.md)

## Called from

- [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) - in [lmsCtGenerate()](/code/functions/lmsCtGenerate.md)

