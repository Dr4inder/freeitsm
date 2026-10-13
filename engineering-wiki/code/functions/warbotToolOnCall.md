# warbotToolOnCall()

```php
function warbotToolOnCall(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 494.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 500 | `warbotToolOnCall` | read [ticket_rota_entries](/code/tables/ticket_rota_entries.md), read [analysts](/code/tables/analysts.md), read [ticket_rota_shifts](/code/tables/ticket_rota_shifts.md) |  |

*Nothing calls this function by name.*

