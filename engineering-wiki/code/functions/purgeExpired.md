# purgeExpired()

```php
function purgeExpired($conn)
```

Defined in [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md), line 98.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 105 | `purgeExpired` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 114 | `purgeExpired` | **delete** [knowledge_article_versions](/code/tables/knowledge_article_versions.md) |  |
| 115 | `purgeExpired` | **delete** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 116 | `purgeExpired` | **delete** [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 119 | `purgeExpired` | **delete** [knowledge_tags](/code/tables/knowledge_tags.md), read [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |

## Calls

[getRetentionDays()](/code/functions/getRetentionDays.md)

## Called from

- [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md) - in [handleList()](/code/functions/handleList.md)

