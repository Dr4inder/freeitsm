# apiCalendarEventsDelete()

DELETE /calendar/events/{id}

```php
function apiCalendarEventsDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), line 213.

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

