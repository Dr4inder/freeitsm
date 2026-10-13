# wfCallAnthropic()

Sends a system prompt and one user message to the Anthropic Messages API and returns the reply text, trimmed.

Throws on a network error or a non-200 answer, with the provider's own message where
it gave one.

```php
function wfCallAnthropic(
    array $cfg,
    string $systemPrompt,
    string $userMessage,
    int $maxTokens
): string
```

Defined in [api/workflow/_ai_helpers.php](/code/files/api/workflow/_ai_helpers.php.md), line 117.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$systemPrompt` | `string` |  |  |
| `$userMessage` | `string` |  |  |
| `$maxTokens` | `int` |  |  |

**Returns:** `string`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md), [workflowEffectiveSslVerify()](/code/functions/workflowEffectiveSslVerify.md)

*Nothing calls this function by name.*

