# assets/js/calendar.js

> JavaScript - 1053 lines

Tickets Calendar JavaScript Month / Week / Day views, matching the standalone Calendar module's UX.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `tr(key, params)` | 17 |  |
| `assignOwnerColours(tickets)` | 66 | Assign colours to the owners actually on screen. |
| `ownerColour(ownerId)` | 73 |  |
| `eventColourStyle(ticket)` | 103 | How an event is coloured, which depends on which question the screen is answering. |
| `calendarTicketTitle(ticket)` | 117 | The hover tooltip for an event. |
| `renderOwnerLegend()` | 131 | Repaint the legend from the tickets on screen. |
| `setScope(scope)` | 154 | Switch between my scheduled work and everyone's, and remember the choice. |
| `shortWeekdayLabel(weekdayIndex)` | 178 |  |
| `monthLabel(monthIndex)` | 186 |  |
| `setView(view)` | 197 |  |
| `goToToday()` | 209 |  |
| `navigatePrev()` | 215 |  |
| `navigateNext()` | 227 |  |
| `changeMonth(delta)` | 239 |  |
| `renderCalendar()` | 245 |  |
| `updateTitle()` | 264 |  |
| `loadScheduledTicketsForRange()` | 283 |  |
| `scheduledBlockHeight(ticket, topMinutes)` | 341 | How tall a scheduled ticket draws, in pixels — the grid is one minute per pixel. |
| `scheduledBlockTop(ticket, startHour, startMinutes, dayHasAllDay)` | 362 | Where a ticket starts, in minutes-as-pixels down the day column. |
| `getWeekStart(date)` | 368 |  |
| `formatDateForCompare(date)` | 378 |  |
| `renderMonthView(container)` | 386 |  |
| `renderWeekView(container)` | 450 |  |
| `renderDayView(container)` | 519 |  |
| `formatHourLabel(hour)` | 568 |  |
| `draggedDurationMinutes(ticket)` | 599 | The dragged ticket's length in minutes, so a move never resizes it. |
| `onEventDragStart(e, ticketId)` | 604 |  |
| `onEventDragEnd(e)` | 612 |  |
| `allowDrop(e, el)` | 617 |  |
| `onDayDrop(e, dateStr)` | 635 | Drop onto a whole day (month view). Keeps the clock time. |
| `onSlotDrop(e, dateStr, columnEl)` | 657 | Drop into a day column at a pixel offset (week / day view). |
| `commitDrag(ticket, dateStr, time)` | 675 |  |
| `applyDrag(ticket, start, end, allDay)` | 688 | Move it on screen FIRST, then save. |
| `renderCurrentView()` | 739 | Repaint the grid from local state, without re-fetching. |
| `showTicketDetail(ticketId)` | 747 |  |
| `syncCalScheduleAllDay()` | 805 | All day means no start time and no duration, so both fields go away. |
| `setCalScheduleDuration(minutes)` | 818 | Put `minutes` in the duration list. |
| `postSchedule(body, okKey)` | 834 | POST a schedule change for the open ticket and repaint. |
| `saveScheduleFromCalendar()` | 860 |  |
| `unscheduleFromCalendar()` | 880 |  |
| `closeTicketModal()` | 898 |  |
| `calendarSignature(list)` | 964 | A fingerprint of what is currently drawn. |
| `calendarRefreshBlocked()` | 973 | Why a refresh is being skipped, or null if it may go ahead. |
| `calendarAutoRefresh()` | 981 |  |
| `startCalendarAutoRefresh()` | 1006 |  |
| `escapeHtml(text)` | 1018 |  |
| `formatScheduleRange(ticket)` | 1030 | "Tue 25 Aug 2026, 14:00 – 15:00", or the date alone when it is an all-day ticket — a time range on something explicitly marked all-day reads as a contradiction, and 00:00–23:59 is storage detail, not information. |
| `formatDateTime(dateStr)` | 1046 |  |

## API endpoints it calls

- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)

## Loaded by

- [tickets/calendar.php](/code/files/tickets/calendar.php.md)

