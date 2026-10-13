# knowledge_article_tags

## Columns

| Column | Definition | Notes |
|---|---|---|
| `article_id` | `INT NOT NULL` |  |
| `tag_id` | `INT NOT NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md):130 | `purgeExpired` | delete |  |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md):153 | `apiKnowledgePurgeExpired` | delete |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):395 | `KnowledgeService::purgeArticle` | delete |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):428 | `KnowledgeService::setTags` | delete |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):441 | `KnowledgeService::setTags` | insert | `article_id`, `tag_id` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md) | purgeExpired L134 |  |
| [api/knowledge/knowledge_article.php](/code/files/api/knowledge/knowledge_article.php.md) | L69 |  |
| [api/knowledge/knowledge_articles.php](/code/files/api/knowledge/knowledge_articles.php.md) | L87, L99 |  |
| [api/knowledge/knowledge_tags.php](/code/files/api/knowledge/knowledge_tags.php.md) | L39 |  |
| [api/self-service/get_knowledge_article.php](/code/files/api/self-service/get_knowledge_article.php.md) | L61 |  |
| [api/self-service/get_knowledge_articles.php](/code/files/api/self-service/get_knowledge_articles.php.md) | L91 |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md) | apiKnowledgeTags L66, apiKnowledgePurgeExpired L155, apiKnowledgeArticlesList L180, apiKnowledgeTagsList L397 |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md) | KnowledgeService::purgeArticle L397 |  |

