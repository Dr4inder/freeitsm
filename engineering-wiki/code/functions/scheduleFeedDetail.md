# scheduleFeedDetail()

How much detail THIS analyst's feed carries: 'full' or 'ref'.

🔑 THE ORGANISATION SETS A CEILING; THE ANALYST MAY ONLY GO STRICTER. If the
install says numbers-only, an analyst cannot opt into publishing subjects —
a personal preference must not be able to widen what the organisation decided
to expose. The reverse is fine and encouraged.

```php
function scheduleFeedDetail(PDO $conn, int $analystId): string
```

Defined in [includes/calendar_sync/calendar_sync.php](/code/files/includes/calendar_sync/calendar_sync.php.md), line 385.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 391 | `scheduleFeedDetail` | read [user_preferences](/code/tables/user_preferences.md) |  |

## Calls

[scheduleFeedMode()](/code/functions/scheduleFeedMode.md)

## Called from

- [api/tickets/get_schedule_feed_url.php](/code/files/api/tickets/get_schedule_feed_url.php.md)
- [api/tickets/schedule_feed.php](/code/files/api/tickets/schedule_feed.php.md)

