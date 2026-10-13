# apiKnowledgeArticlesRestore()

POST /knowledge/articles/{id}/restore - brings an article back from the recycle bin through KnowledgeService and returns it.

```php
function apiKnowledgeArticlesRestore(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), line 328.

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

