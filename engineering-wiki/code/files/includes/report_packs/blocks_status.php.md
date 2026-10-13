# includes/report_packs/blocks_status.php

> PHP - 247 lines

Report Packs: Service Status blocks.

Uptime comes from includes/services/service_uptime.php - the range-based methods
added for packs, which follow the same rules as the status board (segments from
the update log, overlaps unioned, only impact levels that count as downtime).
So a pack can never disagree with the board about how uptime is worked out;
only the period differs.

Service Status has no company column: services and incidents are the install's.
The pack's company criterion therefore does not apply here, and nothing is
filtered by it.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [rpStatusServices()](/code/functions/rpStatusServices.md) | 19 | The services a block covers: the chosen ones, or every active one. |
| [rpStatusUptime()](/code/functions/rpStatusUptime.md) | 32 |  |
| [rpPercent()](/code/functions/rpPercent.md) | 71 | 100% / 99.13% / 95.7% - two decimals, trailing zeros dropped. |
| [rpStatusUptimeTable()](/code/functions/rpStatusUptimeTable.md) | 76 |  |
| [rpStatusIncidentLog()](/code/functions/rpStatusIncidentLog.md) | 101 | Every incident UPDATE in the range, oldest first, with the services it named and their worst impact - the incident log in Enrique's example. The update's comment goes underneath the row, full width. |
| [rpStatusIncidentSummary()](/code/functions/rpStatusIncidentSummary.md) | 167 | Incidents overlapping the range: title, status pill, affected services as chips. |
| [rpStatusKpis()](/code/functions/rpStatusKpis.md) | 218 |  |
| [rpPlainText()](/code/functions/rpPlainText.md) | 241 | Rich text from an incident comment, flattened for a table's detail line. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 21 | `rpStatusServices` | read [status_services](/code/tables/status_services.md) |  |
| 105 | `rpStatusIncidentLog` | read [status_incident_updates](/code/tables/status_incident_updates.md), read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md), read [analysts](/code/tables/analysts.md) |  |
| 123 | `rpStatusIncidentLog` | read [status_incident_update_services](/code/tables/status_incident_update_services.md), read [status_services](/code/tables/status_services.md), read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 170 | `rpStatusIncidentSummary` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 185 | `rpStatusIncidentSummary` | read [status_incident_services](/code/tables/status_incident_services.md), read [status_services](/code/tables/status_services.md), read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 228 | `rpStatusKpis` | read [status_incidents](/code/tables/status_incidents.md) |  |

## How it hangs together

**Includes:** [includes/services/service_uptime.php](/code/files/includes/services/service_uptime.php.md)

**Included by:** [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md)

**Calls:** [rpFmtDate()](/code/functions/rpFmtDate.md), [rpFmtDateTime()](/code/functions/rpFmtDateTime.md), [rpHumanDuration()](/code/functions/rpHumanDuration.md), [t()](/code/functions/t.md)

