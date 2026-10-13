# gapPersistClusters()

Persist clusters, preserving what the analyst has already decided about them.

🔑 A freshly computed cluster is matched to a stored one by TICKET OVERLAP,
not by id, seed or label. A cluster grows as new tickets close and its seed
changes as richer examples arrive, so any identity built on "same seed" or
"same subject" breaks on the next run and re-raises something the analyst has
already dismissed. Overlap survives both.

```php
function gapPersistClusters(PDO $conn, array $clusters): int
```

Defined in [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md), line 405.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$clusters` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 408 | `gapPersistClusters` | read [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md), read [knowledge_gap_cluster_tickets](/code/tables/knowledge_gap_cluster_tickets.md) |  |
| 474 | `gapPersistClusters` | **update** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 481 | `gapPersistClusters` | **insert** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 487 | `gapPersistClusters` | **delete** [knowledge_gap_cluster_tickets](/code/tables/knowledge_gap_cluster_tickets.md) |  |
| 488 | `gapPersistClusters` | **insert** [knowledge_gap_cluster_tickets](/code/tables/knowledge_gap_cluster_tickets.md) (`cluster_id`, `ticket_id`, `similarity`) |  |
| 496 | `gapPersistClusters` | **update** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) (`status`, `article_id`) |  |
| 508 | `gapPersistClusters` | **delete** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |
| 511 | `gapPersistClusters` | **delete** [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |

## Calls

[writeupCleanLabel()](/code/functions/writeupCleanLabel.md)

## Called from

- [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) - in [gapAnalyse()](/code/functions/gapAnalyse.md)

