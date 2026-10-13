# apiAssetsList()

```php
function apiAssetsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 223.

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
| 253 | `apiAssetsList` | read [users_assets](/code/tables/users_assets.md) |  |
| 257 | `apiAssetsList` | read [users_assets](/code/tables/users_assets.md) |  |
| 302 | `apiAssetsList` | read [assets](/code/tables/assets.md) |  |

## Calls

[apiAssetSelect()](/code/functions/apiAssetSelect.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeAsset()](/code/functions/apiSerializeAsset.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

*Nothing calls this function by name.*

