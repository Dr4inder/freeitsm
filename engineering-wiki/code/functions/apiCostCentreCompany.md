# apiCostCentreCompany()

company_id from the body/query, checked against the key - or the key's default company.

```php
function apiCostCentreCompany(PDO $conn, array $apiKey, $raw): int
```

Defined in [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md), line 63.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$raw` |  |  |  |

**Returns:** `int`

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md)

## Called from

- [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md) - in [apiCostCentresList()](/code/functions/apiCostCentresList.md), [apiCostCentresCreate()](/code/functions/apiCostCentresCreate.md), [apiCostCentresSync()](/code/functions/apiCostCentresSync.md)

