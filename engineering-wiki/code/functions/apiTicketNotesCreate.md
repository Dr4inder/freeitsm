# apiTicketNotesCreate()

POST /tickets/{id}/notes - adds a note to the ticket through TicketsService. Notes are internal unless is_internal is false.

```php
function apiTicketNotesCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 354.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

