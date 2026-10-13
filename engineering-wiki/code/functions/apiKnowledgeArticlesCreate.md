# apiKnowledgeArticlesCreate()

POST /knowledge/articles

```php
function apiKnowledgeArticlesCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), line 297.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadArticle()](/code/functions/apiLoadArticle.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeArticle()](/code/functions/apiSerializeArticle.md)

*Nothing calls this function by name.*

