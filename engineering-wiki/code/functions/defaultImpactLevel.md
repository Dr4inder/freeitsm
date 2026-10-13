# defaultImpactLevel()

```php
function defaultImpactLevel(PDO $conn): array
```

Defined in [includes/service_impact_levels.php](/code/files/includes/service_impact_levels.php.md), line 27.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** array{id:?int,name:string,colour:?string} The default impact level. Per-connection cached — it is read several times to build one page.

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 35 | `defaultImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |
| 42 | `defaultImpactLevel` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |

## Called from

- [api/self-service/get_dashboard.php](/code/files/api/self-service/get_dashboard.php.md)
- [api/service-status/get_dashboard.php](/code/files/api/service-status/get_dashboard.php.md)
- [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) - in [apiServiceStatusSubquery()](/code/functions/apiServiceStatusSubquery.md), [apiSerializeService()](/code/functions/apiSerializeService.md)
- [includes/services/service_status.php](/code/files/includes/services/service_status.php.md) - in `ServiceStatusService::validateIncidentServices`

