# apiCalendarEventsList()

```php
function apiCalendarEventsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), line 111.

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
| 164 | `apiCalendarEventsList` | read [calendar_events](/code/tables/calendar_events.md) |  |

## Calls

[apiCalendarEventSelect()](/code/functions/apiCalendarEventSelect.md), [apiError()](/code/functions/apiError.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseNaiveDatetime()](/code/functions/apiParseNaiveDatetime.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

