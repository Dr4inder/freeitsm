# domainAlertRelease()

```php
function domainAlertRelease(PDO $conn, int $domainId, string $kind, string $fingerprint): void
```

Defined in [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), line 53.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$domainId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$fingerprint` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 55 | `domainAlertRelease` | **delete** [domain_alerts_sent](/code/tables/domain_alerts_sent.md) |  |

## Called from

- [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md) - in [domainAlertsRun()](/code/functions/domainAlertsRun.md), [domainAlertOnChange()](/code/functions/domainAlertOnChange.md), [domainRenewalActionsRun()](/code/functions/domainRenewalActionsRun.md)

