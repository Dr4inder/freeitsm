# apiSerializeService()

```php
function apiSerializeService(PDO $conn, array $r): array
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 71.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$r` | `array` |  |  |

**Returns:** `array`

## Calls

[apiServiceStatusImpactMeta()](/code/functions/apiServiceStatusImpactMeta.md), [defaultImpactLevel()](/code/functions/defaultImpactLevel.md)

## Called from

- [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) - in [apiStatusServicesList()](/code/functions/apiStatusServicesList.md), [apiStatusServicesGet()](/code/functions/apiStatusServicesGet.md), [apiStatusServicesCreate()](/code/functions/apiStatusServicesCreate.md), [apiStatusServicesUpdate()](/code/functions/apiStatusServicesUpdate.md)

