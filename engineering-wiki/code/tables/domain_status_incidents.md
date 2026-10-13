# domain_status_incidents

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `domain_id` | `INT NOT NULL` |  |
| `incident_id` | `INT NOT NULL` |  |
| `trigger_kind` | `VARCHAR(30) NOT NULL` |  |
| `fingerprint` | `VARCHAR(100) NOT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `resolved_datetime` | `DATETIME NULL` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md):178 | `domainStatusRaise` | insert | `domain_id`, `incident_id`, `trigger_kind`, `fingerprint` |  |
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md):266 | `domainStatusRun` | update | `resolved_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) | domainStatusReady L48, domainStatusOpenIncident L106, domainStatusRun L236, domainStatusRun L246, domainStatusRun L250 |  |

