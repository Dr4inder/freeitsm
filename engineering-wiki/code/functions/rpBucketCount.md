# rpBucketCount()

Count UTC timestamps into local buckets.

```php
function rpBucketCount(array $stamps, array $range, string $grouping, array $keys): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 133.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stamps` | `array` |  |  |
| `$range` | `array` |  |  |
| `$grouping` | `string` |  |  |
| `$keys` | `array` |  |  |

**Returns:** `array`

## Calls

[rpBucketKey()](/code/functions/rpBucketKey.md)

## Called from

- [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md) - in [rpTicketsTrend()](/code/functions/rpTicketsTrend.md)

