# apiKnowledgeVersionsGet()

```php
function apiKnowledgeVersionsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), line 357.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 360 | `apiKnowledgeVersionsGet` | read [knowledge_article_versions](/code/tables/knowledge_article_versions.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadArticle()](/code/functions/apiLoadArticle.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

