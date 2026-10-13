# presenceHeartbeat()

Record that this analyst is on this ticket. Upserts onto the (ticket, analyst) unique key, so a ticket left open all afternoon is one row, not a thousand.

`$composing` is the state worth warning about — the reply, forward or note
composer being open — as opposed to merely having the ticket on screen.

```php
function presenceHeartbeat(PDO $conn, int $ticketId, int $analystId, bool $composing): void
```

Defined in [includes/ticket_presence.php](/code/files/includes/ticket_presence.php.md), line 76.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$composing` | `bool` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 80 | `presenceHeartbeat` | **insert** [ticket_presence](/code/tables/ticket_presence.md) (`ticket_id`, `analyst_id`, `last_seen`, `is_composing`) |  |

## Calls

[presenceSchemaReady()](/code/functions/presenceSchemaReady.md)

## Called from

- [api/tickets/ticket_presence.php](/code/files/api/tickets/ticket_presence.php.md)

