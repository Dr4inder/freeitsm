# includes/service_status_planned.php

> PHP - 307 lines

Service Status - planned maintenance (3.2.0).

"Move day: phones down Saturday 08:00-14:00", announced on Tuesday.

─────────────────────────────────────────────────────────────────────────────
🔑 NOT AN INCIDENT UNTIL IT STARTS

About fifteen readers decide whether an incident is open from its STATUS
(service_incident_statuses.is_resolved) and take its start from
created_datetime: the board, the portal, Watchtower, uptime, Report Packs, the
REST API, Warbot. None of them knows a start time. An incident created on
Tuesday for Saturday would show the phones "Under Maintenance" for four days
and count from Tuesday.

So the plan waits in status_planned, shown as Upcoming, and nothing else in
the product sees it. At planned_start it becomes an ORDINARY incident, made
through ServiceStatusService::saveIncident() - so its workflows, update log
and every reader behave exactly as for one typed in by hand - and its
timestamps are BACKDATED to planned_start, so a cron that runs at 08:47 still
gives an uptime record that starts at 08:00. At planned_end it is resolved the
same way. Not one existing reader had to change.

  scheduled ─(planned_start)→ started ─(planned_end)→ finished
      └─ cancelled (by hand, before it starts)

planned_end NULL = no automatic end: somebody resolves the incident by hand.
Resolving it by hand early is respected - the end step only records
"finished" for an incident that is already resolved.

─────────────────────────────────────────────────────────────────────────────
WHO MOVES IT ON

`statusPlannedRun()`: the scheduled workflow cron (includes/workflow_scheduled.php),
and `statusPlannedDue()` at the top of the readers people look at - the board,
the portal, Watchtower - so a start is seen on time even with no cron. Each
step is claimed with a compare-and-set on `state`, so overlapping runs cannot
start one plan twice.

The incident is made AS the person who scheduled it (created_by_id), so its
history says who planned the work rather than "System".

## Functions

| Function | Line | What it does |
|---|--:|---|
| [statusPlannedReady()](/code/functions/statusPlannedReady.md) | 51 | Has Database Verification created the tables? |
| [statusPlannedUtc()](/code/functions/statusPlannedUtc.md) | 62 | 'Y-m-d H:i:s' UTC from anything `strtotime()` reads as UTC (the page sends ISO from `inputToUTC()`). |
| [statusPlannedSave()](/code/functions/statusPlannedSave.md) | 76 | Schedule (no id) or change (id, while still scheduled) planned maintenance. `$in`: title, comment, start, end?, services [{service_id, impact_level_id}], project_id?. A start that has already passed starts it at once. Returns the id. |
| [statusPlannedCancel()](/code/functions/statusPlannedCancel.md) | 120 | Cancel planned maintenance that has not started. |
| [statusPlannedLoad()](/code/functions/statusPlannedLoad.md) | 127 |  |
| [statusPlannedList()](/code/functions/statusPlannedList.md) | 140 | Planned maintenance for a list: scheduled and in progress by default, soonest first, each with its services. `$opts`: project_id, states, limit. |
| [statusPlannedDue()](/code/functions/statusPlannedDue.md) | 182 | Is anything due to start or end? One indexed query - cheap enough for every page load. |
| [statusPlannedRun()](/code/functions/statusPlannedRun.md) | 200 | Start what is due and finish what has ended. `$onlyId` = one plan (just saved). |
| [statusPlannedActor()](/code/functions/statusPlannedActor.md) | 239 | The person who scheduled it, as the actor of the incident's history. |
| [statusPlannedStatusId()](/code/functions/statusPlannedStatusId.md) | 256 | The status a started maintenance incident takes: the first open status that is not the starting one ("Identified" on a stock install). "Investigating" would say nobody knows what is happening - the opposite of planned work. |
| [statusPlannedStart()](/code/functions/statusPlannedStart.md) | 263 |  |
| [statusPlannedFinish()](/code/functions/statusPlannedFinish.md) | 284 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 55 | `statusPlannedReady` | read [status_planned](/code/tables/status_planned.md) |  |
| 55 | `statusPlannedReady` | read [status_planned_services](/code/tables/status_planned_services.md) |  |
| 98 | `statusPlannedSave` | **update** [status_planned](/code/tables/status_planned.md) (`title`, `comment`, `planned_start_datetime`, `planned_end_datetime`, `updated_datetime`) |  |
| 100 | `statusPlannedSave` | **delete** [status_planned_services](/code/tables/status_planned_services.md) |  |
| 102 | `statusPlannedSave` | **insert** [status_planned](/code/tables/status_planned.md) (`title`, `comment`, `planned_start_datetime`, `planned_end_datetime`, `state`, `project_id`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 107 | `statusPlannedSave` | **insert** [status_planned_services](/code/tables/status_planned_services.md) (`planned_id`, `service_id`, `impact_level_id`) |  |
| 124 | `statusPlannedCancel` | **update** [status_planned](/code/tables/status_planned.md) (`state`, `updated_datetime`) |  |
| 129 | `statusPlannedLoad` | read [status_planned](/code/tables/status_planned.md) |  |
| 148 | `statusPlannedList` | read [status_planned](/code/tables/status_planned.md), read [analysts](/code/tables/analysts.md), read [projects](/code/tables/projects.md) |  |
| 159 | `statusPlannedList` | read [status_planned_services](/code/tables/status_planned_services.md), read [status_services](/code/tables/status_services.md), read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 186 | `statusPlannedDue` | read [status_planned](/code/tables/status_planned.md) |  |
| 206 | `statusPlannedRun` | read [status_planned](/code/tables/status_planned.md) |  |
| 209 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`, `updated_datetime`) |  |
| 217 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`) |  |
| 222 | `statusPlannedRun` | read [status_planned](/code/tables/status_planned.md) |  |
| 224 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`, `updated_datetime`) |  |
| 231 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`) |  |
| 244 | `statusPlannedActor` | read [analysts](/code/tables/analysts.md) |  |
| 258 | `statusPlannedStatusId` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 259 | `statusPlannedStatusId` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 265 | `statusPlannedStart` | read [status_planned_services](/code/tables/status_planned_services.md) |  |
| 278 | `statusPlannedStart` | **update** [status_incidents](/code/tables/status_incidents.md) (`created_datetime`) |  |
| 279 | `statusPlannedStart` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`created_datetime`) |  |
| 281 | `statusPlannedStart` | **update** [status_planned](/code/tables/status_planned.md) (`incident_id`) |  |
| 288 | `statusPlannedFinish` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 293 | `statusPlannedFinish` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 301 | `statusPlannedFinish` | **update** [status_incidents](/code/tables/status_incidents.md) (`resolved_datetime`) |  |
| 303 | `statusPlannedFinish` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`created_datetime`) |  |

## How it hangs together

**Includes:** [includes/services/service_status.php](/code/files/includes/services/service_status.php.md), [includes/service_impact_levels.php](/code/files/includes/service_impact_levels.php.md)

**Included by:** [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md), [api/service-status/get_dashboard.php](/code/files/api/service-status/get_dashboard.php.md), [api/service-status/planned.php](/code/files/api/service-status/planned.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md), [includes/workflow_scheduled.php](/code/files/includes/workflow_scheduled.php.md)

