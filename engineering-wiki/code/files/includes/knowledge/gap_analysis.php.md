# includes/knowledge/gap_analysis.php

> PHP - 536 lines

Knowledge gap analysis — the half of the assistant that decides WHAT is missing.

Split out of api/knowledge/analyse_gaps.php so the analysis can be run without
an HTTP request and a session. That is not architectural tidiness for its own
sake: the interesting behaviour here is emergent (does a pile of real tickets
actually cluster into the right questions?) and the only way to test it is to
build a known pile inside a transaction, run the analysis on the SAME database
connection, assert, and roll back. Over HTTP that is impossible — the endpoint
gets its own connection and cannot see the uncommitted rows.

See tests/knowledge-gaps/ for the harness that does exactly that.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [knowledgeOpenAiKey()](/code/functions/knowledgeOpenAiKey.md) | 30 | The OpenAI key used for ARTICLE embeddings, reused deliberately. |
| [gapWindowSql()](/code/functions/gapWindowSql.md) | 48 | The closed-ticket window this analyst can see. |
| [gapUpsertTicket()](/code/functions/gapUpsertTicket.md) | 66 | Insert-or-update one knowledge_gap_tickets row from a partial field map. |
| [gapWindowCounts()](/code/functions/gapWindowCounts.md) | 81 | How many tickets are in the window, and how many already have an embedding. |
| [gapEmbedBatch()](/code/functions/gapEmbedBatch.md) | 106 | Embed up to `$batch` not-yet-embedded tickets. Returns a progress report. |
| [gapAnalyse()](/code/functions/gapAnalyse.md) | 177 | Score every closed ticket in the window against the knowledge base, cluster what nothing covers, and persist the result. |
| [gapBulkRichness()](/code/functions/gapBulkRichness.md) | 342 | Approximate richness for many tickets in four queries. |
| [gapPersistClusters()](/code/functions/gapPersistClusters.md) | 405 | Persist clusters, preserving what the analyst has already decided about them. |
| [gapClearOpenClusters()](/code/functions/gapClearOpenClusters.md) | 518 | Clear the open cards but keep the analyst's decisions. |
| [gapSummarySentence()](/code/functions/gapSummarySentence.md) | 524 | The assistant's opening line, in plain English. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 33 | `knowledgeOpenAiKey` | read [system_settings](/code/tables/system_settings.md) |  |
| 56 | `gapWindowSql` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 75 | `gapUpsertTicket` | **insert** [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |
| 90 | `gapWindowCounts` | read [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |
| 116 | `gapEmbedBatch` | read [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |
| 152 | `gapEmbedBatch` | read [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |
| 186 | `gapAnalyse` | read [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |
| 217 | `gapAnalyse` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 360 | `gapBulkRichness` | read [emails](/code/tables/emails.md) |  |
| 370 | `gapBulkRichness` | read [ticket_notes](/code/tables/ticket_notes.md) |  |
| 377 | `gapBulkRichness` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 384 | `gapBulkRichness` | read [problem_tickets](/code/tables/problem_tickets.md) |  |
| 408 | `gapPersistClusters` | read [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md), read [knowledge_gap_cluster_tickets](/code/tables/knowledge_gap_cluster_tickets.md) |  |
| 474 | `gapPersistClusters` | **update** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 481 | `gapPersistClusters` | **insert** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 487 | `gapPersistClusters` | **delete** [knowledge_gap_cluster_tickets](/code/tables/knowledge_gap_cluster_tickets.md) |  |
| 488 | `gapPersistClusters` | **insert** [knowledge_gap_cluster_tickets](/code/tables/knowledge_gap_cluster_tickets.md) (`cluster_id`, `ticket_id`, `similarity`) |  |
| 496 | `gapPersistClusters` | **update** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) (`status`, `article_id`) |  |
| 508 | `gapPersistClusters` | **delete** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 511 | `gapPersistClusters` | **delete** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 520 | `gapClearOpenClusters` | **delete** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |

## How it hangs together

**Includes:** [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md), [includes/knowledge/kb_ai.php](/code/files/includes/knowledge/kb_ai.php.md), [includes/encryption.php](/code/files/includes/encryption.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md)

**Included by:** [api/knowledge/analyse_gaps.php](/code/files/api/knowledge/analyse_gaps.php.md)

**Calls:** [activeTenantFilter()](/code/functions/activeTenantFilter.md), [decryptValue()](/code/functions/decryptValue.md), [kbCosineSimilarity()](/code/functions/kbCosineSimilarity.md), [kbGenerateEmbedding()](/code/functions/kbGenerateEmbedding.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [ticketAiExclusionSql()](/code/functions/ticketAiExclusionSql.md), [writeupCleanLabel()](/code/functions/writeupCleanLabel.md), [writeupCluster()](/code/functions/writeupCluster.md), [writeupEmbeddingText()](/code/functions/writeupEmbeddingText.md), [writeupRichness()](/code/functions/writeupRichness.md), [writeupSettings()](/code/functions/writeupSettings.md), [writeupSubjectTokens()](/code/functions/writeupSubjectTokens.md), [writeupTokenSimilarity()](/code/functions/writeupTokenSimilarity.md)

