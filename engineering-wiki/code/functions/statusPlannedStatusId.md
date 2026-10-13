# statusPlannedStatusId()

The status a started maintenance incident takes: the first open status that is not the starting one ("Identified" on a stock install). "Investigating" would say nobody knows what is happening - the opposite of planned work.

```php
function statusPlannedStatusId(PDO $conn): ?int
```

Defined in [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md), line 257.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 259 | `statusPlannedStatusId` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |
| 260 | `statusPlannedStatusId` | read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

## Called from

- [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md) - in [statusPlannedStart()](/code/functions/statusPlannedStart.md)

