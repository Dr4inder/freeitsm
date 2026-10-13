# internalTicketEmail()

Send an internal notification ABOUT a ticket to staff addresses - an SLA alert, a closure with fields missing - from the ticket's own mailbox, or the first active mailbox when the ticket has none (a ticket raised by hand or through the API never touched one).

Not saved to the ticket's conversation and not saved to Sent Items: these go to
staff, not to the requester. Every recipient is written to the email send log
under `$route`, failures included.

Every recipient is attempted even when one fails - one mistyped address on an
escalation list must not stop the rest hearing about it - and the first failure
is thrown once they have all been tried.

```php
function internalTicketEmail(
    PDO $conn,
    int $ticketId,
    array $recipients,
    string $subject,
    string $bodyHtml,
    string $route
): void
```

Defined in [includes/template_email.php](/code/files/includes/template_email.php.md), line 638.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$recipients` | `array` |  |  |
| `$subject` | `string` |  |  |
| `$bodyHtml` | `string` |  |  |
| `$route` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 641 | `internalTicketEmail` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |

## Calls

[decryptMailboxRow()](/code/functions/decryptMailboxRow.md), [emailLogFailed()](/code/functions/emailLogFailed.md), [emailLogSent()](/code/functions/emailLogSent.md), [gmailGetValidAccessToken()](/code/functions/gmailGetValidAccessToken.md), [gmailSendEmail()](/code/functions/gmailSendEmail.md), [imapSmtpSend()](/code/functions/imapSmtpSend.md), [templateGetMailboxForTicket()](/code/functions/templateGetMailboxForTicket.md), [templateGraphContext()](/code/functions/templateGraphContext.md), [templateSendViaGraph()](/code/functions/templateSendViaGraph.md)

## Called from

- [includes/services/mandatory_fields.php](/code/files/includes/services/mandatory_fields.php.md) - in `MandatoryFieldsService::notify`
- [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) - in [sla_send_breach_email()](/code/functions/sla_send_breach_email.md)

