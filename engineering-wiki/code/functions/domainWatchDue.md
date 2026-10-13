# domainWatchDue()

The weekly watches keep their "last scanned" in the domain's audit trail rather than two more columns: one row per scan, source 'check'. A domain with no such row in `$days` days is due.

```php
function domainWatchDue(PDO $conn, string $marker, int $days, string $where): array
```

Defined in [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md), line 113.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$marker` | `string` |  |  |
| `$days` | `int` |  |  |
| `$where` | `string` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 116 | `domainWatchDue` | read [domains](/code/tables/domains.md), read [domain_audit](/code/tables/domain_audit.md) |  |

## Called from

- [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) - in [domainScheduledRun()](/code/functions/domainScheduledRun.md)

