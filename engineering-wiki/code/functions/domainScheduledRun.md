# domainScheduledRun()

```php
function domainScheduledRun(
    PDO $conn,
    float $budgetSeconds = 240,
    bool $includeWatches = true
): array
```

Defined in [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md), line 27.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$budgetSeconds` | `float` | `240` |  |
| `$includeWatches` | `bool` | `true` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 40 | `domainScheduledRun` | read [domains](/code/tables/domains.md) |  |
| 61 | `domainScheduledRun` | read [domains](/code/tables/domains.md) |  |

## Calls

[domainAlertsRun()](/code/functions/domainAlertsRun.md), [domainCtScan()](/code/functions/domainCtScan.md), [domainLookalikeScan()](/code/functions/domainLookalikeScan.md), [domainLookup()](/code/functions/domainLookup.md), [domainLookupPace()](/code/functions/domainLookupPace.md), [domainSettings()](/code/functions/domainSettings.md), [domainStatusRun()](/code/functions/domainStatusRun.md), [domainSyncExpiryCalendar()](/code/functions/domainSyncExpiryCalendar.md), [domainWatchDue()](/code/functions/domainWatchDue.md), [domainWatchMark()](/code/functions/domainWatchMark.md)

## Called from

- [api/domains/settings.php](/code/files/api/domains/settings.php.md)
- [cron/domains.php](/code/files/cron/domains.php.md)
- [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) - in [domainOpportunisticRun()](/code/functions/domainOpportunisticRun.md)

