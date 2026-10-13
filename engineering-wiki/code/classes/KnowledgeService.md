# KnowledgeService

> Class in [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md), line 43

## Methods

| Method | What it does |
|---|---|
| [resolveTenantId()](#resolvetenantid) | Validate a submitted company for an article. |
| [resolveFolderId()](#resolvefolderid) | Validate a submitted folder. |
| [resolveAudience()](#resolveaudience) | Validate a submitted audience. Unlike the read path — which normalises junk down to 'internal' so a bad value can never widen visibility — a WRITE with a bogus audience is a caller bug and is rejected outright, so nobody silently saves an article as internal while believing they published it. |
| [assertCanAccessArticle()](#assertcanaccessarticle) | Refuse to touch an article belonging to a company this actor cannot reach. |
| [saveArticle()](#savearticle) | Create (no id) or update (id present) an article. Returns ['id','created','embedding_generated']. |
| [reindexForSearch()](#reindexforsearch) | Keep the search corpus in step with an article (discussion #53). |
| [archiveArticle()](#archivearticle) | Soft-archive an article (move to recycle bin). 404 if gone, 409 if already archived. |
| [restoreArticle()](#restorearticle) | Restore an archived article. 404 if gone, 409 if not archived. |
| [purgeArticle()](#purgearticle) | Permanently delete an archived article (+ versions/tags, orphan-tag cleanup). 404/409 guards. |
| [loadArticleRow()](#loadarticlerow) | Loads one Knowledge article; throws not found when it does not exist. |
| [setTags()](#settags) | Replace the article's tag set: get-or-create each name, relink (mirrors knowledge_save.php). |
| [updateEmbedding()](#updateembedding) | Regenerate the article's OpenAI embedding — best-effort, after commit, silent on failure. Returns true only if an embedding was stored. No-ops unless `decryptValue()` is loaded and a key is configured (see class header). |
| [resolveAnalyst()](#resolveanalyst) | Validate an analyst id exists + is active (throwing twin of apiResolveAnalyst). |
| [parseDateOnly()](#parsedateonly) | Validate an optional YYYY-MM-DD date (throwing twin of apiParseDateOnly). |

### resolveTenantId

*private static* - line 55

Validate a submitted company for an article.

'' / null => NULL => shared with every company (the default, and what every
pre-multi-tenancy article is). Otherwise it must be a real company the actor
can actually reach — an analyst restricted to two clients must not be able to
file an article against a third, and an API key inherits the same scope.

Returns the id to store, or null for shared.

```php
function resolveTenantId(PDO $conn, ActorContext $ctx, $raw): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$raw` |  |  |  |

### resolveFolderId

*private static* - line 85

Validate a submitted folder.

'' / null => NULL => the root, which is where every article lived before
folders existed and where anything unfiled belongs.

A folder that does not exist is REJECTED rather than quietly becoming the
root: filing a document somewhere and finding it at the top level instead
is the kind of silent miss that makes people distrust the whole tree. Same
reasoning as `resolveAudience()` rejecting a bogus value on the write path
while the read path normalises.

```php
function resolveFolderId(PDO $conn, $raw): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$raw` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 91 | `KnowledgeService::resolveFolderId` | read [knowledge_folders](/code/tables/knowledge_folders.md) |  |

### resolveAudience

*private static* - line 110

Validate a submitted audience. Unlike the read path — which normalises junk down to 'internal' so a bad value can never widen visibility — a WRITE with a bogus audience is a caller bug and is rejected outright, so nobody silently saves an article as internal while believing they published it.

```php
function resolveAudience($raw): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` |  |  |  |

### assertCanAccessArticle

*private static* - line 131

Refuse to touch an article belonging to a company this actor cannot reach.

These mutations previously took a bare id and checked nothing, which was
harmless while Knowledge was install-wide and every analyst could see every
article. Now that articles have owners, an id is a guess away.

A SHARED article (tenant_id NULL) is everyone's, so anyone may act on it.
companyScope null = every company (single-company install, or an all-access
analyst/key).

```php
function assertCanAccessArticle(PDO $conn, ActorContext $ctx, int $articleId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$articleId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 136 | `KnowledgeService::assertCanAccessArticle` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

### saveArticle

*public static* - line 152

Create (no id) or update (id present) an article. Returns ['id','created','embedding_generated'].

```php
function saveArticle(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 218 | `KnowledgeService::saveArticle` | **insert** [knowledge_article_versions](/code/tables/knowledge_article_versions.md) (`article_id`, `version`, `title`, `body`, `saved_by_id`, `saved_datetime`), read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 224 | `KnowledgeService::saveArticle` | **update** [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 280 | `KnowledgeService::saveArticle` | **insert** [knowledge_articles](/code/tables/knowledge_articles.md) (`title`, `body`, `author_id`, `owner_id`, `next_review_date`, `created_datetime`, `modified_datetime`, `is_published`, `view_count`, `tenant_id`, `audience`, `folder_id`) |  |

**Called from:** [api/knowledge/knowledge_bulk_audience.php](/code/files/api/knowledge/knowledge_bulk_audience.php.md), [api/knowledge/knowledge_save.php](/code/files/api/knowledge/knowledge_save.php.md), [api/knowledge/writeup_save.php](/code/files/api/knowledge/writeup_save.php.md), [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### reindexForSearch

*private static* - line 333

Keep the search corpus in step with an article (discussion #53).

Called from every path that writes `knowledge_articles`, which is only
this service — see the note on `searchIndexArticle()` for why articles are
indexed by direct call while tickets go through the dispatch seam.

Never throws. An index that cannot be written must not cost somebody the
article they just saved, and an install that has not run Database
Verification has no corpus at all, which is a normal state rather than a
fault.

```php
function reindexForSearch(PDO $conn, int $articleId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$articleId` | `int` |  |  |

### archiveArticle

*public static* - line 345

Soft-archive an article (move to recycle bin). 404 if gone, 409 if already archived.

```php
function archiveArticle(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 350 | `KnowledgeService::archiveArticle` | **update** [knowledge_articles](/code/tables/knowledge_articles.md) (`is_archived`, `archived_datetime`, `archived_by_id`) |  |

**Called from:** [api/knowledge/knowledge_delete.php](/code/files/api/knowledge/knowledge_delete.php.md), [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md)

### restoreArticle

*public static* - line 367

Restore an archived article. 404 if gone, 409 if not archived.

```php
function restoreArticle(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 372 | `KnowledgeService::restoreArticle` | **update** [knowledge_articles](/code/tables/knowledge_articles.md) (`is_archived`, `archived_datetime`, `archived_by_id`) |  |

**Called from:** [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md), [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md)

### purgeArticle

*public static* - line 386

Permanently delete an archived article (+ versions/tags, orphan-tag cleanup). 404/409 guards.

```php
function purgeArticle(PDO $conn, ActorContext $ctx, int $id): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 394 | `KnowledgeService::purgeArticle` | **delete** [knowledge_article_versions](/code/tables/knowledge_article_versions.md) |  |
| 395 | `KnowledgeService::purgeArticle` | **delete** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 396 | `KnowledgeService::purgeArticle` | **delete** [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 397 | `KnowledgeService::purgeArticle` | **delete** [knowledge_tags](/code/tables/knowledge_tags.md), read [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |

**Called from:** [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md), [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md)

### loadArticleRow

*private static* - line 414

Loads one Knowledge article; throws not found when it does not exist.

```php
function loadArticleRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 416 | `KnowledgeService::loadArticleRow` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

### setTags

*private static* - line 426

Replace the article's tag set: get-or-create each name, relink (mirrors knowledge_save.php).

```php
function setTags(PDO $conn, int $articleId, array $tags): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$articleId` | `int` |  |  |
| `$tags` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 428 | `KnowledgeService::setTags` | **delete** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 434 | `KnowledgeService::setTags` | read [knowledge_tags](/code/tables/knowledge_tags.md) |  |
| 438 | `KnowledgeService::setTags` | **insert** [knowledge_tags](/code/tables/knowledge_tags.md) (`name`, `created_datetime`) |  |
| 441 | `KnowledgeService::setTags` | **insert** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) (`article_id`, `tag_id`) |  |

### updateEmbedding

*private static* - line 451

Regenerate the article's OpenAI embedding — best-effort, after commit, silent on failure. Returns true only if an embedding was stored. No-ops unless `decryptValue()` is loaded and a key is configured (see class header).

```php
function updateEmbedding(PDO $conn, int $articleId, string $title, string $body): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$articleId` | `int` |  |  |
| `$title` | `string` |  |  |
| `$body` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 454 | `KnowledgeService::updateEmbedding` | read [system_settings](/code/tables/system_settings.md) |  |
| 486 | `KnowledgeService::updateEmbedding` | **update** [knowledge_articles](/code/tables/knowledge_articles.md) (`embedding`, `embedding_updated`) |  |

### resolveAnalyst

*private static* - line 498

Validate an analyst id exists + is active (throwing twin of apiResolveAnalyst).

```php
function resolveAnalyst(PDO $conn, int $analystId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 500 | `KnowledgeService::resolveAnalyst` | read [analysts](/code/tables/analysts.md) |  |

### parseDateOnly

*private static* - line 508

Validate an optional YYYY-MM-DD date (throwing twin of apiParseDateOnly).

```php
function parseDateOnly($value, string $field): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

