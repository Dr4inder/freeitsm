# apiAssetLocationsList()

GET /asset-locations - the asset locations for the key's default company, top level first, each with its full path.

```php
function apiAssetLocationsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 659.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiAssetLocationPath()](/code/functions/apiAssetLocationPath.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiRespond()](/code/functions/apiRespond.md), [getTenantConfigRows()](/code/functions/getTenantConfigRows.md)

*Nothing calls this function by name.*

