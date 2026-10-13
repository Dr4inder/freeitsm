# rpProjectRows()

Projects in the pack's company, decorated with health and progress.

```php
function rpProjectRows(PDO $conn, int $analystId, $tenant, array $ids, bool $liveOnly): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 28.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$tenant` |  |  |  |
| `$ids` | `array` |  |  |
| `$liveOnly` | `bool` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `rpProjectRows` | read [project_stages](/code/tables/project_stages.md) |  |
| 41 | `rpProjectRows` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectDecorate()](/code/functions/projectDecorate.md), [projectExceptionColumns()](/code/functions/projectExceptionColumns.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectTaskStats()](/code/functions/projectTaskStats.md), [rpProjectClause()](/code/functions/rpProjectClause.md)

## Called from

- [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md) - in [rpProjectsKpis()](/code/functions/rpProjectsKpis.md), [rpProjectsHealth()](/code/functions/rpProjectsHealth.md), [rpProjectsStatus()](/code/functions/rpProjectsStatus.md)

