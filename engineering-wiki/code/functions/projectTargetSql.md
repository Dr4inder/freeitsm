# projectTargetSql()

[FROM/WHERE for the assets in scope, args, the "is done" expression, its args] for one target on one project. Built from the whitelists only.

```php
function projectTargetSql(PDO $conn, array $project, array $t): array
```

Defined in [includes/projects/targets.php](/code/files/includes/projects/targets.php.md), line 115.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$project` | `array` |  |  |
| `$t` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 120 | `projectTargetSql` | read [project_assets](/code/tables/project_assets.md) |  |

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [projectTargetDoneFields()](/code/functions/projectTargetDoneFields.md), [projectTargetNormalise()](/code/functions/projectTargetNormalise.md), [projectTargetScopeFields()](/code/functions/projectTargetScopeFields.md)

## Called from

- [includes/projects/targets.php](/code/files/includes/projects/targets.php.md) - in [projectTargetCount()](/code/functions/projectTargetCount.md), [projectTargetAssets()](/code/functions/projectTargetAssets.md)

