# rpProjectsKpis()

```php
function rpProjectsKpis(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 74.

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
| 81 | `rpProjectsKpis` | read [project_stages](/code/tables/project_stages.md), read [projects](/code/tables/projects.md) |  |

## Calls

[rpProjectClause()](/code/functions/rpProjectClause.md), [rpProjectRows()](/code/functions/rpProjectRows.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

