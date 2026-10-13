# rpProjectsStatus()

Projects block: a table of projects with health, progress, current stage, target date and, optionally, manager and the reason for the health.

```php
function rpProjectsStatus(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 118.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Calls

[rpFmtDate()](/code/functions/rpFmtDate.md), [rpProjectHealthPill()](/code/functions/rpProjectHealthPill.md), [rpProjectRows()](/code/functions/rpProjectRows.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

