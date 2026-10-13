# callAnthropic()

One-shot AI call via the shared, provider-agnostic client (Anthropic / OpenAI / OpenRouter). Name kept for backward compatibility with callers. Returns ['content' => string, 'tokens_in' => ?int, 'tokens_out' => ?int, ...].

```php
function callAnthropic(
    array $cfg,
    string $systemPrompt,
    string $userMessage,
    int $maxTokens = 1500
): array
```

Defined in [api/cmdb/_ai_helpers.php](/code/files/api/cmdb/_ai_helpers.php.md), line 36.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$systemPrompt` | `string` |  |  |
| `$userMessage` | `string` |  |  |
| `$maxTokens` | `int` | `1500` |  |

**Returns:** `array`

## Calls

[aiProviderChat()](/code/functions/aiProviderChat.md)

## Called from

- [api/cmdb/ai_suggest_properties.php](/code/files/api/cmdb/ai_suggest_properties.php.md)
- [api/cmdb/ai_suggest_questions.php](/code/files/api/cmdb/ai_suggest_questions.php.md)
- [api/cmdb/generate_object_summary.php](/code/files/api/cmdb/generate_object_summary.php.md)

