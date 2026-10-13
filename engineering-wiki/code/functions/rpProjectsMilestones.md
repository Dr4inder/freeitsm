# rpProjectsMilestones()

Stage ends and target finishes inside the range, and whether each was met.

```php
function rpProjectsMilestones(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 152.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 160 | `rpProjectsMilestones` | read [project_stages](/code/tables/project_stages.md), read [projects](/code/tables/projects.md) |  |
| 168 | `rpProjectsMilestones` | read [project_milestones](/code/tables/project_milestones.md), read [projects](/code/tables/projects.md) |  |

## Calls

[projectCode()](/code/functions/projectCode.md), [projectMilestonesReady()](/code/functions/projectMilestonesReady.md), [rpFmtDate()](/code/functions/rpFmtDate.md), [rpProjectClause()](/code/functions/rpProjectClause.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

