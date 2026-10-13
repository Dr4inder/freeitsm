# emailLogSent()

Convenience: a send that succeeded.

```php
function emailLogSent(
    ?PDO $conn,
    ?array $mailbox,
    string $route,
    string $to,
    string $subject,
    ?int $ticketId = null
): void
```

Defined in [includes/email_log.php](/code/files/includes/email_log.php.md), line 113.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$mailbox` | `?array` |  |  |
| `$route` | `string` |  |  |
| `$to` | `string` |  |  |
| `$subject` | `string` |  |  |
| `$ticketId` | `?int` | `null` | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `void`

## Calls

[emailLogRecord()](/code/functions/emailLogRecord.md)

## Called from

- [api/auth/request_password_reset.php](/code/files/api/auth/request_password_reset.php.md)
- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md)
- [includes/mailbox_send.php](/code/files/includes/mailbox_send.php.md) - in [mailboxSendSimple()](/code/functions/mailboxSendSimple.md)
- [includes/self_service_email.php](/code/files/includes/self_service_email.php.md) - in [ssSendSystemEmail()](/code/functions/ssSendSystemEmail.md)
- [includes/template_email.php](/code/files/includes/template_email.php.md) - in [sendTemplateEmail()](/code/functions/sendTemplateEmail.md), [internalTicketEmail()](/code/functions/internalTicketEmail.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::action_send_email`

