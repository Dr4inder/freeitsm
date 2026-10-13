# status_incidents

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `status_id` | `INT NULL` |  |
| `comment` | `LONGTEXT NULL` |  |
| `created_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `resolved_datetime` | `DATETIME NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3655 |  | update | `status_id` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3662 |  | update | `status_id` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):122 | `ServiceStatusService::saveIncident` | insert | `title`, `status_id`, `comment`, `created_by_id`, `created_datetime`, `updated_datetime`, `resolved_datetime` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):178 | `ServiceStatusService::updateIncident` | update | `title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):184 | `ServiceStatusService::updateIncident` | update | `title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):239 | `ServiceStatusService::deleteIncident` | delete |  |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):386 | `ServiceStatusService::editIncidentUpdate` | update | `comment` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):417 | `ServiceStatusService::deleteIncidentUpdate` | update | `comment` |  |
| [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md):278 | `statusPlannedStart` | update | `created_datetime` |  |
| [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md):301 | `statusPlannedFinish` | update | `resolved_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md) | L102 |  |
| [api/service-status/get_dashboard.php](/code/files/api/service-status/get_dashboard.php.md) | L34, L57 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3649 |  |
| [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) | apiServiceStatusSubquery L50, apiServiceIncidentSelect L102, apiStatusIncidentsList L264 |  |
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) | domainStatusOpenIncident L103, domainStatusRun L252 |  |
| [includes/report_packs/blocks_status.php](/code/files/includes/report_packs/blocks_status.php.md) | rpStatusIncidentLog L105, rpStatusIncidentSummary L170, rpStatusKpis L228 |  |
| [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) | statusPlannedFinish L288 |  |
| [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md) | ssPortalIncidents L112 |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md) | ServiceStatusService::loadIncidentRow L251, ServiceStatusService::deleteIncidentStatus L544 |  |
| [includes/services/service_uptime.php](/code/files/includes/services/service_uptime.php.md) | ServiceUptime::incidentsFor L110, ServiceUptime::incidentsBetween L449 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolServiceStatus L434 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L432, getWatchtowerData L465 |  |

