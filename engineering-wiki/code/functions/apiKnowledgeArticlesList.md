# apiKnowledgeArticlesList()

```php
function apiKnowledgeArticlesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), line 161.

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
| 178 | `apiKnowledgeArticlesList` | read [knowledge_article_tags](/code/tables/knowledge_article_tags.md), read [knowledge_tags](/code/tables/knowledge_tags.md) |  |
| 258 | `apiKnowledgeArticlesList` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKnowledgePurgeExpired()](/code/functions/apiKnowledgePurgeExpired.md), [apiKnowledgeSelect()](/code/functions/apiKnowledgeSelect.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeArticle()](/code/functions/apiSerializeArticle.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md)

*Nothing calls this function by name.*

