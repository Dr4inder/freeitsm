# ServiceStatusService

> Class in [includes/services/service_status.php](/code/files/includes/services/service_status.php.md), line 21

## Methods

| Method | What it does |
|---|---|
| [saveService()](#saveservice) | Create (no id) or update (id present) a service. Returns the id. |
| [deleteService()](#deleteservice) | Delete a service + its incident links, atomically. |
| [loadServiceRow()](#loadservicerow) | Loads one service; throws not found when it does not exist. |
| [saveIncident()](#saveincident) | Create (no id) or update (id present) an incident. Returns the id. |
| [updateIncident()](#updateincident) | Changes an incident's title, status, comment and affected services, logging an update when the status, comment or services changed, and fires service_status.incident_updated (and incident_resolved). |
| [deleteIncident()](#deleteincident) | Delete an incident + its service links, atomically. |
| [loadIncidentRow()](#loadincidentrow) | Loads one incident with whether its status counts as resolved; throws not found when it does not exist. |
| [resolveIncidentStatus()](#resolveincidentstatus) | Resolve an incident status by id or name — strict on unknown/inactive. |
| [validateIncidentServices()](#validateincidentservices) | Validate [{service_id, impact_level\|impact_level_id}] → [[service_id, impact_id]]. Strict: 422 on unknown service or impact (the old UI silently skipped these). |
| [incidentServicesDiffer()](#incidentservicesdiffer) | Do the services (and their impacts) about to be written differ from what is stored? Used to decide whether a save has anything new to say. |
| [editIncidentUpdate()](#editincidentupdate) | Correct an update that has already been posted (Ed, on top of #99). |
| [deleteIncidentUpdate()](#deleteincidentupdate) | Remove one update from the timeline. |
| [replaceIncidentServices()](#replaceincidentservices) | Replaces the services an incident affects, each with its impact level. |
| [recordIncidentUpdate()](#recordincidentupdate) | Record a moment in an incident's life (discussion #59, phase 2). |
| [saveIncidentStatus()](#saveincidentstatus) | Adds or updates an incident status; making one the default clears the flag on the others. |
| [deleteIncidentStatus()](#deleteincidentstatus) | Deletes an incident status; refuses the default status and any status still used by an incident. |
| [saveImpactLevel()](#saveimpactlevel) | Adds or updates an impact level, including whether it counts as downtime; making one the default clears the flag on the others. |
| [deleteImpactLevel()](#deleteimpactlevel) | Deletes an impact level; refuses the default level and any level still used on an incident. |

### saveService

*public static* - line 28

Create (no id) or update (id present) a service. Returns the id.

```php
function saveService(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 44 | `ServiceStatusService::saveService` | **update** [status_services](/code/tables/status_services.md) (`name`, `description`, `display_order`, `is_active`) |  |
| 56 | `ServiceStatusService::saveService` | **insert** [status_services](/code/tables/status_services.md) (`name`, `description`, `display_order`, `is_active`, `created_datetime`) |  |

**Called from:** [api/service-status/save_service.php](/code/files/api/service-status/save_service.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md)

### deleteService

*public static* - line 70

Delete a service + its incident links, atomically.

```php
function deleteService(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 75 | `ServiceStatusService::deleteService` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 76 | `ServiceStatusService::deleteService` | **delete** [status_services](/code/tables/status_services.md) |  |

**Called from:** [api/service-status/delete_service.php](/code/files/api/service-status/delete_service.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md)

### loadServiceRow

*private static* - line 86

Loads one service; throws not found when it does not exist.

```php
function loadServiceRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 88 | `ServiceStatusService::loadServiceRow` | read [status_services](/code/tables/status_services.md) |  |

### saveIncident

*public static* - line 100

Create (no id) or update (id present) an incident. Returns the id.

```php
function saveIncident(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 123 | `ServiceStatusService::saveIncident` | **insert** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `created_by_id`, `created_datetime`, `updated_datetime`, `resolved_datetime`) |  |

**Called from:** [api/service-status/save_incident.php](/code/files/api/service-status/save_incident.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md)

### updateIncident

*private static* - line 150

Changes an incident's title, status, comment and affected services, logging an update when the status, comment or services changed, and fires service_status.incident_updated (and incident_resolved).

An update is internal unless is_internal is sent as false.

```php
function updateIncident(PDO $conn, ActorContext $ctx, int $id, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 186 | `ServiceStatusService::updateIncident` | **update** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime`) |  |
| 192 | `ServiceStatusService::updateIncident` | **update** [status_incidents](/code/tables/status_incidents.md) (`title`, `status_id`, `comment`, `resolved_datetime`, `updated_datetime`) |  |

### deleteIncident

*public static* - line 241

Delete an incident + its service links, atomically.

```php
function deleteIncident(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 246 | `ServiceStatusService::deleteIncident` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 247 | `ServiceStatusService::deleteIncident` | **delete** [status_incidents](/code/tables/status_incidents.md) |  |

**Called from:** [api/service-status/delete_incident.php](/code/files/api/service-status/delete_incident.php.md), [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md)

### loadIncidentRow

*private static* - line 260

Loads one incident with whether its status counts as resolved; throws not found when it does not exist.

```php
function loadIncidentRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 263 | `ServiceStatusService::loadIncidentRow` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

### resolveIncidentStatus

*private static* - line 275

Resolve an incident status by id or name — strict on unknown/inactive.

```php
function resolveIncidentStatus(PDO $conn, array $in): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 278 | `ServiceStatusService::resolveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 281 | `ServiceStatusService::resolveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

### validateIncidentServices

*public static* - line 297

Validate [{service_id, impact_level|impact_level_id}] → [[service_id, impact_id]]. Strict: 422 on unknown service or impact (the old UI silently skipped these).

```php
function validateIncidentServices(PDO $conn, array $services): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$services` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 305 | `ServiceStatusService::validateIncidentServices` | read [status_services](/code/tables/status_services.md) |  |
| 311 | `ServiceStatusService::validateIncidentServices` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 320 | `ServiceStatusService::validateIncidentServices` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |

**Called from:** [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md)

### incidentServicesDiffer

*private static* - line 341

Do the services (and their impacts) about to be written differ from what is stored? Used to decide whether a save has anything new to say.

Order-insensitive: the dialog rebuilds its rows every time it opens, so
the same two services can arrive in a different order without anything
having actually changed — and appending on that would be the same bug in
a different coat.

```php
function incidentServicesDiffer(PDO $conn, int $incidentId, array $links): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$incidentId` | `int` |  |  |
| `$links` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 343 | `ServiceStatusService::incidentServicesDiffer` | read [status_incident_services](/code/tables/status_incident_services.md) |  |

### editIncidentUpdate

*public static* - line 373

Correct an update that has already been posted (Ed, on top of #99).

⚠️ EDIT IN PLACE, not a new entry. Fixing a typo used to mean saving the
incident again, which published the sentence twice with the wrong version
first — and on a customer-facing timeline that reads as carelessness.

Only the wording and the visibility can change. The status and the service
impacts recorded on an update are what was true at that moment, and
rewriting them would make the timeline a record of what somebody wishes
had happened.

```php
function editIncidentUpdate(PDO $conn, ActorContext $ctx, int $updateId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$updateId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 375 | `ServiceStatusService::editIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 389 | `ServiceStatusService::editIncidentUpdate` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`comment`, `is_internal`) |  |
| 395 | `ServiceStatusService::editIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 398 | `ServiceStatusService::editIncidentUpdate` | **update** [status_incidents](/code/tables/status_incidents.md) (`comment`) |  |

**Called from:** [api/service-status/save_incident_update.php](/code/files/api/service-status/save_incident_update.php.md)

### deleteIncidentUpdate

*public static* - line 411

Remove one update from the timeline.

The incident and every other update survive it. As with editing, the
incident's own comment follows if the one removed was the latest.

```php
function deleteIncidentUpdate(PDO $conn, ActorContext $ctx, int $updateId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$updateId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 413 | `ServiceStatusService::deleteIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 421 | `ServiceStatusService::deleteIncidentUpdate` | **delete** [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 424 | `ServiceStatusService::deleteIncidentUpdate` | read [status_incident_updates](/code/tables/status_incident_updates.md) |  |
| 429 | `ServiceStatusService::deleteIncidentUpdate` | **update** [status_incidents](/code/tables/status_incidents.md) (`comment`) |  |

**Called from:** [api/service-status/delete_incident_update.php](/code/files/api/service-status/delete_incident_update.php.md)

### replaceIncidentServices

*private static* - line 434

Replaces the services an incident affects, each with its impact level.

```php
function replaceIncidentServices(PDO $conn, int $incidentId, array $links): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$incidentId` | `int` |  |  |
| `$links` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 436 | `ServiceStatusService::replaceIncidentServices` | **delete** [status_incident_services](/code/tables/status_incident_services.md) |  |
| 438 | `ServiceStatusService::replaceIncidentServices` | **insert** [status_incident_services](/code/tables/status_incident_services.md) (`incident_id`, `service_id`, `impact_level_id`) |  |

### recordIncidentUpdate

*private static* - line 470

Record a moment in an incident's life (discussion #59, phase 2).

⚠️ THIS IS WHY DOWNGRADING A SERVICE NO LONGER LOSES THE EARLIER LEVEL.
`replaceIncidentServices()` above deletes and re-inserts, so
status_incident_services only ever holds the CURRENT impact — moving a
service from Major Outage to Degraded overwrote the first value and the
history then reported the whole incident at whatever it ended on.

Each call appends a full SNAPSHOT of the per-service impacts, not a diff.
A diff would make the reader reconstruct state, and one missing row would
silently shift a service's entire timeline; a snapshot costs a few rows
and cannot drift.

A service is "restored" either by moving it to a level that does not count
as downtime, or by dropping it from `$links` entirely. Both simply end its
interval at this update, which is why there is no per-service resolved flag.

Best-effort by design: an install that has not run Database Verification
since this shipped has no tables to write to, and failing to save an
incident because its audit trail could not be appended would be a worse
outcome than the missing trail. The reader falls back for such incidents.

```php
function recordIncidentUpdate(
    PDO $conn,
    ActorContext $ctx,
    int $incidentId,
    ?int $statusId,
    ?string $comment,
    ?array $links,
    bool $isInternal = true
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$incidentId` | `int` |  |  |
| `$statusId` | `?int` |  |  |
| `$comment` | `?string` |  |  |
| `$links` | `?array` |  | [[serviceId, impactId], …] — null means "unchanged", in which case the current links are snapshotted. |
| `$isInternal` | `bool` | `true` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 474 | `ServiceStatusService::recordIncidentUpdate` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 483 | `ServiceStatusService::recordIncidentUpdate` | **insert** [status_incident_updates](/code/tables/status_incident_updates.md) (`incident_id`, `status_id`, `comment`, `is_internal`, `created_by_id`, `created_datetime`) |  |
| 489 | `ServiceStatusService::recordIncidentUpdate` | **insert** [status_incident_update_services](/code/tables/status_incident_update_services.md) (`update_id`, `service_id`, `impact_level_id`) |  |

### saveIncidentStatus

*public static* - line 505

Adds or updates an incident status; making one the default clears the flag on the others.

```php
function saveIncidentStatus(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 523 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`is_default`) |  |
| 529 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active`) |  |
| 533 | `ServiceStatusService::saveIncidentStatus` | **insert** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`name`, `colour`, `is_resolved`, `is_default`, `display_order`, `is_active`) |  |
| 537 | `ServiceStatusService::saveIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 539 | `ServiceStatusService::saveIncidentStatus` | **update** [service_incident_statuses](/code/tables/service_incident_statuses.md) (`is_default`) |  |

**Called from:** [api/service-status/save_incident_status.php](/code/files/api/service-status/save_incident_status.php.md)

### deleteIncidentStatus

*public static* - line 551

Deletes an incident status; refuses the default status and any status still used by an incident.

```php
function deleteIncidentStatus(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 555 | `ServiceStatusService::deleteIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 559 | `ServiceStatusService::deleteIncidentStatus` | read [status_incidents](/code/tables/status_incidents.md) |  |
| 565 | `ServiceStatusService::deleteIncidentStatus` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 566 | `ServiceStatusService::deleteIncidentStatus` | **delete** [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

**Called from:** [api/service-status/delete_incident_status.php](/code/files/api/service-status/delete_incident_status.php.md)

### saveImpactLevel

*public static* - line 578

Adds or updates an impact level, including whether it counts as downtime; making one the default clears the flag on the others.

```php
function saveImpactLevel(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 603 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`is_default`) |  |
| 609 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`name`, `colour`, `is_default`, `severity_order`, `display_order`, `is_active`, `counts_as_downtime`) |  |
| 613 | `ServiceStatusService::saveImpactLevel` | **insert** [service_impact_levels](/code/tables/service_impact_levels.md) (`name`, `colour`, `is_default`, `severity_order`, `display_order`, `is_active`, `counts_as_downtime`) |  |
| 617 | `ServiceStatusService::saveImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 619 | `ServiceStatusService::saveImpactLevel` | **update** [service_impact_levels](/code/tables/service_impact_levels.md) (`is_default`) |  |

**Called from:** [api/service-status/save_impact_level.php](/code/files/api/service-status/save_impact_level.php.md)

### deleteImpactLevel

*public static* - line 631

Deletes an impact level; refuses the default level and any level still used on an incident.

```php
function deleteImpactLevel(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 635 | `ServiceStatusService::deleteImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 639 | `ServiceStatusService::deleteImpactLevel` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 645 | `ServiceStatusService::deleteImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 646 | `ServiceStatusService::deleteImpactLevel` | **delete** [service_impact_levels](/code/tables/service_impact_levels.md) |  |

**Called from:** [api/service-status/delete_impact_level.php](/code/files/api/service-status/delete_impact_level.php.md)

