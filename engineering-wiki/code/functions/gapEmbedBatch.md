# gapEmbedBatch()

Embed up to `$batch` not-yet-embedded tickets. Returns a progress report.

Resumable by design — every vector is cached in knowledge_gap_tickets, so a
closed tab, a timeout or a rate limit costs only the batch in flight.

```php
function gapEmbedBatch(
    PDO $conn,
    int $analystId,
    int $lookbackDays,
    int $batch,
    string $openaiKey
): array
```

Defined in [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md), line 106.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$lookbackDays` | `int` |  |  |
| `$batch` | `int` |  |  |
| `$openaiKey` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 116 | `gapEmbedBatch` | read [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |
| 152 | `gapEmbedBatch` | read [knowledge_gap_tickets](/code/tables/knowledge_gap_tickets.md) |  |

## Calls

[gapUpsertTicket()](/code/functions/gapUpsertTicket.md), [gapWindowSql()](/code/functions/gapWindowSql.md), [kbGenerateEmbedding()](/code/functions/kbGenerateEmbedding.md), [writeupEmbeddingText()](/code/functions/writeupEmbeddingText.md)

## Called from

- [api/knowledge/analyse_gaps.php](/code/files/api/knowledge/analyse_gaps.php.md)

