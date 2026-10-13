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
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):523 | `ServiceStatusService::saveIncidentStatus` | update | `is_default` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):529 | `ServiceStatusService::saveIncidentStatus` | update | `name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):533 | `ServiceStatusService::saveIncidentStatus` | insert | `name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):539 | `ServiceStatusService::saveIncidentStatus` | update | `is_default` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):566 | `ServiceStatusService::deleteIncidentStatus` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md) | L102 |  |
| [api/service-status/get_dashboard.php](/code/files/api/service-status/get_dashboard.php.md) | L34, L57 |  |
| [api/service-status/get_incident_statuses.php](/code/files/api/service-status/get_incident_statuses.php.md) | L20 |  |
| [api/service-status/get_incident_updates.php](/code/files/api/service-status/get_incident_updates.php.md) | L42 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3597, L3649, L3655, L3662 |  |
| [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) | apiServiceStatusSubquery L50, apiServiceIncidentSelect L112, apiStatusServicesGet L216, apiStatusIncidentsList L289, apiServiceIncidentStatusesList L346 |  |
| [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) | domainStatusResolvedName L210 |  |
| [includes/feature_bingo/cards/service-status.php](/code/files/includes/feature_bingo/cards/service-status.php.md) | L131 |  |
| [includes/report_packs/blocks_status.php](/code/files/includes/report_packs/blocks_status.php.md) | rpStatusIncidentLog L113, rpStatusIncidentSummary L178 |  |
| [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) | statusPlannedStatusId L259, statusPlannedStatusId L260, statusPlannedFinish L302, statusPlannedFinish L307 |  |
| [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md) | ssPortalIncidents L112, ssPortalIncidentUpdates L193 |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md) | ServiceStatusService::loadIncidentRow L263, ServiceStatusService::resolveIncidentStatus L278, ServiceStatusService::resolveIncidentStatus L281, ServiceStatusService::saveIncidentStatus L537, ServiceStatusService::deleteIncidentStatus L555, ServiceStatusService::deleteIncidentStatus L565 |  |
| [includes/services/service_uptime.php](/code/files/includes/services/service_uptime.php.md) | ServiceUptime::incidentsFor L110 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolServiceStatus L445 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L432, getWatchtowerData L465 |  |

