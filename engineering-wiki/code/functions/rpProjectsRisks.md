# rpProjectsRisks()

The open risks that matter most, across the chosen projects.

```php
function rpProjectsRisks(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 199.

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
| 205 | `rpProjectsRisks` | read [project_raid](/code/tables/project_raid.md), read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectCode()](/code/functions/projectCode.md), [projectScaleLabels()](/code/functions/projectScaleLabels.md), [rpProjectClause()](/code/functions/rpProjectClause.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

