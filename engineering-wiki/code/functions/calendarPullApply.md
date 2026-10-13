# calendarPullApply()

Apply a moved event to its ticket.

```php
function calendarPullApply(PDO $conn, array $row, array $change, string $address): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 211.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$row` | `array` |  |  |
| `$change` | `array` |  |  |
| `$address` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 214 | `calendarPullApply` | **update** [tickets](/code/tables/tickets.md) (`work_start_datetime`, `work_end_datetime`, `work_all_day`) |  |
| 221 | `calendarPullApply` | **update** [calendar_sync_events](/code/tables/calendar_sync_events.md) (`updated_datetime`) |  |

## Calls

[calendarPullAudit()](/code/functions/calendarPullAudit.md)

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarSyncPullForAnalyst()](/code/functions/calendarSyncPullForAnalyst.md)

