# includes/search/corpus.php

> PHP - 151 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [searchCorpusTicketScope()](/code/functions/searchCorpusTicketScope.md) | 51 | Turn an email/ticket-style tenant_id into the pair the corpus stores. Mirrors `ticketTenantFilter()`'s reading of NULL. |
| [searchCorpusArticleScope()](/code/functions/searchCorpusArticleScope.md) | 61 | Turn a knowledge-article tenant_id into the pair the corpus stores. NULL is the OPPOSITE of the ticket case — see [[project_knowledge_visibility]]. |
| [searchCorpusPlainText()](/code/functions/searchCorpusPlainText.md) | 72 | Reduce HTML to the plain text worth indexing. |
| [searchCorpusUpsert()](/code/functions/searchCorpusUpsert.md) | 94 | Index one source row, or update it if already indexed. |
| [searchCorpusDelete()](/code/functions/searchCorpusDelete.md) | 129 | Remove one source's row. Safe to call for something never indexed. |
| [searchCorpusDeleteTicket()](/code/functions/searchCorpusDeleteTicket.md) | 135 | Remove every row for a ticket. The FK cascades on ticket DELETE; this is for soft deletes. |
| [searchCorpusReady()](/code/functions/searchCorpusReady.md) | 140 | Is the corpus available? False on an install that has not run Database Verification. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 101 | `searchCorpusUpsert` | **insert** [search_documents](/code/tables/search_documents.md) (`source_type`, `source_id`, `ticket_id`, `tenant_id`, `tenant_scope`, `is_internal`, `title`, `body`, `source_datetime`, `indexed_datetime`) |  |
| 130 | `searchCorpusDelete` | **delete** [search_documents](/code/tables/search_documents.md) |  |
| 136 | `searchCorpusDeleteTicket` | **delete** [search_documents](/code/tables/search_documents.md) |  |
| 144 | `searchCorpusReady` | read [search_documents](/code/tables/search_documents.md) |  |

## How it hangs together

**Included by:** [api/system/search_status.php](/code/files/api/system/search_status.php.md), [includes/search/backfill.php](/code/files/includes/search/backfill.php.md), [includes/search/documents_index.php](/code/files/includes/search/documents_index.php.md), [includes/search/indexer.php](/code/files/includes/search/indexer.php.md), [includes/search/search.php](/code/files/includes/search/search.php.md)

