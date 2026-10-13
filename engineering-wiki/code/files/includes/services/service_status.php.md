# includes/services/service_status.php

> PHP - 650 lines

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
| 88 | `ServiceStatusService::loadServiceRow` | read [status_services](/code/tables/status_services.md) |  |
| 123 | `ServiceStatusService::saveIncident` | **insert** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `created_by_id`, `created_datetime`, `updated_datetime`, `resolved_datetime`) |  |
| 186 | `ServiceStatusService::updateIncident` | **update** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime`) |  |
| 192 | `ServiceStatusService::updateIncident` | **update** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime`) |  |
| 246 | `ServiceStatusService::deleteIncident` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 247 | `ServiceStatusService::deleteIncident` | **delete** [status_incidents](/code/tables/status_incidents.md) |  |
| 263 | `ServiceStatusService::loadIncidentRow` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 278 | `ServiceStatusService::resolveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 281 | `ServiceStatusService::resolveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 305 | `ServiceStatusService::validateIncidentServices` | read [status_services](/code/tables/status_services.md) |  |
| 311 | `ServiceStatusService::validateIncidentServices` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 320 | `ServiceStatusService::validateIncidentServices` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 343 | `ServiceStatusService::incidentServicesDiffer` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 375 | `ServiceStatusService::editIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 389 | `ServiceStatusService::editIncidentUpdate` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`comment`, `is_internal`) |  |
| 395 | `ServiceStatusService::editIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 398 | `ServiceStatusService::editIncidentUpdate` | **update** [status_incidents](/code/tables/status_incidents.md) (`comment`) |  |
| 413 | `ServiceStatusService::deleteIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 421 | `ServiceStatusService::deleteIncidentUpdate` | **delete** [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 424 | `ServiceStatusService::deleteIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 429 | `ServiceStatusService::deleteIncidentUpdate` | **update** [status_incidents](/code/tables/status_incidents.md) (`comment`) |  |
| 436 | `ServiceStatusService::replaceIncidentServices` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 438 | `ServiceStatusService::replaceIncidentServices` | **insert** [status_incident_services](/code/tables/status_incident_services.md) (`incident_id`, `service_id`, `impact_level_id`) |  |
| 474 | `ServiceStatusService::recordIncidentUpdate` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 483 | `ServiceStatusService::recordIncidentUpdate` | **insert** [status_incident_updates](/code/tables/status_incident_updates.md) (`incident_id`, `status_id`, `comment`, `is_internal`, `created_by_id`, `created_datetime`) |  |
| 489 | `ServiceStatusService::recordIncidentUpdate` | **insert** [status_incident_update_services](/code/tables/status_incident_update_services.md) (`update_id`, `service_id`, `impact_level_id`) |  |
| 523 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`is_default`) |  |
| 529 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active`) |  |
| 533 | `ServiceStatusService::saveIncidentStatus` | **insert** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active`) |  |
| 537 | `ServiceStatusService::saveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 539 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`is_default`) |  |
| 555 | `ServiceStatusService::deleteIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 559 | `ServiceStatusService::deleteIncidentStatus` | read [status_incidents](/code/tables/status_incidents.md) |  |
| 565 | `ServiceStatusService::deleteIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 566 | `ServiceStatusService::deleteIncidentStatus` | **delete** [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 603 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`is_default`) |  |
| 609 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`name`, `colour`, `is_default`, `severity_order`, `display_order`, `is_active`, `counts_as_downtime`) |  |
| 613 | `ServiceStatusService::saveImpactLevel` | **insert** [service_impact_levels](/code/tables/service_impact_levels.md) (`name`, `colour`, `is_default`, `severity_order`, `display_order`, `is_active`, `counts_as_downtime`) |  |
| 617 | `ServiceStatusService::saveImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 619 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`is_default`) |  |
| 635 | `ServiceStatusService::deleteImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 639 | `ServiceStatusService::deleteImpactLevel` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 645 | `ServiceStatusService::deleteImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 646 | `ServiceStatusService::deleteImpactLevel` | **delete** [service_impact_levels](/code/tables/service_impact_levels.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/service_impact_levels.php](/code/files/includes/service_impact_levels.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Included by:** [api/service-status/delete_impact_level.php](/code/files/api/service-status/delete_impact_level.php.md), [api/service-status/delete_incident.php](/code/files/api/service-status/delete_incident.php.md), [api/service-status/delete_incident_status.php](/code/files/api/service-status/delete_incident_status.php.md), [api/service-status/delete_incident_update.php](/code/files/api/service-status/delete_incident_update.php.md), [api/service-status/delete_service.php](/code/files/api/service-status/delete_service.php.md), [api/service-status/save_impact_level.php](/code/files/api/service-status/save_impact_level.php.md), [api/service-status/save_incident.php](/code/files/api/service-status/save_incident.php.md), [api/service-status/save_incident_status.php](/code/files/api/service-status/save_incident_status.php.md), [api/service-status/save_incident_update.php](/code/files/api/service-status/save_incident_update.php.md), [api/service-status/save_service.php](/code/files/api/service-status/save_service.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md)

**Calls:** [defaultImpactLevel()](/code/functions/defaultImpactLevel.md)

