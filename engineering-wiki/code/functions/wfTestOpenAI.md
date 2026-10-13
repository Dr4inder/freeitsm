# wfTestOpenAI()

Sends a tiny prompt to the OpenAI Chat Completions API to prove the key and model work, and returns the reply text with the token counts.

Throws with the provider's own error message (or the HTTP code) when the call fails.

```php
function wfTestOpenAI(string $apiKey, string $model, bool $verifySsl): array
```

Defined in [api/workflow/test_ai_key.php](/code/files/api/workflow/test_ai_key.php.md), line 131.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$apiKey` | `string` |  |  |
| `$model` | `string` |  |  |
| `$verifySsl` | `bool` |  |  |

**Returns:** `array`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md), [workflowEffectiveSslVerify()](/code/functions/workflowEffectiveSslVerify.md)

## Called from

- [api/workflow/test_ai_key.php](/code/files/api/workflow/test_ai_key.php.md)

