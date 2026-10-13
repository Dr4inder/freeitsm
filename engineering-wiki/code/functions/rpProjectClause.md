# rpProjectClause()

The company clause plus members-only (3.3.0): a pack carries a members-only project only when the person it is built for may see it - never for nobody.

```php
function rpProjectClause(PDO $conn, int $analystId, $tenant): array
```

Defined in [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md), line 59.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$tenant` |  |  |  |

**Returns:** `array`

## Calls

[projectVisibleSql()](/code/functions/projectVisibleSql.md), [rpTenantClause()](/code/functions/rpTenantClause.md)

## Called from

- [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md) - in [rpProjectRows()](/code/functions/rpProjectRows.md), [rpProjectsKpis()](/code/functions/rpProjectsKpis.md), [rpProjectsMilestones()](/code/functions/rpProjectsMilestones.md), [rpProjectsRisks()](/code/functions/rpProjectsRisks.md)

