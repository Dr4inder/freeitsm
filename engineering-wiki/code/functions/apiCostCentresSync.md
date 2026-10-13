# apiCostCentresSync()

POST /cost-centres/sync — bring a company's list into line, matched on code

```php
function apiCostCentresSync(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md), line 196.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiCostCentreCompany()](/code/functions/apiCostCentreCompany.md), [apiCostCentresReady()](/code/functions/apiCostCentresReady.md), [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiRequirePermission()](/code/functions/apiRequirePermission.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

