# formsTestOpenAI()

Sends a tiny prompt to the OpenAI Chat Completions API to prove the key and model work, and returns the reply text with the token counts.

Throws with the provider's own error message (or the HTTP code) when the call fails.

```php
function formsTestOpenAI(string $apiKey, string $model, bool $verifySsl): array
```

Defined in [api/forms/test_ai_key.php](/code/files/api/forms/test_ai_key.php.md), line 132.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$apiKey` | `string` |  |  |
| `$model` | `string` |  |  |
| `$verifySsl` | `bool` |  |  |

**Returns:** `array`

## Calls

[formsEffectiveSslVerify()](/code/functions/formsEffectiveSslVerify.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/forms/test_ai_key.php](/code/files/api/forms/test_ai_key.php.md)

