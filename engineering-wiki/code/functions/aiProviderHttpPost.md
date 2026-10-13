# aiProviderHttpPost()

POST with retry/backoff on 429 / 5xx / network errors. Ported from rfpAiHttpPostWithRetry so this file stands alone.

```php
function aiProviderHttpPost(string $url, array $headers, string $body, bool $verifySsl): array
```

Defined in [includes/ai_provider.php](/code/files/includes/ai_provider.php.md), line 674.

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

- [includes/ai_provider.php](/code/files/includes/ai_provider.php.md) - in [aiProviderCallAnthropic()](/code/functions/aiProviderCallAnthropic.md), [aiOpenAICompatPost()](/code/functions/aiOpenAICompatPost.md), [aiProviderChatTools()](/code/functions/aiProviderChatTools.md)

