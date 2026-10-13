# calendarSyncEventFromTask()

One task, as a calendar event of the given kind. Null when the task has nothing to say for that kind.

```php
function calendarSyncEventFromTask(array $t, string $kind): ?array
```

Defined in [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md), line 308.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$t` | `array` |  |  |
| `$kind` | `string` |  |  |

**Returns:** `?array`

## Calls

[requestScheme()](/code/functions/requestScheme.md)

## Called from

- [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md) - in [calendarSyncReconcileTask()](/code/functions/calendarSyncReconcileTask.md)

