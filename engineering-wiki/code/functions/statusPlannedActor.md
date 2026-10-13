# statusPlannedActor()

The person who scheduled it, as the actor of the incident's history.

```php
function statusPlannedActor(PDO $conn, array $p): ActorContext
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 240.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$p` | `array` |  |  |

**Returns:** `ActorContext`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 245 | `statusPlannedActor` | read [analysts](/code/tables/analysts.md) |  |

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedStart()](/code/functions/statusPlannedStart.md), [statusPlannedFinish()](/code/functions/statusPlannedFinish.md)

