# apiStatusServicesList()

```php
function apiStatusServicesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/service_status.php](/code/files/api/v1/resources/service_status.php.md), line 166.

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
| 182 | `apiStatusServicesList` | read [status_services](/code/tables/status_services.md) |  |

## Calls

[apiRespond()](/code/functions/apiRespond.md), [apiSerializeService()](/code/functions/apiSerializeService.md), [apiServiceStatusSubquery()](/code/functions/apiServiceStatusSubquery.md)

*Nothing calls this function by name.*

