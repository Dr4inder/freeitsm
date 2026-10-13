# domainAlertAlreadySent()

True when this alert (domain, kind, fingerprint) has already been claimed or sent.

```php
function domainAlertAlreadySent(PDO $conn, int $domainId, string $kind, string $fingerprint): bool
```

Defined in [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), line 63.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$domainId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$fingerprint` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 65 | `domainAlertAlreadySent` | read [domain_alerts_sent](/code/tables/domain_alerts_sent.md) |  |

## Called from

- [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md) - in [domainAlertsRun()](/code/functions/domainAlertsRun.md)

