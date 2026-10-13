# apiProblemsCreate()

```php
function apiProblemsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 251.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiLoadProblem()](/code/functions/apiLoadProblem.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProblem()](/code/functions/apiSerializeProblem.md), [getTenantById()](/code/functions/getTenantById.md)

*Nothing calls this function by name.*

