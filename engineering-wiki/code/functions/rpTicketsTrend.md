# rpTicketsTrend()

Tickets block: a chart of tickets created and/or closed per day, week or month across the period.

Bucketed in PHP from the timestamps, since the buckets are local days and the database
only knows UTC.

```php
function rpTicketsTrend(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 154.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 164 | `rpTicketsTrend` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[rpBucketCount()](/code/functions/rpBucketCount.md), [rpTicketWhere()](/code/functions/rpTicketWhere.md), [rpTimeBuckets()](/code/functions/rpTimeBuckets.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

