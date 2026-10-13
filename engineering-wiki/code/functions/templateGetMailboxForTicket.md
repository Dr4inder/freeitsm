# templateGetMailboxForTicket()

Get the mailbox associated with a ticket's emails.

```php
function templateGetMailboxForTicket(PDO $conn, int $ticketId): ?array
```

Defined in [includes/template_email.php](/code/files/includes/template_email.php.md), line 455.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 456 | `templateGetMailboxForTicket` | read [emails](/code/tables/emails.md), read [target_mailboxes](/code/tables/target_mailboxes.md) |  |

## Calls

[decryptMailboxRow()](/code/functions/decryptMailboxRow.md)

## Called from

- [includes/csat.php](/code/files/includes/csat.php.md) - in [sendCsatSurvey()](/code/functions/sendCsatSurvey.md)
- [includes/template_email.php](/code/files/includes/template_email.php.md) - in [sendTemplateEmail()](/code/functions/sendTemplateEmail.md), [internalTicketEmail()](/code/functions/internalTicketEmail.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::action_send_email`

