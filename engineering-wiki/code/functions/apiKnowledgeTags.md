# apiKnowledgeTags()

The names of an article's tags, alphabetically.

```php
function apiKnowledgeTags(PDO $conn, int $articleId): array
```

Defined in [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), line 64.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$articleId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 66 | `apiKnowledgeTags` | read [knowledge_article_tags](/code/tables/knowledge_article_tags.md), read [knowledge_tags](/code/tables/knowledge_tags.md) |  |

## Called from

- [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md) - in [apiSerializeArticle()](/code/functions/apiSerializeArticle.md)

