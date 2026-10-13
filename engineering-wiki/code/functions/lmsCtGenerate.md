# lmsCtGenerate()

Ask the AI for `$count` questions on one skill. Returns validated DRAFTS (not saved). A graded question comes back best-to-worst and is given the install's marks in that order; the candidate sees them shuffled.

```php
function lmsCtGenerate(
    array $cfg,
    string $role,
    string $skill,
    string $difficulty,
    string $format,
    int $count,
    array $avoid,
    array $marks
): array
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 386.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$role` | `string` |  |  |
| `$skill` | `string` |  |  |
| `$difficulty` | `string` |  |  |
| `$format` | `string` |  |  |
| `$count` | `int` |  |  |
| `$avoid` | `array` |  |  |
| `$marks` | `array` |  |  |

**Returns:** `array`

## Calls

[aiProviderChat()](/code/functions/aiProviderChat.md), [lmsCtParseDrafts()](/code/functions/lmsCtParseDrafts.md)

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)

