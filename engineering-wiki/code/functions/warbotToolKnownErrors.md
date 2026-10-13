# warbotToolKnownErrors()

known_errors: up to six problem records matching the query in title, description, root cause or workaround - known errors first, workaround quoted.

```php
function warbotToolKnownErrors(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 625.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 632 | `warbotToolKnownErrors` | read [problem_tickets](/code/tables/problem_tickets.md), read [problems](/code/tables/problems.md), read [problem_statuses](/code/tables/problem_statuses.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[warbotLike()](/code/functions/warbotLike.md)

*Nothing calls this function by name.*

