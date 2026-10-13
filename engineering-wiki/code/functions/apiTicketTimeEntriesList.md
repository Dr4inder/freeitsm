# apiTicketTimeEntriesList()

GET /tickets/{id}/time-entries - the ticket's active time entries, oldest first. Refused when time tracking is off for the ticket.

```php
function apiTicketTimeEntriesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 456.

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
| 460 | `apiTicketTimeEntriesList` | read [ticket_time_entries](/code/tables/ticket_time_entries.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadTicket()](/code/functions/apiLoadTicket.md), [apiRequireTimeTracking()](/code/functions/apiRequireTimeTracking.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

