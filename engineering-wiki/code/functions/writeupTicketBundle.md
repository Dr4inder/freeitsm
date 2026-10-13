# writeupTicketBundle()

Everything the assistant knows about one ticket: the readable text, the parts it was built from, and the richness score.

Returns ['ref','subject','text','richness','parts','closed_datetime'] or null
if the ticket doesn't exist. Callers are responsible for the access check
BEFORE calling — this function does no scoping of its own, deliberately, so
that omitting the check is a visible omission at the call site rather than a
silent one buried in here.

```php
function writeupTicketBundle(PDO $conn, int $ticketId): ?array
```

Defined in [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md), line 228.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 231 | `writeupTicketBundle` | read [tickets](/code/tables/tickets.md) |  |
| 245 | `writeupTicketBundle` | read [emails](/code/tables/emails.md) |  |
| 255 | `writeupTicketBundle` | read [ticket_notes](/code/tables/ticket_notes.md) |  |
| 267 | `writeupTicketBundle` | read [ticket_time_entries](/code/tables/ticket_time_entries.md) |  |
| 277 | `writeupTicketBundle` | read [problem_tickets](/code/tables/problem_tickets.md) |  |

## Calls

[writeupPlainText()](/code/functions/writeupPlainText.md), [writeupRichness()](/code/functions/writeupRichness.md)

## Called from

- [api/knowledge/writeup_stream.php](/code/files/api/knowledge/writeup_stream.php.md)

