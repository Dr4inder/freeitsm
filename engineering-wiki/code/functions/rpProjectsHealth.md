# rpProjectsHealth()

Projects block: a chart of live projects by health (green, amber, red). A snapshot of today.

```php
function rpProjectsHealth(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 99.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$o` | `array` |  |  |
| `$range` | `array` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Calls

[rpProjectRows()](/code/functions/rpProjectRows.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

