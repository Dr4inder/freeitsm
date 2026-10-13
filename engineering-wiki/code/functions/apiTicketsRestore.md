# apiTicketsRestore()

POST /tickets/{id}/restore - restores a deleted ticket through TicketsService and returns it.

```php
function apiTicketsRestore(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 320.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadTicket()](/code/functions/apiLoadTicket.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTicket()](/code/functions/apiSerializeTicket.md)

*Nothing calls this function by name.*

