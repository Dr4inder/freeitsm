# rpTicketsTrend()

```php
function rpTicketsTrend(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 145.

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
| 155 | `rpTicketsTrend` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[rpBucketCount()](/code/functions/rpBucketCount.md), [rpTicketWhere()](/code/functions/rpTicketWhere.md), [rpTimeBuckets()](/code/functions/rpTimeBuckets.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

