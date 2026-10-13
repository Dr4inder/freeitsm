# warbotToolRecentChanges()

recent_changes: up to 20 changes whose work or outage window started in the last N days (default 2, max 30), with state and owner.

```php
function warbotToolRecentChanges(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 472.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 479 | `warbotToolRecentChanges` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md), read [analysts](/code/tables/analysts.md) |  |

*Nothing calls this function by name.*

