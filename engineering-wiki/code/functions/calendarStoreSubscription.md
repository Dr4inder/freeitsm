# calendarStoreSubscription()

```php
function calendarStoreSubscription(
    PDO $conn,
    int $analystId,
    string $id,
    string $expires,
    ?string $secret
): void
```

Defined in [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md), line 460.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$id` | `string` |  |  |
| `$expires` | `string` |  |  |
| `$secret` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 469 | `calendarStoreSubscription` | **update** [calendar_enrolments](/code/tables/calendar_enrolments.md) (`subscription_id`, `subscription_expires`, `subscription_secret`, `last_error`) |  |

## Called from

- [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) - in [calendarSyncEnsureSubscription()](/code/functions/calendarSyncEnsureSubscription.md)

