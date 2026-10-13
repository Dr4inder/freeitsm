# knowledge_articles

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `body` | `LONGTEXT NULL` |  |
| `author_id` | `INT NOT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `modified_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_published` | `TINYINT(1) NULL DEFAULT 1` |  |
| `view_count` | `INT NULL DEFAULT 0` |  |
| `next_review_date` | `DATE NULL` |  |
| `owner_id` | `INT NULL` |  |
| `embedding` | `LONGTEXT NULL` |  |
| `embedding_updated` | `DATETIME NULL` |  |
| `is_archived` | `TINYINT(1) NULL DEFAULT 0` |  |
| `archived_datetime` | `DATETIME NULL` |  |
| `archived_by_id` | `INT NULL` |  |
| `version` | `INT NOT NULL DEFAULT 1` |  |
| `tenant_id` | `INT NULL` | Which company OWNS the article. ⚠️ NULL = SHARED WITH EVERY COMPANY here, NOT "belongs to Default" as it does for tickets/assets — Knowledge has its own filter helper for exactly this reason (see includes/tenancy.php). NULL is also the zero-migration default: existing articles stay shared, which is precisely today's behaviour. |
| `audience` | `VARCHAR(20) NOT NULL DEFAULT 'internal'` | WHO may read it: 'internal' \| 'customer' \| 'public'. Defaults to 'internal' so running Database Verify can NEVER start disclosing existing articles to anonymous web chat visitors — authors opt in per article. |
| `folder_id` | `INT NULL` | ── Folders and per-document permissions ──────────────────────────── Which folder the article lives in. NULL = the root, which is where every existing article lands on upgrade: zero migration, and the resulting state (root, inheriting, unrestricted) is indistinguishable from how the module behaved before folders existed. |
| `is_restricted` | `TINYINT(1) NOT NULL DEFAULT 0` | 0 = Open: readable unless a DENY names you. 1 = Restricted: readable only if a GRANT names you. The polarity lives on the OBJECT, never on the access rows, so an allow and a deny cannot coexist and there is no precedence rule. |
| `inherit_permissions` | `TINYINT(1) NOT NULL DEFAULT 1` | 1 = take permissions from the parent folder and ignore my own rows. Default 1 so an upgraded install inherits from a root that restricts nothing — i.e. nothing changes. |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md):303 | `handleMoveArticle` | update | `folder_id`, `modified_datetime` |  |
| [api/knowledge/generate_embedding.php](/code/files/api/knowledge/generate_embedding.php.md):129 |  | update | `embedding`, `embedding_updated` |  |
| [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md):116 | `purgeExpired` | delete |  |  |
| [api/knowledge/knowledge_article.php](/code/files/api/knowledge/knowledge_article.php.md):79 |  | update | `view_count` |  |
| [api/self-service/get_knowledge_article.php](/code/files/api/self-service/get_knowledge_article.php.md):74 |  | update | `view_count` |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md):152 | `apiKnowledgePurgeExpired` | delete |  |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md):285 | `apiKnowledgeArticlesGet` | update | `view_count` |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):224 | `KnowledgeService::saveArticle` | update |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):280 | `KnowledgeService::saveArticle` | insert | `title`, `body`, `author_id`, `owner_id`, `next_review_date`, `created_datetime`, `modified_datetime`, `is_published`, `view_count`, `tenant_id` |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):350 | `KnowledgeService::archiveArticle` | update | `is_archived`, `archived_datetime`, `archived_by_id` |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):372 | `KnowledgeService::restoreArticle` | update | `is_archived`, `archived_datetime`, `archived_by_id` |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):396 | `KnowledgeService::purgeArticle` | delete |  |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md):485 | `KnowledgeService::updateEmbedding` | update | `embedding`, `embedding_updated` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/files/shortcut.php](/code/files/api/files/shortcut.php.md) | L38, L59 |  |
| [api/knowledge/ai_chat.php](/code/files/api/knowledge/ai_chat.php.md) | L148, L166, L204, L214, L219, L225 |  |
| [api/knowledge/folders.php](/code/files/api/knowledge/folders.php.md) | handleList L87, handleList L94, handleDelete L251, handleAddShortcut L343, handleExceptions L416 |  |
| [api/knowledge/gap_clusters.php](/code/files/api/knowledge/gap_clusters.php.md) | L60 |  |
| [api/knowledge/generate_embedding.php](/code/files/api/knowledge/generate_embedding.php.md) | L59 |  |
| [api/knowledge/get_articles_for_embedding.php](/code/files/api/knowledge/get_articles_for_embedding.php.md) | L33 |  |
| [api/knowledge/get_embedding_stats.php](/code/files/api/knowledge/get_embedding_stats.php.md) | L34, L40 |  |
| [api/knowledge/get_review_list.php](/code/files/api/knowledge/get_review_list.php.md) | L34, L88 |  |
| [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md) | handleList L62, purgeExpired L105 |  |
| [api/knowledge/knowledge_article.php](/code/files/api/knowledge/knowledge_article.php.md) | L35 |  |
| [api/knowledge/knowledge_articles.php](/code/files/api/knowledge/knowledge_articles.php.md) | L39 |  |
| [api/knowledge/knowledge_tags.php](/code/files/api/knowledge/knowledge_tags.php.md) | L39 |  |
| [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md) | handlePreview L125 |  |
| [api/knowledge/permissions.php](/code/files/api/knowledge/permissions.php.md) | resolveInherited L156 |  |
| [api/lms/ai_author.php](/code/files/api/lms/ai_author.php.md) | L87 |  |
| [api/lms/knowledge_articles.php](/code/files/api/lms/knowledge_articles.php.md) | L27 |  |
| [api/self-service/get_knowledge_article.php](/code/files/api/self-service/get_knowledge_article.php.md) | L46 |  |
| [api/self-service/get_knowledge_articles.php](/code/files/api/self-service/get_knowledge_articles.php.md) | L72 |  |
| [api/system/global_search.php](/code/files/api/system/global_search.php.md) | L276, L604 |  |
| [api/system/search_status.php](/code/files/api/system/search_status.php.md) | L75 |  |
| [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md) | apiKeyCanAccessArticle L320 |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md) | apiKnowledgeSelect L50, apiKnowledgePurgeExpired L144, apiKnowledgeArticlesList L258, apiKnowledgeTagsList L383 |  |
| [includes/domains/links.php](/code/files/includes/domains/links.php.md) | domainLinkDescribe L154, domainLinkSearch L243 |  |
| [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md) | filesArticleTarget L181 |  |
| [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) | gapAnalyse L217 |  |
| [includes/knowledge/kb_ai.php](/code/files/includes/knowledge/kb_ai.php.md) | kbRetrieveArticles L127, kbRetrieveArticles L135, kbRetrieveArticles L153 |  |
| [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) | knowledgeCanRead L408, knowledgeAclSql L554, knowledgeAclHasAnyRows L779 |  |
| [includes/lms/knowledge_source.php](/code/files/includes/lms/knowledge_source.php.md) | lmsCanUseArticle L56 |  |
| [includes/mcp/tools.php](/code/files/includes/mcp/tools.php.md) | mcpToolSearchKnowledge L299 |  |
| [includes/projects/links.php](/code/files/includes/projects/links.php.md) | projectLinkDescribe L215, projectLinkSearch L324 |  |
| [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) | recentTrailLabelsForType L525 |  |
| [includes/record_preview.php](/code/files/includes/record_preview.php.md) | recordPreviewKnowledgeArticle L423 |  |
| [includes/search/backfill.php](/code/files/includes/search/backfill.php.md) | searchBackfillRun L122 |  |
| [includes/search/indexer.php](/code/files/includes/search/indexer.php.md) | searchIndexArticle L340 |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md) | KnowledgeService::assertCanAccessArticle L136, KnowledgeService::saveArticle L218, KnowledgeService::loadArticleRow L415 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::raid L739 |  |
| [includes/tenancy.php](/code/files/includes/tenancy.php.md) | analystCanAccessArticle L958 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolSearchKnowledge L889 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L685, getWatchtowerData L696 |  |

