# notificationsHandleEvent()

Entry point from WorkflowEngine::dispatch().

Never throws: a notification must not be able to break the thing that caused
it. Never re-enters: writing a notification dispatches nothing.

```php
function notificationsHandleEvent(string $event, array $payload): void
```

Defined in [includes/notifications_router.php](/code/files/includes/notifications_router.php.md), line 46.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `string` |  |  |
| `$payload` | `array` |  |  |

**Returns:** `void`

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md), [notificationsAudienceFor()](/code/functions/notificationsAudienceFor.md), [notificationsBodyFor()](/code/functions/notificationsBodyFor.md), [notificationsCurrentActor()](/code/functions/notificationsCurrentActor.md), [notificationsEntityFor()](/code/functions/notificationsEntityFor.md), [notificationsTaskAssignedEmail()](/code/functions/notificationsTaskAssignedEmail.md)

## Called from

- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::dispatch`

