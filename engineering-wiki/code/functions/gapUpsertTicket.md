# gapUpsertTicket()

Insert-or-update one knowledge_gap_tickets row from a partial field map.

```php
function gapUpsertTicket(PDO $conn, int $ticketId, array $fields): void
```

Defined in [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md), line 66.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$fields` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 75 | `gapUpsertTicket` | **insert** [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |

## Called from

- [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) - in [gapEmbedBatch()](/code/functions/gapEmbedBatch.md), [gapAnalyse()](/code/functions/gapAnalyse.md)

