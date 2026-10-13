# projectAlertsStagesDue()

Stages ending soon -> project.stage_due, once per window per end date. Only the nearest window fires: a stage first seen a day out gets "tomorrow", not a week's notice as well.

```php
function projectAlertsStagesDue(PDO $conn, ?int $projectId = null): int
```

Defined in [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), line 221.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `?int` | `null` |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 225 | `projectAlertsStagesDue` | read [project_stages](/code/tables/project_stages.md), read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |
| 240 | `projectAlertsStagesDue` | **insert** [workflow_scheduled_emissions](/code/tables/workflow_scheduled_emissions.md) (`trigger_event`, `entity_key`, `fingerprint`, `emitted_datetime`) |  |

## Calls

[projectDispatch()](/code/functions/projectDispatch.md), [projectEventPayload()](/code/functions/projectEventPayload.md), [projectStageDueWindows()](/code/functions/projectStageDueWindows.md)

## Called from

- [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) - in [projectAlertsScan()](/code/functions/projectAlertsScan.md)

