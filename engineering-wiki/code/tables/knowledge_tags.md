# knowledge_tags

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `name` | `VARCHAR(50) NOT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md):134 | `purgeExpired` | delete |  |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md):155 | `apiKnowledgePurgeExpired` | delete |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):397 | `KnowledgeService::purgeArticle` | delete |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):438 | `KnowledgeService::setTags` | insert | `name`, `created_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/knowledge/knowledge_article.php](/code/files/api/knowledge/knowledge_article.php.md) | L69 |  |
| [api/knowledge/knowledge_articles.php](/code/files/api/knowledge/knowledge_articles.php.md) | L99 |  |
| [api/knowledge/knowledge_tags.php](/code/files/api/knowledge/knowledge_tags.php.md) | L39 |  |
| [api/self-service/get_knowledge_article.php](/code/files/api/self-service/get_knowledge_article.php.md) | L61 |  |
| [api/self-service/get_knowledge_articles.php](/code/files/api/self-service/get_knowledge_articles.php.md) | L91 |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md) | apiKnowledgeTags L66, apiKnowledgeArticlesList L180, apiKnowledgeTagsList L397 |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md) | KnowledgeService::setTags L434 |  |

