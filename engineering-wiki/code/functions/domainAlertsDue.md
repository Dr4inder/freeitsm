# domainAlertsDue()

Everything due today for expiry and certificates.

```php
function domainAlertsDue(PDO $conn, array $s): array
```

Defined in [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), line 70.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$s` | `array` |  |  |

**Returns:** array<int,array> each: domain row fields + kind ('expiry'|'expired'|'ssl'), days, date, fingerprint

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 80 | `domainAlertsDue` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |

## Calls

[domainParseDays()](/code/functions/domainParseDays.md)

## Called from

- [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md) - in [domainAlertsRun()](/code/functions/domainAlertsRun.md)

