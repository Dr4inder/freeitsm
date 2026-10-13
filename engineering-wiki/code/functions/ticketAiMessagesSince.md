# ticketAiMessagesSince()

How many messages have arrived since the summary was written.

```php
function ticketAiMessagesSince(PDO $conn, int $ticketId, ?int $lastEmailId): int
```

Defined in [includes/ticket_ai.php](/code/files/includes/ticket_ai.php.md), line 203.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$lastEmailId` | `?int` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 206 | `ticketAiMessagesSince` | read [emails](/code/tables/emails.md) |  |
| 212 | `ticketAiMessagesSince` | read [emails](/code/tables/emails.md) |  |

## Called from

- [api/tickets/ai_read.php](/code/files/api/tickets/ai_read.php.md)
- [api/tickets/ai_summary.php](/code/files/api/tickets/ai_summary.php.md)

