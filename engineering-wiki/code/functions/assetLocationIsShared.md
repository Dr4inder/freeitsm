# assetLocationIsShared()

Is this location shared? False for a missing row or an un-verified install.

```php
function assetLocationIsShared(PDO $conn, int $locationId): bool
```

Defined in [includes/asset_locations.php](/code/files/includes/asset_locations.php.md), line 57.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$locationId` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 61 | `assetLocationIsShared` | read [asset_locations](/code/tables/asset_locations.md) |  |

## Calls

[assetLocationsSharedReady()](/code/functions/assetLocationsSharedReady.md)

## Called from

- [api/assets/delete_asset_location.php](/code/files/api/assets/delete_asset_location.php.md)
- [api/assets/save_asset_location.php](/code/files/api/assets/save_asset_location.php.md)

