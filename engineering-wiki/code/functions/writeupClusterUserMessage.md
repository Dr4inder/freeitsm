# writeupClusterUserMessage()

Build the user message for a cluster write-up: the richest ticket as the source, the rest as evidence of how the question gets asked.

```php
function writeupClusterUserMessage(
    array $bundle,
    array $otherSubjects,
    int $count,
    string $answers = ''
): string
```

Defined in [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md), line 739.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$bundle` | `array` |  |  |
| `$otherSubjects` | `array` |  |  |
| `$count` | `int` |  |  |
| `$answers` | `string` | `''` |  |

**Returns:** `string`

## Called from

- [api/knowledge/writeup_stream.php](/code/files/api/knowledge/writeup_stream.php.md)

