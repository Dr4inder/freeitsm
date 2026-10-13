# apiLoadIncident()

```php
function apiLoadIncident(PDO $conn, int $incidentId): array
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 148.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$incidentId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiServiceIncidentSelect()](/code/functions/apiServiceIncidentSelect.md)

## Called from

- [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) - in [apiStatusIncidentsGet()](/code/functions/apiStatusIncidentsGet.md), [apiStatusIncidentsCreate()](/code/functions/apiStatusIncidentsCreate.md), [apiStatusIncidentsUpdate()](/code/functions/apiStatusIncidentsUpdate.md)

