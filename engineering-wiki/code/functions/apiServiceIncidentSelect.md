# apiServiceIncidentSelect()

```php
function apiServiceIncidentSelect(): string
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 101.

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 102 | `apiServiceIncidentSelect` | read [status_incidents](/code/tables/status_incidents.md), read [service_incident_statuses](/code/tables/service_incident_statuses.md), read [analysts](/code/tables/analysts.md) |  |

## Called from

- [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) - in [apiLoadIncident()](/code/functions/apiLoadIncident.md), [apiStatusServicesGet()](/code/functions/apiStatusServicesGet.md), [apiStatusIncidentsList()](/code/functions/apiStatusIncidentsList.md)

