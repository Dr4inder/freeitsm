# icsHeader()

The VCALENDAR header lines. `$name` is what the client shows as the calendar's name.

```php
function icsHeader(string $name, string $tz, int $refreshHours = 6): array
```

Defined in [includes/ics.php](/code/files/includes/ics.php.md), line 50.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$name` | `string` |  |  |
| `$tz` | `string` |  |  |
| `$refreshHours` | `int` | `6` |  |

**Returns:** `array`

## Calls

[icsEscape()](/code/functions/icsEscape.md), [icsFold()](/code/functions/icsFold.md)

## Called from

- [api/calendar/feed.php](/code/files/api/calendar/feed.php.md)
- [api/tickets/schedule_feed.php](/code/files/api/tickets/schedule_feed.php.md)

