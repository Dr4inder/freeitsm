# ticketEmailRecipientsAllowed()

May a workflow email about this ticket go to these addresses?

For a normal ticket, always. For a confidential one, only when EVERY address
is the ticket's own requester or an active analyst: the requester already
knows what they wrote, and confidential does not restrict the service desk.
Anybody else - a manager, a distribution list, an outside contact - is
exactly who the flag exists to keep it from, and an email cannot be taken
back. A deny-list could not work here: nobody can list who must not see it.

```php
function ticketEmailRecipientsAllowed(PDO $conn, int $ticketId, string $to): bool
```

Defined in [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md), line 275.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$to` | `string` |  | one address, or several separated by commas or semicolons |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 283 | `ticketEmailRecipientsAllowed` | read [tickets](/code/tables/tickets.md), read [users](/code/tables/users.md) |  |
| 287 | `ticketEmailRecipientsAllowed` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[ticketIsConfidential()](/code/functions/ticketIsConfidential.md)

## Called from

- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::action_send_email`

