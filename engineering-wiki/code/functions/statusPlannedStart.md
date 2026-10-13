# statusPlannedStart()

```php
function statusPlannedStart(PDO $conn, array $p): void
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 263.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$p` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 265 | `statusPlannedStart` | read [status_planned_services](/code/tables/status_planned_services.md) |  |
| 278 | `statusPlannedStart` | **update** [status_incidents](/code/tables/status_incidents.md) (`created_datetime`) |  |
| 279 | `statusPlannedStart` | **update** [status_incident_updates](/code/tables/status_incident_updates.md) (`created_datetime`) |  |
| 281 | `statusPlannedStart` | **update** [status_planned](/code/tables/status_planned.md) (`incident_id`) |  |

## Calls

[statusPlannedActor()](/code/functions/statusPlannedActor.md), [statusPlannedStatusId()](/code/functions/statusPlannedStatusId.md)

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedRun()](/code/functions/statusPlannedRun.md)

