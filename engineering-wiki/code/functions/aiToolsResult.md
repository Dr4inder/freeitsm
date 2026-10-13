# aiToolsResult()

Shared return shape for aiProviderChatTools.

```php
function aiToolsResult(
    string $content,
    array $calls,
    int $tokIn,
    int $tokOut,
    string $provider,
    string $model,
    float $start
): array
```

Defined in [includes/ai_provider.php](/code/files/includes/ai_provider.php.md), line 661.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$content` | `string` |  |  |
| `$calls` | `array` |  |  |
| `$tokIn` | `int` |  |  |
| `$tokOut` | `int` |  |  |
| `$provider` | `string` |  |  |
| `$model` | `string` |  |  |
| `$start` | `float` |  |  |

**Returns:** `array`

## Called from

- [includes/ai_provider.php](/code/files/includes/ai_provider.php.md) - in [aiProviderChatTools()](/code/functions/aiProviderChatTools.md)

