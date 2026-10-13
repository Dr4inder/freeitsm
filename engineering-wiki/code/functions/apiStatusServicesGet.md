# apiStatusServicesGet()

GET /service-status/services/{id} - one service with its open (unresolved) incidents, most recently updated first.

```php
function apiStatusServicesGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 211.

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
| 216 | `apiStatusServicesGet` | read [status_incident_services](/code/tables/status_incident_services.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

## Calls

[apiLoadService()](/code/functions/apiLoadService.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeIncident()](/code/functions/apiSerializeIncident.md), [apiSerializeService()](/code/functions/apiSerializeService.md), [apiServiceIncidentSelect()](/code/functions/apiServiceIncidentSelect.md)

*Nothing calls this function by name.*

