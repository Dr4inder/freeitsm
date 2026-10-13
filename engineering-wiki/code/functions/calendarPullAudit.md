# calendarPullAudit()

A ticket_audit row, best effort.

Written directly rather than through TicketsService, because the service's
update would trigger a reconcile that pushes straight back to the calendar we
are reading from — the loop this whole file is careful to avoid.

```php
function calendarPullAudit(
    PDO $conn,
    int $ticketId,
    int $analystId,
    string $field,
    string $old,
    string $new
): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 243.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$field` | `string` |  |  |
| `$old` | `string` |  |  |
| `$new` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 247 | `calendarPullAudit` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarPullApply()](/code/functions/calendarPullApply.md), [calendarPullUnschedule()](/code/functions/calendarPullUnschedule.md)

