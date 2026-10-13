# aiProviderCallAnthropic()

Sends one system + user prompt to the Anthropic Messages API and returns the joined text blocks with token counts and the stop reason.

```php
function aiProviderCallAnthropic(string $model, string $apiKey, bool $verify, array $opts): array
```

Defined in [includes/ai_provider.php](/code/files/includes/ai_provider.php.md), line 155.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$model` | `string` |  |  |
| `$apiKey` | `string` |  |  |
| `$verify` | `bool` |  |  |
| `$opts` | `array` |  |  |

**Returns:** array  {content, tokens_in, tokens_out, finish_reason, reasoning_tokens (always null here)}

## Calls

[aiProviderHttpPost()](/code/functions/aiProviderHttpPost.md)

## Called from

- [includes/ai_provider.php](/code/files/includes/ai_provider.php.md) - in [aiProviderChat()](/code/functions/aiProviderChat.md)

