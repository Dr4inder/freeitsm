# projectMilestoneStats()

Per project: how many milestones are missed, and the next one still to come ({id, name, due_date} or null) - for health and the portfolio card.

```php
function projectMilestoneStats(PDO $conn, array $projectIds): array
```

Defined in [includes/projects/milestones.php](/code/files/includes/projects/milestones.php.md), line 64.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectIds` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 70 | `projectMilestoneStats` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 75 | `projectMilestoneStats` | read [project_milestones](/code/tables/project_milestones.md) |  |

## Calls

[projectMilestonesReady()](/code/functions/projectMilestonesReady.md)

## Called from

- [includes/projects/read.php](/code/files/includes/projects/read.php.md) - in [projectTaskStats()](/code/functions/projectTaskStats.md)

