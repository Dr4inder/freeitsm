# rpBucketKey()

The bucket a date falls in: the Monday of its week, its month (Y-m) or its day.

```php
function rpBucketKey(DateTimeImmutable $d, string $grouping): string
```

Defined in [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md), line 127.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `DateTimeImmutable` |  |  |
| `$grouping` | `string` |  |  |

**Returns:** `string`

## Called from

- [includes/report_packs/blocks_tickets.php](/code/files/includes/report_packs/blocks_tickets.php.md) - in [rpTimeBuckets()](/code/functions/rpTimeBuckets.md), [rpBucketCount()](/code/functions/rpBucketCount.md)

