# statusPlannedLoad()

Loads one planned maintenance row; throws not found when it does not exist.

```php
function statusPlannedLoad(PDO $conn, int $id): array
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 128.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `statusPlannedLoad` | read [status_planned](/code/tables/status_planned.md) |  |

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedSave()](/code/functions/statusPlannedSave.md), [statusPlannedCancel()](/code/functions/statusPlannedCancel.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::withdrawAnnouncement`

