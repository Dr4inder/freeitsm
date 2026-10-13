# calendarPullUnschedule()

Clear a ticket's schedule because its event was deleted.

```php
function calendarPullUnschedule(PDO $conn, int $ticketId, int $analystId, string $address): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 226.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$address` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 228 | `calendarPullUnschedule` | read [tickets](/code/tables/tickets.md) |  |
| 230 | `calendarPullUnschedule` | **update** [tickets](/code/tables/tickets.md) (`work_start_datetime`, `work_end_datetime`, `work_all_day`) |  |

## Calls

[calendarPullAudit()](/code/functions/calendarPullAudit.md)

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarSyncPullForAnalyst()](/code/functions/calendarSyncPullForAnalyst.md)

