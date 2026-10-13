# rpSoftwareScope()

"JOIN assets + company + system components" for inventory queries.

```php
function rpSoftwareScope(PDO $conn, int $analystId, $tenant, bool $includeSystem): array
```

Defined in [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md), line 16.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$tenant` |  |  |  |
| `$includeSystem` | `bool` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 20 | `rpSoftwareScope` | read [assets](/code/tables/assets.md) |  |

## Calls

[rpTenantClause()](/code/functions/rpTenantClause.md)

## Called from

- [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md) - in [rpSoftwareByPublisher()](/code/functions/rpSoftwareByPublisher.md), [rpSoftwareTopApps()](/code/functions/rpSoftwareTopApps.md), [rpSoftwareKpis()](/code/functions/rpSoftwareKpis.md)

