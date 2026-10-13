# ticketAiSettings()

```php
function ticketAiSettings(?PDO $conn = null): array
```

Defined in [includes/ticket_ai.php](/code/files/includes/ticket_ai.php.md), line 44.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` | `null` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 71 | `ticketAiSettings` | read [system_settings](/code/tables/system_settings.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [api/tickets/ai_read.php](/code/files/api/tickets/ai_read.php.md)
- [api/tickets/ai_summary.php](/code/files/api/tickets/ai_summary.php.md)
- [tickets/index.php](/code/files/tickets/index.php.md)

