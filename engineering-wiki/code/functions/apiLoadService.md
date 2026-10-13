# apiLoadService()

```php
function apiLoadService(PDO $conn, int $serviceId): array
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 88.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$serviceId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 90 | `apiLoadService` | read [status_services](/code/tables/status_services.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiServiceStatusSubquery()](/code/functions/apiServiceStatusSubquery.md)

## Called from

- [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) - in [apiStatusServicesGet()](/code/functions/apiStatusServicesGet.md), [apiStatusServicesCreate()](/code/functions/apiStatusServicesCreate.md), [apiStatusServicesUpdate()](/code/functions/apiStatusServicesUpdate.md)

