# calendarPullTaskAudit()

One line of task history, marked as having come from a calendar.

```php
function calendarPullTaskAudit(
    PDO $conn,
    int $taskId,
    int $analystId,
    string $field,
    string $old,
    string $new
): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 314.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$field` | `string` |  |  |
| `$old` | `string` |  |  |
| `$new` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 318 | `calendarPullTaskAudit` | **insert** [task_audit](/code/tables/task_audit.md) (`task_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarPullApplyTaskWork()](/code/functions/calendarPullApplyTaskWork.md), [calendarPullApplyTaskDue()](/code/functions/calendarPullApplyTaskDue.md), [calendarPullUnscheduleTask()](/code/functions/calendarPullUnscheduleTask.md)

