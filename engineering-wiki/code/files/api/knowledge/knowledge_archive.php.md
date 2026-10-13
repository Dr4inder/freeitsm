# api/knowledge/knowledge_archive.php

> API endpoint - 132 lines

API Endpoint: Knowledge article recycle bin operations Actions: list, restore, hard_delete

## The endpoint

| | |
|---|---|
| URL | `api/knowledge/knowledge_archive.php` |
| Protected by | Module access: knowledge (requireModuleAccessJson) |
| Reads | `GET action` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [handleList()](/code/functions/handleList.md) | 51 |  |
| [handleRestore()](/code/functions/handleRestore.md) | 86 |  |
| [handleHardDelete()](/code/functions/handleHardDelete.md) | 92 |  |
| [purgeExpired()](/code/functions/purgeExpired.md) | 98 |  |
| [getRetentionDays()](/code/functions/getRetentionDays.md) | 125 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 62 | `handleList` | read [knowledge_articles](/code/tables/knowledge_articles.md), read [analysts](/code/tables/analysts.md) |  |
| 105 | `purgeExpired` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 114 | `purgeExpired` | **delete** [knowledge_article_versions](/code/tables/knowledge_article_versions.md) |  |
| 115 | `purgeExpired` | **delete** [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 116 | `purgeExpired` | **delete** [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 119 | `purgeExpired` | **delete** [knowledge_tags](/code/tables/knowledge_tags.md), read [knowledge_article_tags](/code/tables/knowledge_article_tags.md) |  |
| 126 | `getRetentionDays` | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

