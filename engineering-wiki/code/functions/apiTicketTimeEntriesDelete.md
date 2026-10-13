# apiTicketTimeEntriesDelete()

DELETE /tickets/{id}/time-entries/{entryId} - deletes a time entry through TicketsService.

```php
function apiTicketTimeEntriesDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 501.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiRequireTimeTracking()](/code/functions/apiRequireTimeTracking.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

