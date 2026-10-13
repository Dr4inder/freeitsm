# includes/calendar_sync/CalendarSyncProvider.php

> PHP - 267 lines

## Classes

- [CalendarSyncProvider](/code/classes/CalendarSyncProvider.md) (class, line 47) - CalendarSyncProvider — the provider-agnostic contract for putting an analyst's scheduled work into the calendar they actually live in (GH discussion #75).
- [CalendarEventMissing](/code/classes/CalendarEventMissing.md) (class, line 258) - The event we were told to update is no longer there.
- [CalendarSubscriptionMissing](/code/classes/CalendarSubscriptionMissing.md) (class, line 266) - The subscription we tried to renew has already lapsed.

## How it hangs together

**Included by:** [includes/calendar_sync/CalDavCalendarProvider.php](/code/files/includes/calendar_sync/CalDavCalendarProvider.php.md), [includes/calendar_sync/calendar_sync.php](/code/files/includes/calendar_sync/calendar_sync.php.md), [includes/calendar_sync/MicrosoftCalendarProvider.php](/code/files/includes/calendar_sync/MicrosoftCalendarProvider.php.md)

