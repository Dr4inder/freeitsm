# assetDiskHideRulesFor()

The rules that could hide a drive on this asset: its own, plus every estate-wide one, scoped to the analyst's active company.

```php
function assetDiskHideRulesFor(PDO $conn, int $analystId, int $assetId): array
```

Defined in [includes/asset_disk_visibility.php](/code/files/includes/asset_disk_visibility.php.md), line 58.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$assetId` | `int` |  |  |

**Returns:** array<int,array{id:int,asset_id:?int,model:?string,size_bytes:?string}>

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 61 | `assetDiskHideRulesFor` | read [asset_disk_hide_rules](/code/tables/asset_disk_hide_rules.md) |  |

## Calls

[activeTenantFilter()](/code/functions/activeTenantFilter.md), [assetDiskHideSchemaReady()](/code/functions/assetDiskHideSchemaReady.md)

## Called from

- [api/assets/get_asset_disks.php](/code/files/api/assets/get_asset_disks.php.md)
- [api/assets/save_disk_hide_rule.php](/code/files/api/assets/save_disk_hide_rule.php.md)

