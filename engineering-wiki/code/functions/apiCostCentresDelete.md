# apiCostCentresDelete()

DELETE /cost-centres/{id}

```php
function apiCostCentresDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md), line 181.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiCostCentresReady()](/code/functions/apiCostCentresReady.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadCostCentre()](/code/functions/apiLoadCostCentre.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

