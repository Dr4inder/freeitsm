# api/v1/resources/knowledge.php

> API endpoint - 400 lines

FreeITSM REST API v1 — knowledge resource (Knowledge Base).

Mirrors the module's internal endpoints so an article touched via the API
is indistinguishable from one touched in the UI:
  - create/update mirror api/knowledge/knowledge_save.php: articles are
    created published (there is no draft workflow in the product), tags are
    get-or-created by name and re-linked as a set, "save as version" first
    snapshots the current row into knowledge_article_versions and bumps the
    version number, and — when the module's OpenAI key is configured — the
    search EMBEDDING is regenerated after the save (best-effort, silent on
    failure), so AI chat/vector search keeps working for API-written
    articles.
  - delete/restore/purge mirror the recycle-bin semantics
    (knowledge_delete.php / knowledge_archive.php): DELETE archives,
    restore un-archives, permanent delete only works on archived articles
    and cleans up orphaned tags; listing the bin runs the same retention
    auto-purge the UI runs when the bin is opened.

Deliberate divergence from the UI, documented: GET /knowledge/articles/{id}
does NOT bump view_count unless ?count_view=true is passed — machine reads
(sync jobs, chatbots re-fetching) would otherwise inflate the stats the
review screens rely on.

Articles carry a `company` (knowledge_articles.tenant_id; null = shared with
every company) and an `audience` (internal | customer | public). Lists are
scoped to the key's companies via `apiKeyKnowledgeFilter()` — NOT the generic
`apiKeyTenantFilter()`, because a NULL tenant_id here means "shared with all"
rather than "the Default company's"; see that function's docblock. Bodies are
TinyMCE HTML stored verbatim, exactly like the UI (no server-side
sanitisation exists in the product) — consumers render at their own risk,
and integrations should send trusted HTML only.

Article WRITES (create/update/archive/restore/purge) are delegated to
KnowledgeService (includes/services/knowledge.php); the read handlers,
serializers + the bin's retention auto-purge stay here.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/knowledge.php` |
| Protected by | REST API key |
| Reads | `GET archived`, `GET q`, `GET tag`, `GET review`, `GET modified_since`, `GET company`, `GET audience`, `GET sort`, `GET count_view` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiKnowledgeSelect()](/code/functions/apiKnowledgeSelect.md) | 49 |  |
| [apiKnowledgeTags()](/code/functions/apiKnowledgeTags.md) | 62 |  |
| [apiSerializeArticle()](/code/functions/apiSerializeArticle.md) | 73 | Summary shape (lists) — preview instead of the full body. Detail adds body_html. |
| [apiLoadArticle()](/code/functions/apiLoadArticle.md) | 115 | Load an article by id, 404ing if it's gone. |
| [apiKnowledgePurgeExpired()](/code/functions/apiKnowledgePurgeExpired.md) | 134 | The recycle bin's retention auto-purge (mirrors knowledge_archive.php). |
| [apiKnowledgeArticlesList()](/code/functions/apiKnowledgeArticlesList.md) | 161 |  |
| [apiKnowledgeArticlesGet()](/code/functions/apiKnowledgeArticlesGet.md) | 279 |  |
| [apiKnowledgeArticlesCreate()](/code/functions/apiKnowledgeArticlesCreate.md) | 295 |  |
| [apiKnowledgeArticlesUpdate()](/code/functions/apiKnowledgeArticlesUpdate.md) | 305 |  |
| [apiKnowledgeArticlesDelete()](/code/functions/apiKnowledgeArticlesDelete.md) | 315 |  |
| [apiKnowledgeArticlesRestore()](/code/functions/apiKnowledgeArticlesRestore.md) | 322 |  |
| [apiKnowledgeArticlesPurge()](/code/functions/apiKnowledgeArticlesPurge.md) | 329 |  |
| [apiKnowledgeVersionsList()](/code/functions/apiKnowledgeVersionsList.md) | 339 |  |
| [apiKnowledgeVersionsGet()](/code/functions/apiKnowledgeVersionsGet.md) | 357 |  |
| [apiKnowledgeTagsList()](/code/functions/apiKnowledgeTagsList.md) | 381 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 50 | `apiKnowledgeSelect` | read [knowledge_articles](/code/tables/knowledge_articles.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |
| 64 | `apiKnowledgeTags` | read [knowledge_article_tags](/code/tables/knowledge_article_tags.md), read [knowledge_tags](/code/tables/knowledge_tags.md) |  |
| 136 | `apiKnowledgePurgeExpired` | read [system_settings](/code/tables/system_settings.md) |  |
| 144 | `apiKnowledgePurgeExpired` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 150 | `apiKnowledgePurgeExpired` | **delete** [knowledge_article_versions](/code/tables/knowledge_article_versions.md) |  |
| 151 | `apiKnowledgePurgeExpired` | **delete** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 152 | `apiKnowledgePurgeExpired` | **delete** [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 153 | `apiKnowledgePurgeExpired` | **delete** [knowledge_tags](/code/tables/knowledge_tags.md), read [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 178 | `apiKnowledgeArticlesList` | read [knowledge_article_tags](/code/tables/knowledge_article_tags.md), read [knowledge_tags](/code/tables/knowledge_tags.md) |  |
| 258 | `apiKnowledgeArticlesList` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 285 | `apiKnowledgeArticlesGet` | **update** [knowledge_articles](/code/tables/knowledge_articles.md) (`view_count`) |  |
| 342 | `apiKnowledgeVersionsList` | read [knowledge_article_versions](/code/tables/knowledge_article_versions.md), read [analysts](/code/tables/analysts.md) |  |
| 360 | `apiKnowledgeVersionsGet` | read [knowledge_article_versions](/code/tables/knowledge_article_versions.md), read [analysts](/code/tables/analysts.md) |  |
| 383 | `apiKnowledgeTagsList` | read [knowledge_tags](/code/tables/knowledge_tags.md), read [knowledge_article_tags](/code/tables/knowledge_article_tags.md), read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md), [includes/knowledge/audience.php](/code/files/includes/knowledge/audience.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [knowledgeCanRead()](/code/functions/knowledgeCanRead.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md)

