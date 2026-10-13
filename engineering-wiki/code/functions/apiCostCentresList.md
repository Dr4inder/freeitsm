# apiCostCentresList()

```php
function apiCostCentresList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md), line 80.

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
| 125 | `apiCostCentresList` | read [cost_centres](/code/tables/cost_centres.md) |  |

## Calls

[apiCostCentreCompany()](/code/functions/apiCostCentreCompany.md), [apiCostCentreSelect()](/code/functions/apiCostCentreSelect.md), [apiCostCentresReady()](/code/functions/apiCostCentresReady.md), [apiError()](/code/functions/apiError.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

