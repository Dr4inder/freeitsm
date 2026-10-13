# presenceLeave()

Drop this analyst's row — the optimisation that makes leaving instant.

```php
function presenceLeave(PDO $conn, int $ticketId, int $analystId): void
```

Defined in [includes/ticket_presence.php](/code/files/includes/ticket_presence.php.md), line 129.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 133 | `presenceLeave` | **delete** [ticket_presence](/code/tables/ticket_presence.md) |  |
| 137 | `presenceLeave` | **delete** [ticket_presence](/code/tables/ticket_presence.md) |  |

## Calls

[presenceSchemaReady()](/code/functions/presenceSchemaReady.md)

## Called from

- [api/tickets/ticket_presence.php](/code/files/api/tickets/ticket_presence.php.md)

