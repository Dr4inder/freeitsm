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
| `loadCategories()` | 46 | Load categories from API |
| `renderCategoryFilters()` | 62 | Render category filter checkboxes |
| `toggleCategory(categoryId)` | 80 | Toggle category filter |
| `setView(view)` | 90 | Set the current view |
| `goToToday()` | 99 | Navigate to today |
| `navigatePrev()` | 105 | Navigate to previous period |
| `navigateNext()` | 117 | Navigate to next period |
| `renderCalendar()` | 129 | Render the calendar based on current view |
| `updateTitle()` | 145 | Update the calendar title |
| `loadEvents()` | 164 | Load events from API for current date range |
| `getDateRange()` | 183 | Get date range for current view |
| `getWeekStart(date)` | 209 | Get start of week (Sunday) |
| `formatDateForAPI(date)` | 217 | Format date for API using local time |
| `renderMonthView(container)` | 222 | Render month view |
| `renderWeekView(container)` | 283 | Render week view |
| `renderDayView(container)` | 348 | Render day view |
| `getEventsForDate(dateStr)` | 412 | Get events for a specific date |
| `getEventHour(datetime)` | 421 | Get hour from datetime string |
| `formatDateForCompare(date)` | 428 | Format date for comparison (YYYY-MM-DD) using local time |
| `formatEventTime(event)` | 436 | Format event time for display |
| `formatTime(d)` | 440 |  |
| `openEventModal(eventId = null, dateStr = null, hour = null)` | 457 | Open event modal |
| `loadEventForEdit(eventId)` | 528 | Load event data for editing |
| `toggleAllDay()` | 562 | Toggle all-day checkbox |
| `closeEventModal()` | 569 | Close event modal |
| `saveEvent()` | 575 | Save event |
| `deleteEvent()` | 637 | Delete event |
| `showEventPopup(eventId, clickEvent)` | 669 | Show event popup (quick view) |
| `closeEventPopup()` | 700 | Close event popup |
| `editEventFromPopup()` | 705 | Edit event from popup |
| `handleDragStart(eventId, e)` | 719 | Drag and drop handlers for month view |
| `handleDragEnd(e)` | 726 |  |
| `handleDragOver(e)` | 734 |  |
| `handleDragLeave(e)` | 746 |  |
| `handleDrop(newDateStr, e)` | 754 |  |
| `formatLocalDatetime(d)` | 826 | Format a Date object as local datetime string (YYYY-MM-DD HH:MM:SS) |
| `escapeHtml(text)` | 837 | Escape HTML for XSS prevention |

## Loaded by

- [calendar/index.php](/code/files/calendar/index.php.md)

