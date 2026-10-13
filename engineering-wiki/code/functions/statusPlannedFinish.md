# statusPlannedFinish()

Finishes a planned maintenance: resolves its incident with the first resolved status and backdates the end to the planned end.

Does nothing if the incident is gone, already resolved, or no resolved status exists.

```php
function statusPlannedFinish(PDO $conn, array $p): void
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 298.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$p` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 302 | `statusPlannedFinish` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 307 | `statusPlannedFinish` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 315 | `statusPlannedFinish` | **update** [status_incidents](/code/tables/status_incidents.md) (`resolved_datetime`) |  |
| 317 | `statusPlannedFinish` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`created_datetime`) |  |

## Calls

[statusPlannedActor()](/code/functions/statusPlannedActor.md)

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedRun()](/code/functions/statusPlannedRun.md)

