# presenceOthers()

Everyone ELSE currently on this ticket, most recently seen first.

Joins `analysts` for the display name and filters `is_active`, so somebody
deactivated mid-session stops being announced. Returns [] on any problem —
an empty strip is a fine answer, a broken reading pane is not.

```php
function presenceOthers(PDO $conn, int $ticketId, int $analystId): array
```

Defined in [includes/ticket_presence.php](/code/files/includes/ticket_presence.php.md), line 97.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 101 | `presenceOthers` | read [ticket_presence](/code/tables/ticket_presence.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[presenceInitials()](/code/functions/presenceInitials.md), [presenceSchemaReady()](/code/functions/presenceSchemaReady.md)

## Called from

- [api/tickets/ticket_presence.php](/code/files/api/tickets/ticket_presence.php.md)

