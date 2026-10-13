# includes/ics.php

> PHP - 146 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [icsEscape()](/code/functions/icsEscape.md) | 18 | Escape a text value per RFC 5545 (backslash, newline, comma, semicolon). |
| [icsFold()](/code/functions/icsFold.md) | 35 | Fold a content line to <=75 octets; continuation lines start with a space. |
| [icsHeader()](/code/functions/icsHeader.md) | 50 | The VCALENDAR header lines. `$name` is what the client shows as the calendar's name. |
| [icsEvent()](/code/functions/icsEvent.md) | 87 | One VEVENT. |
| [icsRespond()](/code/functions/icsRespond.md) | 138 | Emit the finished calendar with the right headers. |

## How it hangs together

**Included by:** [api/calendar/feed.php](/code/files/api/calendar/feed.php.md), [api/tickets/schedule_feed.php](/code/files/api/tickets/schedule_feed.php.md), [includes/calendar_sync/CalDavCalendarProvider.php](/code/files/includes/calendar_sync/CalDavCalendarProvider.php.md)

