# apiLoadCalendarEvent()

```php
function apiLoadCalendarEvent(PDO $conn, int $eventId): array
```

Defined in [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), line 98.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$eventId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiCalendarEventSelect()](/code/functions/apiCalendarEventSelect.md), [apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md) - in [apiCalendarEventsGet()](/code/functions/apiCalendarEventsGet.md), [apiCalendarEventsCreate()](/code/functions/apiCalendarEventsCreate.md), [apiCalendarEventsUpdate()](/code/functions/apiCalendarEventsUpdate.md)

