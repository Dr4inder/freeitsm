# rfpTestOpenAI()

Sends a tiny prompt to the OpenAI Chat Completions API to prove the key and model work, and returns the reply text with the token counts.

Throws with the provider's own error message (or the HTTP code) when the call fails.

```php
function rfpTestOpenAI(string $apiKey, string $model, bool $verifySsl): array
```

Defined in [api/rfp-builder/test_ai_connection.php](/code/files/api/rfp-builder/test_ai_connection.php.md), line 134.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$apiKey` | `string` |  |  |
| `$model` | `string` |  |  |
| `$verifySsl` | `bool` |  |  |

**Returns:** `array`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/rfp-builder/test_ai_connection.php](/code/files/api/rfp-builder/test_ai_connection.php.md)

