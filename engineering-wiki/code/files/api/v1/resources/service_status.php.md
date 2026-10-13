# api/v1/resources/service_status.php

> API endpoint - 350 lines

FreeITSM REST API v1 — service-status resource (services + incidents).

Mirrors the module's internal endpoints:
  - a service's state is DERIVED, not stored: the worst impact level
    (lowest severity_order) across its open incidents, else the configured
    default impact level (usually Operational, but it is renameable — GH #70)
    — the services list computes it inline with get_dashboard.php's exact
    subquery, so status-page builders get the health board in one call;
  - incident writes mirror save_incident.php: status by name (or id),
    resolved_datetime stamped once on entering a resolved status
    (COALESCE-preserved) and cleared on reopen, affected services replaced
    as a set with per-service impact levels;
  - deletes replicate the UI's manual junction cleanup — but inside a
    transaction (the internal endpoints run two bare statements).

One deliberate improvement, documented: unknown service/impact ids in the
affected-services array are a 422 (save_incident.php silently skips them —
machines deserve the error).

This is the module monitoring tools want to DRIVE: flip an incident open
when a probe fails, append status, resolve on recovery. Everything here is
key-authenticated like the rest of v1 — there is no public unauthenticated
status feed in the product (yet). Install-wide; no audit trail exists.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/service_status.php` |
| Protected by | REST API key |
| Reads | `GET is_active`, `GET q`, `GET state`, `GET service_id` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiServiceStatusFail()](/code/functions/apiServiceStatusFail.md) | 33 | Map a ServiceError raised by the shared service to the API's error response. |
| [apiServiceStatusSubquery()](/code/functions/apiServiceStatusSubquery.md) | 48 | get_dashboard.php's exact worst-open-impact subquery, as a SQL fragment. |
| [apiServiceStatusImpactMeta()](/code/functions/apiServiceStatusImpactMeta.md) | 60 |  |
| [apiSerializeService()](/code/functions/apiSerializeService.md) | 71 |  |
| [apiLoadService()](/code/functions/apiLoadService.md) | 88 |  |
| [apiServiceIncidentSelect()](/code/functions/apiServiceIncidentSelect.md) | 101 |  |
| [apiSerializeIncident()](/code/functions/apiSerializeIncident.md) | 109 |  |
| [apiLoadIncident()](/code/functions/apiLoadIncident.md) | 148 |  |
| [apiStatusServicesList()](/code/functions/apiStatusServicesList.md) | 166 |  |
| [apiStatusServicesGet()](/code/functions/apiStatusServicesGet.md) | 192 |  |
| [apiStatusServicesCreate()](/code/functions/apiStatusServicesCreate.md) | 211 |  |
| [apiStatusServicesUpdate()](/code/functions/apiStatusServicesUpdate.md) | 218 |  |
| [apiStatusServicesDelete()](/code/functions/apiStatusServicesDelete.md) | 225 |  |
| [apiStatusIncidentsList()](/code/functions/apiStatusIncidentsList.md) | 237 |  |
| [apiStatusIncidentsGet()](/code/functions/apiStatusIncidentsGet.md) | 287 |  |
| [apiStatusIncidentsCreate()](/code/functions/apiStatusIncidentsCreate.md) | 292 |  |
| [apiStatusIncidentsUpdate()](/code/functions/apiStatusIncidentsUpdate.md) | 300 |  |
| [apiStatusIncidentsDelete()](/code/functions/apiStatusIncidentsDelete.md) | 307 |  |
| [apiServiceIncidentStatusesList()](/code/functions/apiServiceIncidentStatusesList.md) | 317 |  |
| [apiServiceImpactLevelsList()](/code/functions/apiServiceImpactLevelsList.md) | 334 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 50 | `apiServiceStatusSubquery` | read [status_incident_services](/code/tables/status_incident_services.md), read [status_incidents](/code/tables/status_incidents.md), read [service_impact_levels](/code/tables/service_impact_levels.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 64 | `apiServiceStatusImpactMeta` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 90 | `apiLoadService` | read [status_services](/code/tables/status_services.md) |  |
| 102 | `apiServiceIncidentSelect` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md), read [analysts](/code/tables/analysts.md) |  |
| 111 | `apiSerializeIncident` | read [status_incident_services](/code/tables/status_incident_services.md), read [status_services](/code/tables/status_services.md), read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 182 | `apiStatusServicesList` | read [status_services](/code/tables/status_services.md) |  |
| 197 | `apiStatusServicesGet` | read [status_incident_services](/code/tables/status_incident_services.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 246 | `apiStatusIncidentsList` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 264 | `apiStatusIncidentsList` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 319 | `apiServiceIncidentStatusesList` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 336 | `apiServiceImpactLevelsList` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/service_status.php](/code/files/includes/services/service_status.php.md), [includes/service_impact_levels.php](/code/files/includes/service_impact_levels.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [defaultImpactLevel()](/code/functions/defaultImpactLevel.md), [serviceErrorHttpStatus()](/code/functions/serviceErrorHttpStatus.md)

