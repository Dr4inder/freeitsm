# assets/js/itsm_calendar.js

> JavaScript - 843 lines

ITSM Calendar Module JavaScript Handles calendar views, event CRUD, and category filtering

## Functions

| Function | Line | What it does |
|---|--:|---|
| `cal(key, english, params)` | 16 | Translate, or the English written at the call site (i18n.js). |
| `calCommon(key, english)` | 19 |  |
| `dayNames()` | 36 |  |
| `monthNames()` | 37 |  |
| `loadCategories()` | 46 |  |
| `renderCategoryFilters()` | 62 |  |
| `toggleCategory(categoryId)` | 80 |  |
| `setView(view)` | 90 |  |
| `goToToday()` | 99 |  |
| `navigatePrev()` | 105 |  |
| `navigateNext()` | 117 |  |
| `renderCalendar()` | 129 |  |
| `updateTitle()` | 145 |  |
| `loadEvents()` | 164 |  |
| `getDateRange()` | 183 |  |
| `getWeekStart(date)` | 209 |  |
| `formatDateForAPI(date)` | 217 |  |
| `renderMonthView(container)` | 222 |  |
| `renderWeekView(container)` | 283 |  |
| `renderDayView(container)` | 348 |  |
| `getEventsForDate(dateStr)` | 412 |  |
| `getEventHour(datetime)` | 421 |  |
| `formatDateForCompare(date)` | 428 |  |
| `formatEventTime(event)` | 436 |  |
| `openEventModal(eventId = null, dateStr = null, hour = null)` | 457 |  |
| `loadEventForEdit(eventId)` | 528 |  |
| `toggleAllDay()` | 562 |  |
| `closeEventModal()` | 569 |  |
| `saveEvent()` | 575 |  |
| `deleteEvent()` | 637 |  |
| `showEventPopup(eventId, clickEvent)` | 669 |  |
| `closeEventPopup()` | 700 |  |
| `editEventFromPopup()` | 705 |  |
| `handleDragStart(eventId, e)` | 719 |  |
| `handleDragEnd(e)` | 726 |  |
| `handleDragOver(e)` | 734 |  |
| `handleDragLeave(e)` | 746 |  |
| `handleDrop(newDateStr, e)` | 754 |  |
| `formatLocalDatetime(d)` | 826 |  |
| `escapeHtml(text)` | 837 |  |

## Loaded by

- [calendar/index.php](/code/files/calendar/index.php.md)

