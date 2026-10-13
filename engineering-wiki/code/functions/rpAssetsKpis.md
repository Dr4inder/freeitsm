# rpAssetsKpis()

```php
function rpAssetsKpis(PDO $conn, int $analystId, array $o, array $range, $tenant): array
```

Defined in [includes/report_packs/blocks_assets.php](/code/files/includes/report_packs/blocks_assets.php.md), line 43.

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
| 46 | `rpAssetsKpis` | read [assets](/code/tables/assets.md) |  |

## Calls

[rpTenantClause()](/code/functions/rpTenantClause.md), [t()](/code/functions/t.md)

*Nothing calls this function by name.*

