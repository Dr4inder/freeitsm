# assets/js/change-calendar.js

> JavaScript - 545 lines

Change Management Calendar JavaScript Read-only calendar view of scheduled changes, filtered by status Adapted from itsm_calendar.js

## Functions

| Function | Line | What it does |
|---|--:|---|
| `loadStatuses()` | 34 |  |
| `renderStatusFilters()` | 60 |  |
| `toggleStatus(statusName)` | 73 |  |
| `setView(view)` | 83 |  |
| `goToToday()` | 92 |  |
| `navigatePrev()` | 98 |  |
| `navigateNext()` | 110 |  |
| `renderCalendar()` | 122 |  |
| `updateTitle()` | 138 |  |
| `loadChanges()` | 157 |  |
| `getDateRange()` | 176 |  |
| `getWeekStart(date)` | 202 |  |
| `formatDateForAPI(date)` | 210 |  |
| `renderMonthView(container)` | 215 |  |
| `renderWeekView(container)` | 273 |  |
| `renderDayView(container)` | 336 |  |
| `getEventsForDate(dateStr)` | 387 |  |
| `getEventHour(datetime)` | 396 |  |
| `formatDateForCompare(date)` | 403 |  |
| `formatEventTime(evt)` | 417 |  |
| `formatDatetimeRange(startStr, endStr)` | 438 |  |
| `showChangePopup(changeId, clickEvent)` | 461 |  |
| `closeChangePopup()` | 510 |  |
| `openChange(id)` | 523 |  |
| `formatLocalDatetime(d)` | 528 |  |
| `escapeHtml(text)` | 539 |  |

## Loaded by

- [change-management/calendar.php](/code/files/change-management/calendar.php.md)

