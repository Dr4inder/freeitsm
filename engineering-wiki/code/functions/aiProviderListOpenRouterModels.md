# aiProviderListOpenRouterModels()

Fetch (and cache) the OpenRouter model catalogue. No API key required. Cached in system_settings as JSON for 24h to keep the model picker snappy. Falls back to a stale cache if a refresh fetch fails.

```php
function aiProviderListOpenRouterModels(PDO $conn, bool $force = false): array
```

Defined in [includes/ai_provider.php](/code/files/includes/ai_provider.php.md), line 745.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$force` | `bool` | `false` |  |

**Returns:** array{models: array<int,array>, cached_at: int, stale: bool} models: [{id,name,context_length,prompt_price,completion_price}]

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 748 | `aiProviderListOpenRouterModels` | read [system_settings](/code/tables/system_settings.md) |  |
| 800 | `aiProviderListOpenRouterModels` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/system/ai/openrouter_models.php](/code/files/api/system/ai/openrouter_models.php.md)

