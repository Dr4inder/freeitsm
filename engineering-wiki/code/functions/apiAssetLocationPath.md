# apiAssetLocationPath()

```php
function apiAssetLocationPath(PDO $conn, ?int $locationId): ?string
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 74.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$locationId` | `?int` |  |  |

**Returns:** `?string`

## Calls

[apiAssetLocations()](/code/functions/apiAssetLocations.md)

## Called from

- [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) - in [apiSerializeAsset()](/code/functions/apiSerializeAsset.md), [apiAssetLocationsList()](/code/functions/apiAssetLocationsList.md)

