# apiAssetTypesList()

Reference lookups The reference lists resolve for the key's default company (globals + that company's own; every row at N=1). Suppliers stay a shared registry.

```php
function apiAssetTypesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md), line 613.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiRespond()](/code/functions/apiRespond.md), [getTenantConfigRows()](/code/functions/getTenantConfigRows.md)

*Nothing calls this function by name.*

