# notificationsBodyFor()

The one-line description.

Kept as translatable keys resolved at render time rather than baked English in
the database — otherwise a row written today reads in whatever language the
writer happened to be using, forever.

```php
function notificationsBodyFor(string $event, ?string $actorName): string
```

Defined in [includes/notifications_router.php](/code/files/includes/notifications_router.php.md), line 378.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `string` |  |  |
| `$actorName` | `?string` |  |  |

**Returns:** `string`

## Called from

- [includes/notifications_router.php](/code/files/includes/notifications_router.php.md) - in [notificationsHandleEvent()](/code/functions/notificationsHandleEvent.md)

