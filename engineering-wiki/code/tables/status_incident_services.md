# status_incident_services

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `incident_id` | `INT NOT NULL` |  |
| `service_id` | `INT NOT NULL` |  |
| `impact_level_id` | `INT NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3673 |  | update | `impact_level_id` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3680 |  | update | `impact_level_id` |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):75 | `ServiceStatusService::deleteService` | delete |  |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):246 | `ServiceStatusService::deleteIncident` | delete |  |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):436 | `ServiceStatusService::replaceIncidentServices` | delete |  |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md):438 | `ServiceStatusService::replaceIncidentServices` | insert | `incident_id`, `service_id`, `impact_level_id` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md) | L102 |  |
| [api/service-status/get_dashboard.php](/code/files/api/service-status/get_dashboard.php.md) | L34, L76 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3667 |  |
| [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) | apiServiceStatusSubquery L50, apiSerializeIncident L125, apiStatusServicesGet L216, apiStatusIncidentsList L271 |  |
| [includes/report_packs/blocks_status.php](/code/files/includes/report_packs/blocks_status.php.md) | rpStatusIncidentSummary L193 |  |
| [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md) | ssPortalIncidents L133 |  |
| [includes/services/service_status.php](/code/files/includes/services/service_status.php.md) | ServiceStatusService::incidentServicesDiffer L343, ServiceStatusService::recordIncidentUpdate L474, ServiceStatusService::deleteImpactLevel L639 |  |
| [includes/services/service_uptime.php](/code/files/includes/services/service_uptime.php.md) | ServiceUptime::incidentsFor L110, ServiceUptime::incidentsBetween L449 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolServiceStatus L445 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L432 |  |

