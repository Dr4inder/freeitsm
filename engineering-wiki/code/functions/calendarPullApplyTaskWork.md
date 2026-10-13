# calendarPullApplyTaskWork()

A task's work window, moved in the calendar.

```php
function calendarPullApplyTaskWork(PDO $conn, array $row, array $change, string $address): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 264.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$row` | `array` |  |  |
| `$change` | `array` |  |  |
| `$address` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 267 | `calendarPullApplyTaskWork` | **update** [tasks](/code/tables/tasks.md) (`work_start_datetime`, `work_end_datetime`, `work_all_day`, `updated_datetime`) |  |

## Calls

[calendarPullTaskAudit()](/code/functions/calendarPullTaskAudit.md)

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarSyncPullForAnalyst()](/code/functions/calendarSyncPullForAnalyst.md)

