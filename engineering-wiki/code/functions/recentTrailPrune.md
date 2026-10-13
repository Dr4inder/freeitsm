# recentTrailPrune()

Keep the log to its cap, by count and by age.

```php
function recentTrailPrune(PDO $conn, int $analystId): void
```

Defined in [includes/recent_trail.php](/code/files/includes/recent_trail.php.md), line 240.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 243 | `recentTrailPrune` | **delete** [analyst_recent_trail](/code/tables/analyst_recent_trail.md) |  |
| 253 | `recentTrailPrune` | **delete** [analyst_recent_trail](/code/tables/analyst_recent_trail.md) |  |

## Called from

- [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) - in [recentTrailWrite()](/code/functions/recentTrailWrite.md)

