# apiTicketsCreate()

POST /tickets

```php
function apiTicketsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 268.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiLoadTicket()](/code/functions/apiLoadTicket.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTicket()](/code/functions/apiSerializeTicket.md), [getTenantById()](/code/functions/getTenantById.md)

*Nothing calls this function by name.*

