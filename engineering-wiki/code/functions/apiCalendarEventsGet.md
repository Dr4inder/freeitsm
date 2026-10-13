# apiCalendarEventsGet()

GET /calendar/events/{id} - one calendar event.

```php
function apiCalendarEventsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), line 186.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadCalendarEvent()](/code/functions/apiLoadCalendarEvent.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeCalendarEvent()](/code/functions/apiSerializeCalendarEvent.md)

*Nothing calls this function by name.*

