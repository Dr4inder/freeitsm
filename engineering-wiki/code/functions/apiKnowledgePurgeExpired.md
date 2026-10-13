# apiKnowledgePurgeExpired()

The recycle bin's retention auto-purge (mirrors knowledge_archive.php).

```php
function apiKnowledgePurgeExpired(PDO $conn): void
```

Defined in [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), line 136.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 138 | `apiKnowledgePurgeExpired` | read [system_settings](/code/tables/system_settings.md) |  |
| 146 | `apiKnowledgePurgeExpired` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 152 | `apiKnowledgePurgeExpired` | **delete** [knowledge_article_versions](/code/tables/knowledge_article_versions.md) |  |
| 153 | `apiKnowledgePurgeExpired` | **delete** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 154 | `apiKnowledgePurgeExpired` | **delete** [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 155 | `apiKnowledgePurgeExpired` | **delete** [knowledge_tags](/code/tables/knowledge_tags.md), read [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |

## Called from

- [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md) - in [apiKnowledgeArticlesList()](/code/functions/apiKnowledgeArticlesList.md)

