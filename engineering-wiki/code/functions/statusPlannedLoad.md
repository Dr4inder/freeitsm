# statusPlannedLoad()

```php
function statusPlannedLoad(PDO $conn, int $id): array
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 127.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 129 | `statusPlannedLoad` | read [status_planned](/code/tables/status_planned.md) |  |

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedSave()](/code/functions/statusPlannedSave.md), [statusPlannedCancel()](/code/functions/statusPlannedCancel.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::withdrawAnnouncement`

