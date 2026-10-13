# gapStatusCounts()

How many clusters sit in each state, for the view's tabs.

```php
function gapStatusCounts(PDO $conn, string $tSql, array $tArgs): array
```

Defined in [api/knowledge/gap_clusters.php](/code/files/api/knowledge/gap_clusters.php.md), line 134.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$tSql` | `string` |  |  |
| `$tArgs` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 138 | `gapStatusCounts` | read [knowledge_gap_clusters](/code/tables/knowledge_gap_clusters.md) |  |

## Called from

- [api/knowledge/gap_clusters.php](/code/files/api/knowledge/gap_clusters.php.md)

