# apiAssetSoftwareList()

GET /assets/{id}/software - the software installed on the asset, by name. System components are left out unless ?include_components=true.

```php
function apiAssetSoftwareList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 605.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 608 | `apiAssetSoftwareList` | read [software_inventory_detail](/code/tables/software_inventory_detail.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadAsset()](/code/functions/apiLoadAsset.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

