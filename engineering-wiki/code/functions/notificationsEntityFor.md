# notificationsEntityFor()

Display data for the row: id, human reference, and what it is about.

```php
function notificationsEntityFor(string $event, array $payload, string $entityType): ?array
```

Defined in [includes/notifications_router.php](/code/files/includes/notifications_router.php.md), line 253.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `string` |  |  |
| `$payload` | `array` |  |  |
| `$entityType` | `string` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 358 | `notificationsEntityFor` | read [tickets](/code/tables/tickets.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [includes/notifications_router.php](/code/files/includes/notifications_router.php.md) - in [notificationsHandleEvent()](/code/functions/notificationsHandleEvent.md)

