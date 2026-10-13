# service_incident_statuses

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `name` | `VARCHAR(50) NOT NULL` |  |
| `is_resolved` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `colour` | `VARCHAR(20) NULL` |  |
| `is_default` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `display_order` | `INT NOT NULL DEFAULT 0` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3599 |  | insert | `name`, `is_resolved`, `colour`, `is_default`, `display_order` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3649 |  | insert | `name`, `display_order` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):509 | `ServiceStatusService::saveIncidentStatus` | update | `is_default` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):515 | `ServiceStatusService::saveIncidentStatus` | update | `name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):519 | `ServiceStatusService::saveIncidentStatus` | insert | `name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):525 | `ServiceStatusService::saveIncidentStatus` | update | `is_default` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):551 | `ServiceStatusService::deleteIncidentStatus` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md) | L102 |  |
| [api/service-status/get_dashboard.php](/code/files/api/service-status/get_dashboard.php.md) | L34, L57 |  |
| [api/service-status/get_incident_statuses.php](/code/files/api/service-status/get_incident_statuses.php.md) | L20 |  |
| [api/service-status/get_incident_updates.php](/code/files/api/service-status/get_incident_updates.php.md) | L42 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3597, L3649, L3655, L3662 |  |
| [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) | apiServiceStatusSubquery L50, apiServiceIncidentSelect L102, apiStatusServicesGet L197, apiStatusIncidentsList L264, apiServiceIncidentStatusesList L319 |  |
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) | domainStatusResolvedName L207 |  |
| [includes/feature_bingo/cards/service-status.php](/code/files/includes/feature_bingo/cards/service-status.php.md) | L131 |  |
| [includes/report_packs/blocks_status.php](/code/files/includes/report_packs/blocks_status.php.md) | rpStatusIncidentLog L105, rpStatusIncidentSummary L170 |  |
| [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) | statusPlannedStatusId L258, statusPlannedStatusId L259, statusPlannedFinish L288, statusPlannedFinish L293 |  |
| [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md) | ssPortalIncidents L112, ssPortalIncidentUpdates L193 |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md) | ServiceStatusService::loadIncidentRow L251, ServiceStatusService::resolveIncidentStatus L266, ServiceStatusService::resolveIncidentStatus L269, ServiceStatusService::saveIncidentStatus L523, ServiceStatusService::deleteIncidentStatus L540, ServiceStatusService::deleteIncidentStatus L550 |  |
| [includes/services/service_uptime.php](/code/files/includes/services/service_uptime.php.md) | ServiceUptime::incidentsFor L110 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolServiceStatus L434 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L432, getWatchtowerData L465 |  |

