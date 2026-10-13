# apiTicketTimeEntriesCreate()

```php
function apiTicketTimeEntriesCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 462.

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
| 468 | `apiTicketTimeEntriesCreate` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiRequireTimeTracking()](/code/functions/apiRequireTimeTracking.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

