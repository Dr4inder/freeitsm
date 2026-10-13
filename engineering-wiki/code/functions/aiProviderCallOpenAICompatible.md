# aiProviderCallOpenAICompatible()

The OpenAI chat-completions wire format, at whatever URL and behind whatever auth header the caller names.

⚠️ It takes a FULL URL and an AUTH HEADER LIST rather than a base and a key,
because Azure differs in exactly those two places (a required query string,
and `api-key:` instead of `Authorization: Bearer`). Passing them in keeps one
copy of the body-building, response-parsing and reasoning-token handling
below — all of which Azure shares — instead of a near-identical second one
that would drift.

An empty `$model` omits the field entirely, which is what a deployment-based
endpoint wants.

```php
function aiProviderCallOpenAICompatible(
    string $url,
    string $model,
    array $authHeaders,
    bool $verify,
    array $opts,
    array $extraHeaders = []
): array
```

Defined in [includes/ai_provider.php](/code/files/includes/ai_provider.php.md), line 267.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$model` | `string` |  |  |
| `$authHeaders` | `array` |  |  |
| `$verify` | `bool` |  |  |
| `$opts` | `array` |  |  |
| `$extraHeaders` | `array` | `[]` |  |

**Returns:** `array`

## Calls

[aiOpenAICompatPost()](/code/functions/aiOpenAICompatPost.md)

## Called from

- [includes/ai_provider.php](/code/files/includes/ai_provider.php.md) - in [aiProviderChat()](/code/functions/aiProviderChat.md)

