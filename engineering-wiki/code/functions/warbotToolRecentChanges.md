# warbotToolRecentChanges()

```php
function warbotToolRecentChanges(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 460.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 467 | `warbotToolRecentChanges` | read [changes](/code/tables/changes.md), read [change_statuses](/code/tables/change_statuses.md), read [analysts](/code/tables/analysts.md) |  |

*Nothing calls this function by name.*

