# domain_status_services

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `domain_id` | `INT NOT NULL` |  |
| `service_id` | `INT NOT NULL` |  |
| `created_by_analyst_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) | domainStatusReady L49, domainStatusServiceIds L96, domainStatusRun L227 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L641 |  |

