# enrolBackfillTickets()

Put what is already scheduled into a calendar that has just been switched on (or just changed), rather than only tickets touched from now on — an empty calendar after opting in reads as "it didn't work".

```php
function enrolBackfillTickets(PDO $conn, int $analystId): void
```

Defined in [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md), line 55.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 59 | `enrolBackfillTickets` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## Calls

[calendarSyncReconcileTicket()](/code/functions/calendarSyncReconcileTicket.md), [naive_now()](/code/functions/naive_now.md)

## Called from

- [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md)

