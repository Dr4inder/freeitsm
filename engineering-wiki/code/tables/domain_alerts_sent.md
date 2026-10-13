# domain_alerts_sent

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `domain_id` | `INT NOT NULL` |  |
| `alert_kind` | `VARCHAR(30) NOT NULL` |  |
| `fingerprint` | `VARCHAR(100) NOT NULL` |  |
| `sent_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md):48 | `domainAlertClaim` | insert | `domain_id`, `alert_kind`, `fingerprint`, `sent_datetime` |  |
| [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md):55 | `domainAlertRelease` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md) | domainAlertAlreadySent L60 |  |

