# gapBulkRichness()

Approximate richness for many tickets in four queries.

Lengths are of the RAW stored bodies, so HTML markup inflates them. That is
fine: every ticket is inflated by roughly the same amount and this score is
only ever compared against other tickets, never an absolute bar. The one place
an absolute bar IS applied (interview vs draft) uses the real plain-text
bundle from `writeupTicketBundle()` instead.

```php
function gapBulkRichness(PDO $conn, array $ticketIds): array
```

Defined in [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md), line 342.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketIds` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 360 | `gapBulkRichness` | read [emails](/code/tables/emails.md) |  |
| 370 | `gapBulkRichness` | read [ticket_notes](/code/tables/ticket_notes.md) |  |
| 377 | `gapBulkRichness` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 384 | `gapBulkRichness` | read [problem_tickets](/code/tables/problem_tickets.md) |  |

## Calls

[writeupRichness()](/code/functions/writeupRichness.md)

## Called from

- [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) - in [gapAnalyse()](/code/functions/gapAnalyse.md)

