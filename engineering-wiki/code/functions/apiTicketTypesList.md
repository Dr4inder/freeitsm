# apiTicketTypesList()

GET /ticket-types (?company_id= applies the per-company add/hide overrides)

```php
function apiTicketTypesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/reference.php](/code/files/api/v1/resources/reference.php.md), line 85.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiTenantConfigList()](/code/functions/apiTenantConfigList.md)

*Nothing calls this function by name.*

