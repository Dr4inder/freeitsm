# statusPlannedRun()

Start what is due and finish what has ended. `$onlyId` = one plan (just saved).

```php
function statusPlannedRun(PDO $conn, ?int $onlyId = null): array
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 201.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$onlyId` | `?int` | `null` |  |

**Returns:** array{started:int, finished:int}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 207 | `statusPlannedRun` | read [status_planned](/code/tables/status_planned.md) |  |
| 210 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`, `updated_datetime`) |  |
| 218 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`) |  |
| 223 | `statusPlannedRun` | read [status_planned](/code/tables/status_planned.md) |  |
| 225 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`, `updated_datetime`) |  |
| 232 | `statusPlannedRun` | **update** [status_planned](/code/tables/status_planned.md) (`state`) |  |

## Calls

[statusPlannedFinish()](/code/functions/statusPlannedFinish.md), [statusPlannedReady()](/code/functions/statusPlannedReady.md), [statusPlannedStart()](/code/functions/statusPlannedStart.md)

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedSave()](/code/functions/statusPlannedSave.md), [statusPlannedDue()](/code/functions/statusPlannedDue.md)
- [includes/workflow_scheduled.php](/code/files/includes/workflow_scheduled.php.md) - in [workflowScheduledRun()](/code/functions/workflowScheduledRun.md)

