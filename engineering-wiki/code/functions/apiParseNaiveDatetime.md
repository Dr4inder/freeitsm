# apiParseNaiveDatetime()

Parse a NAIVE local datetime ("YYYY-MM-DD HH:MM[:SS]", T separator OK, date-only OK). 422s on timezone designators — this resource is naive-local by design (see header).

```php
function apiParseNaiveDatetime($value, string $field): ?string
```

Defined in [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md), line 45.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

**Returns:** `?string`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/calendar.php](/code/files/api/v1/resources/calendar.php.md) - in [apiCalendarEventsList()](/code/functions/apiCalendarEventsList.md)

