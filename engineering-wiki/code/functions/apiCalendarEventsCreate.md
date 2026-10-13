# apiCalendarEventsCreate()

POST /calendar/events

```php
function apiCalendarEventsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), line 185.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiLoadCalendarEvent()](/code/functions/apiLoadCalendarEvent.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeCalendarEvent()](/code/functions/apiSerializeCalendarEvent.md)

*Nothing calls this function by name.*

