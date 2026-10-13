# rfpAiHttpPostWithRetry()

POST with retry on 429 / 5xx / network errors. Exponential backoff starting at RFP_AI_RETRY_BACKOFF_MS. Throws on final failure.

```php
function rfpAiHttpPostWithRetry(string $url, array $headers, string $body, bool $verifySsl): array
```

Defined in [includes/rfp_ai.php](/code/files/includes/rfp_ai.php.md), line 406.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$headers` | `array` |  |  |
| `$body` | `string` |  |  |
| `$verifySsl` | `bool` |  |  |

**Returns:** `array`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/rfp_ai.php](/code/files/includes/rfp_ai.php.md) - in [rfpAiCallAnthropic()](/code/functions/rfpAiCallAnthropic.md), [rfpAiCallOpenAI()](/code/functions/rfpAiCallOpenAI.md)

