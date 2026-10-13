# statusPlannedFinish()

```php
function statusPlannedFinish(PDO $conn, array $p): void
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 284.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$p` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 288 | `statusPlannedFinish` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 293 | `statusPlannedFinish` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 301 | `statusPlannedFinish` | **update** [status_incidents](/code/tables/status_incidents.md) (`resolved_datetime`) |  |
| 303 | `statusPlannedFinish` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`created_datetime`) |  |

## Calls

[statusPlannedActor()](/code/functions/statusPlannedActor.md)

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedRun()](/code/functions/statusPlannedRun.md)

