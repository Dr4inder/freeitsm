# warbotToolKnownErrors()

```php
function warbotToolKnownErrors(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 605.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 612 | `warbotToolKnownErrors` | read [problem_tickets](/code/tables/problem_tickets.md), read [problems](/code/tables/problems.md), read [problem_statuses](/code/tables/problem_statuses.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[warbotLike()](/code/functions/warbotLike.md)

*Nothing calls this function by name.*

