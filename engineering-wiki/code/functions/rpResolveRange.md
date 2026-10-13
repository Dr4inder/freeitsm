# rpResolveRange()

Resolve a pack's range into local dates (for display) and UTC bounds (for SQL). The end is EXCLUSIVE: [from, to). A custom range is inclusive of both days the reader picked, so its end is the day after.

```php
function rpResolveRange(array $range, ?string $tz = null): array
```

Defined in [includes/report_packs/criteria.php](/code/files/includes/report_packs/criteria.php.md), line 33.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$range` | `array` |  |  |
| `$tz` | `?string` | `null` |  |

**Returns:** array{preset:string,from_date:string,to_date:string,from_utc:string,to_utc:string,days:int,tz:string}

## Calls

[rpParseDate()](/code/functions/rpParseDate.md)

## Called from

- [api/reporting/packs/context.php](/code/files/api/reporting/packs/context.php.md)
- [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md) - in [rpBlockData()](/code/functions/rpBlockData.md)

