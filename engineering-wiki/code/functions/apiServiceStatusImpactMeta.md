# apiServiceStatusImpactMeta()

Every impact level's colour and severity order, keyed by name - read once per request and cached.

```php
function apiServiceStatusImpactMeta(PDO $conn): array
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 61.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 65 | `apiServiceStatusImpactMeta` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |

## Called from

- [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md) - in [apiSerializeService()](/code/functions/apiSerializeService.md)

