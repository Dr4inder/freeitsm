# workflowPruneEmissions()

Drop ledger rows for events long past. Keeping them forever would grow without bound; a year is far longer than any window we announce, so nothing can be resurrected by a prune.

```php
function workflowPruneEmissions(PDO $conn, int $keepDays = 365): int
```

Defined in [includes/workflow_scheduled.php](/code/files/includes/workflow_scheduled.php.md), line 267.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$keepDays` | `int` | `365` |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 271 | `workflowPruneEmissions` | **delete** [workflow_scheduled_emissions](/code/tables/workflow_scheduled_emissions.md) |  |

## Called from

- [cron/workflow_scheduled.php](/code/files/cron/workflow_scheduled.php.md)

