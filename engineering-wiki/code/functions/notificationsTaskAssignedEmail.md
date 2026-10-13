# notificationsTaskAssignedEmail()

"A task has been assigned to you", by email - for an analyst who has turned on Preferences -> Notifications -> "Email me when a task is assigned to me" (user_preferences.task_assigned_email = 'on'; off unless they ask).

Rides on task.assigned, which fires on creation with an assignee and on every
reassignment, from every path that assigns a task (the board, the API, a
workflow, a repeat). The same rules as the bell where they apply: never for
your own action, and not during a bulk run (the caller returns before here).

Sent through `ssSendSystemEmail()` - the first mailbox able to send, the same
route the portal and the training reminders use - and logged in the send log
under 'task'. Written in the RECIPIENT's interface language, not the language
of whoever did the assigning. Never throws.

```php
function notificationsTaskAssignedEmail(
    PDO $conn,
    array $payload,
    int $actorId,
    ?string $actorName
): void
```

Defined in [includes/notifications_router.php](/code/files/includes/notifications_router.php.md), line 400.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$payload` | `array` |  |  |
| `$actorId` | `int` |  |  |
| `$actorName` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 409 | `notificationsTaskAssignedEmail` | read [user_preferences](/code/tables/user_preferences.md) |  |
| 417 | `notificationsTaskAssignedEmail` | read [analysts](/code/tables/analysts.md) |  |
| 425 | `notificationsTaskAssignedEmail` | read [tasks](/code/tables/tasks.md), read [task_priorities](/code/tables/task_priorities.md) |  |

## Calls

[publicAbsoluteUrl()](/code/functions/publicAbsoluteUrl.md), [ssSendSystemEmail()](/code/functions/ssSendSystemEmail.md)

## Called from

- [includes/notifications_router.php](/code/files/includes/notifications_router.php.md) - in [notificationsHandleEvent()](/code/functions/notificationsHandleEvent.md)

