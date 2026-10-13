# apiStatusIncidentsList()

GET /service-status/incidents

```php
function apiStatusIncidentsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 237.

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
| 246 | `apiStatusIncidentsList` | read [status_incident_services](/code/tables/status_incident_services.md) |  |
| 264 | `apiStatusIncidentsList` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md) |  |

## Calls

[apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeIncident()](/code/functions/apiSerializeIncident.md), [apiServiceIncidentSelect()](/code/functions/apiServiceIncidentSelect.md)

*Nothing calls this function by name.*

