# rpTimeBuckets()

Buckets for a time series over the range: day, week (Monday) or month, chosen from the range's length when 'auto'. Returned as local-date keys with labels.

```php
function rpTimeBuckets(array $range, string $grouping): array
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 106.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$range` | `array` |  |  |
| `$grouping` | `string` |  |  |

**Returns:** array{0:string,1:array<string,string>}  [grouping, key => label]

## Calls

[rpBucketKey()](/code/functions/rpBucketKey.md)

## Called from

- [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md) - in [rpTicketsTrend()](/code/functions/rpTicketsTrend.md)

