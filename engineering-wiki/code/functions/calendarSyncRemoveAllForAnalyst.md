# calendarSyncRemoveAllForAnalyst()

Everything FreeITSM put in one analyst's calendar, removed.

```php
function calendarSyncRemoveAllForAnalyst(PDO $conn, int $analystId): void
```

Defined in [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md), line 409.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 413 | `calendarSyncRemoveAllForAnalyst` | read [calendar_sync_events](/code/tables/calendar_sync_events.md) |  |

## Calls

[calendarSyncRemoveRow()](/code/functions/calendarSyncRemoveRow.md), [calendarSyncSchemaReady()](/code/functions/calendarSyncSchemaReady.md)

## Called from

- [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md) - in [enrolSwitchConnection()](/code/functions/enrolSwitchConnection.md)

