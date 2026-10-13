# calendarClearSubscription()

```php
function calendarClearSubscription(PDO $conn, int $analystId): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 476.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 479 | `calendarClearSubscription` | **update** [calendar_enrolments](/code/tables/calendar_enrolments.md) (`subscription_id`, `subscription_expires`, `subscription_secret`) |  |

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarSyncEnsureSubscription()](/code/functions/calendarSyncEnsureSubscription.md)

