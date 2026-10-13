# api/v1/resources/calendar.php

> API endpoint - 232 lines

FreeITSM REST API v1 — calendar resource (the standalone team calendar).

Mirrors the module's internal endpoints:
  - the list uses get_events.php's exact three-branch window-overlap logic
    (start inclusive, end exclusive);
  - create/update mirror save_event.php (title + start mandatory, end
    defaults to start, all_day 0/1) with friendlier validation: category /
    contract ids get a 422 instead of a raw FK error, and contract links
    honour nothing tenant-y because the calendar is install-wide.

⚠️ Datetime semantics — DIFFERENT from the rest of the API, deliberately:
calendar events are stored as NAIVE SERVER-LOCAL datetimes (the UI writes
what the browser sends, no timezone conversion; the ICS feed interprets
them in the server timezone). To stay pixel-identical with the UI, this
resource accepts and returns naive "YYYY-MM-DD HH:MM:SS" values with NO
timezone conversion, and REJECTS values carrying Z/offset designators so a
consumer can't accidentally mix models.

🛡️ Generated events: the asset-warranty sync owns every row with
source = 'asset_warranty' (it wipes and regenerates them wholesale). The
API exposes `source` on reads (the internal endpoints don't!) and refuses
updates/deletes on generated rows with a 409 — tighter than the UI, which
currently lets you edit one only for the change to evaporate on the next
sync. Consumers can never set `source` on create.

Event WRITES are delegated to CalendarService (includes/services/calendar.php)
so the UI and this API share one code path; the read handlers, serializers +
the naive-datetime parser (also used by the list filters) stay here.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/calendar.php` |
| Protected by | REST API key |
| Reads | `GET from`, `GET to`, `GET all`, `GET contract_id`, `GET category_id`, `GET categories`, `GET source`, `GET q` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiParseNaiveDatetime()](/code/functions/apiParseNaiveDatetime.md) | 45 | Parse a NAIVE local datetime ("YYYY-MM-DD HH:MM[:SS]", T separator OK, date-only OK). 422s on timezone designators — this resource is naive-local by design (see header). |
| [apiCalendarEventSelect()](/code/functions/apiCalendarEventSelect.md) | 66 |  |
| [apiSerializeCalendarEvent()](/code/functions/apiSerializeCalendarEvent.md) | 74 |  |
| [apiLoadCalendarEvent()](/code/functions/apiLoadCalendarEvent.md) | 98 |  |
| [apiCalendarEventsList()](/code/functions/apiCalendarEventsList.md) | 111 |  |
| [apiCalendarEventsGet()](/code/functions/apiCalendarEventsGet.md) | 178 |  |
| [apiCalendarEventsCreate()](/code/functions/apiCalendarEventsCreate.md) | 185 |  |
| [apiCalendarEventsUpdate()](/code/functions/apiCalendarEventsUpdate.md) | 195 |  |
| [apiCalendarEventsDelete()](/code/functions/apiCalendarEventsDelete.md) | 205 |  |
| [apiCalendarCategoriesList()](/code/functions/apiCalendarCategoriesList.md) | 215 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 67 | `apiCalendarEventSelect` | read [calendar_events](/code/tables/calendar_events.md), read [calendar_categories](/code/tables/calendar_categories.md), read [analysts](/code/tables/analysts.md) |  |
| 164 | `apiCalendarEventsList` | read [calendar_events](/code/tables/calendar_events.md) |  |
| 217 | `apiCalendarCategoriesList` | read [calendar_events](/code/tables/calendar_events.md), read [calendar_categories](/code/tables/calendar_categories.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/calendar.php](/code/files/includes/services/calendar.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md)

