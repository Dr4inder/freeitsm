# statusPlannedCancel()

Cancel planned maintenance that has not started.

```php
function statusPlannedCancel(PDO $conn, ActorContext $ctx, int $id): void
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 120.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 124 | `statusPlannedCancel` | **update** [status_planned](/code/tables/status_planned.md) (`state`, `updated_datetime`) |  |

## Calls

[statusPlannedLoad()](/code/functions/statusPlannedLoad.md)

## Called from

- [api/service-status/planned.php](/code/files/api/service-status/planned.php.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::withdrawAnnouncement`

