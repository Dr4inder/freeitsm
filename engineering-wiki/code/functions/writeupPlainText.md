# writeupPlainText()

Strip HTML, entities, quoted reply chains and signatures down to readable text.

```php
function writeupPlainText(?string $html, int $maxChars = 4000): string
```

Defined in [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md), line 141.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$html` | `?string` |  |  |
| `$maxChars` | `int` | `4000` |  |

**Returns:** `string`

## Called from

- [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md) - in [writeupTicketBundle()](/code/functions/writeupTicketBundle.md), [writeupEmbeddingText()](/code/functions/writeupEmbeddingText.md)

