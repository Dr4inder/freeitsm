# apiStatusIncidentsGet()

GET /service-status/incidents/{id} - one incident with the services it affects.

```php
function apiStatusIncidentsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 313.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadIncident()](/code/functions/apiLoadIncident.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeIncident()](/code/functions/apiSerializeIncident.md)

*Nothing calls this function by name.*

