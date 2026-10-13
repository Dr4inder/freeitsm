# apiStatusServicesCreate()

POST /service-status/services - creates a service through ServiceStatusService and returns it.

```php
function apiStatusServicesCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 231.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadService()](/code/functions/apiLoadService.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeService()](/code/functions/apiSerializeService.md), [apiServiceStatusFail()](/code/functions/apiServiceStatusFail.md)

*Nothing calls this function by name.*

