# includes/services/service_status.php

> PHP - 630 lines

ServiceStatusService — the single home for the service-status module's write rules (services, incidents, and the UI-only incident-statuses + impact-levels).

Both callers use it: the UI endpoints (api/service-status/*.php) and the REST
API (api/v1/resources/service_status.php). Each passes an ActorContext (who is
acting) and the input; this layer validates + writes and either returns the
affected id or throws ServiceError. It never emits HTTP — the adapters shape
the response (the API serialises + sets a status; the UI returns {success}).

Canonical behaviour = the old API resource's behaviour (see the divergence
table in docs/design/service-layer.md): UTC timestamps, empty text stored as
NULL, strict validation of affected services, incident status by name or id.

## Classes

- [ServiceStatusService](/code/classes/ServiceStatusService.md) (class, line 21)

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 44 | `ServiceStatusService::saveService` | **update** [status_services](/code/tables/status_services.md) (`name`, `description`, `display_order`, `is_active`) |  |
| 56 | `ServiceStatusService::saveService` | **insert** [status_services](/code/tables/status_services.md) (`name`, `description`, `display_order`, `is_active`, `created_datetime`) |  |
| 75 | `ServiceStatusService::deleteService` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 76 | `ServiceStatusService::deleteService` | **delete** [status_services](/code/tables/status_services.md) |  |
| 87 | `ServiceStatusService::loadServiceRow` | read [status_services](/code/tables/status_services.md) |  |
| 122 | `ServiceStatusService::saveIncident` | **insert** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `created_by_id`, `created_datetime`, `updated_datetime`, `resolved_datetime`) |  |
| 178 | `ServiceStatusService::updateIncident` | **update** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime`) |  |
| 184 | `ServiceStatusService::updateIncident` | **update** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime`) |  |
| 238 | `ServiceStatusService::deleteIncident` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 239 | `ServiceStatusService::deleteIncident` | **delete** [status_incidents](/code/tables/status_incidents.md) |  |
| 251 | `ServiceStatusService::loadIncidentRow` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 266 | `ServiceStatusService::resolveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 269 | `ServiceStatusService::resolveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 293 | `ServiceStatusService::validateIncidentServices` | read [status_services](/code/tables/status_services.md) |  |
| 299 | `ServiceStatusService::validateIncidentServices` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 308 | `ServiceStatusService::validateIncidentServices` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 331 | `ServiceStatusService::incidentServicesDiffer` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 363 | `ServiceStatusService::editIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 377 | `ServiceStatusService::editIncidentUpdate` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`comment`, `is_internal`) |  |
| 383 | `ServiceStatusService::editIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 386 | `ServiceStatusService::editIncidentUpdate` | **update** [status_incidents](/code/tables/status_incidents.md) (`comment`) |  |
| 401 | `ServiceStatusService::deleteIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 409 | `ServiceStatusService::deleteIncidentUpdate` | **delete** [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 412 | `ServiceStatusService::deleteIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 417 | `ServiceStatusService::deleteIncidentUpdate` | **update** [status_incidents](/code/tables/status_incidents.md) (`comment`) |  |
| 423 | `ServiceStatusService::replaceIncidentServices` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 425 | `ServiceStatusService::replaceIncidentServices` | **insert** [status_incident_services](/code/tables/status_incident_services.md) (`incident_id`, `service_id`, `impact_level_id`) |  |
| 461 | `ServiceStatusService::recordIncidentUpdate` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 470 | `ServiceStatusService::recordIncidentUpdate` | **insert** [status_incident_updates](/code/tables/status_incident_updates.md) (`incident_id`, `status_id`, `comment`, `is_internal`, `created_by_id`, `created_datetime`) |  |
| 476 | `ServiceStatusService::recordIncidentUpdate` | **insert** [status_incident_update_services](/code/tables/status_incident_update_services.md) (`update_id`, `service_id`, `impact_level_id`) |  |
| 509 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`is_default`) |  |
| 515 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active`) |  |
| 519 | `ServiceStatusService::saveIncidentStatus` | **insert** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active`) |  |
| 523 | `ServiceStatusService::saveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 525 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`is_default`) |  |
| 540 | `ServiceStatusService::deleteIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 544 | `ServiceStatusService::deleteIncidentStatus` | read [status_incidents](/code/tables/status_incidents.md) |  |
| 550 | `ServiceStatusService::deleteIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 551 | `ServiceStatusService::deleteIncidentStatus` | **delete** [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 584 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`is_default`) |  |
| 590 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`name`, `colour`, `is_default`, `severity_order`, `display_order`, `is_active`, `counts_as_downtime`) |  |
| 594 | `ServiceStatusService::saveImpactLevel` | **insert** [service_impact_levels](/code/tables/service_impact_levels.md) (`name`, `colour`, `is_default`, `severity_order`, `display_order`, `is_active`, `counts_as_downtime`) |  |
| 598 | `ServiceStatusService::saveImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 600 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`is_default`) |  |
| 615 | `ServiceStatusService::deleteImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 619 | `ServiceStatusService::deleteImpactLevel` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 625 | `ServiceStatusService::deleteImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 626 | `ServiceStatusService::deleteImpactLevel` | **delete** [service_impact_levels](/code/tables/service_impact_levels.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/service_impact_levels.php](/code/files/includes/service_impact_levels.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Included by:** [api/service-status/delete_impact_level.php](/code/files/api/service-status/delete_impact_level.php.md), [api/service-status/delete_incident.php](/code/files/api/service-status/delete_incident.php.md), [api/service-status/delete_incident_status.php](/code/files/api/service-status/delete_incident_status.php.md), [api/service-status/delete_incident_update.php](/code/files/api/service-status/delete_incident_update.php.md), [api/service-status/delete_service.php](/code/files/api/service-status/delete_service.php.md), [api/service-status/save_impact_level.php](/code/files/api/service-status/save_impact_level.php.md), [api/service-status/save_incident.php](/code/files/api/service-status/save_incident.php.md), [api/service-status/save_incident_status.php](/code/files/api/service-status/save_incident_status.php.md), [api/service-status/save_incident_update.php](/code/files/api/service-status/save_incident_update.php.md), [api/service-status/save_service.php](/code/files/api/service-status/save_service.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md)

**Calls:** [defaultImpactLevel()](/code/functions/defaultImpactLevel.md)

