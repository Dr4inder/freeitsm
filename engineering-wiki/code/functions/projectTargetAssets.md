# projectTargetAssets()

The assets still to do on a target (or all of them, `$done` = true), at most `$limit` - for the "what's left" list. Callers check Assets access first.

```php
function projectTargetAssets(
    PDO $conn,
    array $project,
    array $t,
    bool $doneOnes = false,
    int $limit = 200
): array
```

Defined in [includes/projects/targets.php](/code/files/includes/projects/targets.php.md), line 256.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$project` | `array` |  |  |
| `$t` | `array` |  |  |
| `$doneOnes` | `bool` | `false` |  |
| `$limit` | `int` | `200` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 265 | `projectTargetAssets` | read [asset_status_types](/code/tables/asset_status_types.md), read [asset_locations](/code/tables/asset_locations.md) |  |

## Calls

[entityLink()](/code/functions/entityLink.md), [projectTargetSql()](/code/functions/projectTargetSql.md)

## Called from

- [api/projects/tools.php](/code/files/api/projects/tools.php.md)

## Traps

> [!WARNING]
> **Line 259, in `projectTargetAssets`:** an asset with no status makes "status = 6" NULL, not false, and NOT(NULL) is NULL too - the asset would vanish from "still to do". The count's CASE WHEN already treats NULL as not done; this must agree.

