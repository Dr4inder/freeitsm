# includes/service_status_portal.php

> PHP - 209 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [ssPortalSettings()](/code/functions/ssPortalSettings.md) | 43 | All three settings, with defaults filled in for anything unset. |
| [ssPortalSetting()](/code/functions/ssPortalSetting.md) | 64 | One setting, falling back to its default. |
| [ssPortalUpdatesEnabled()](/code/functions/ssPortalUpdatesEnabled.md) | 70 | Are incidents shown on the portal at all? |
| [ssPortalIncidents()](/code/functions/ssPortalIncidents.md) | 81 | Incidents the portal may show, newest first, each with its EXTERNAL updates. |
| [ssPortalIncidentUpdates()](/code/functions/ssPortalIncidentUpdates.md) | 186 | The EXTERNAL updates on one incident, oldest first — the progression from "we are looking at it" to "it is fixed", which is what a status page is for. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 49 | `ssPortalSettings` | read [system_settings](/code/tables/system_settings.md) |  |
| 95 | `ssPortalIncidents` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 112 | `ssPortalIncidents` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 133 | `ssPortalIncidents` | read [status_incident_services](/code/tables/status_incident_services.md), read [status_services](/code/tables/status_services.md), read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 160 | `ssPortalIncidents` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 193 | `ssPortalIncidentUpdates` | read [status_incident_updates](/code/tables/status_incident_updates.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

## How it hangs together

**Included by:** [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md), [api/self-service/get_incident_updates.php](/code/files/api/self-service/get_incident_updates.php.md), [api/system/service_status_portal.php](/code/files/api/system/service_status_portal.php.md), [service-status/index.php](/code/files/service-status/index.php.md)

