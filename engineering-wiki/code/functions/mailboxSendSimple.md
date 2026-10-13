# mailboxSendSimple()

```php
function mailboxSendSimple(
    PDO $conn,
    array $mailbox,
    string $to,
    string $subject,
    string $htmlBody,
    string $route,
    ?int $ticketId = null
): ?string
```

Defined in [includes/mailbox_send.php](/code/files/includes/mailbox_send.php.md), line 17.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$mailbox` | `array` |  |  |
| `$to` | `string` |  |  |
| `$subject` | `string` |  |  |
| `$htmlBody` | `string` |  |  |
| `$route` | `string` |  |  |
| `$ticketId` | `?int` | `null` |  |

**Returns:** `?string`

## Calls

[emailLogFailed()](/code/functions/emailLogFailed.md), [emailLogSent()](/code/functions/emailLogSent.md), [gmailGetValidAccessToken()](/code/functions/gmailGetValidAccessToken.md), [gmailSendEmail()](/code/functions/gmailSendEmail.md), [imapSmtpSend()](/code/functions/imapSmtpSend.md), [templateGraphContext()](/code/functions/templateGraphContext.md), [templateSendViaGraph()](/code/functions/templateSendViaGraph.md)

## Called from

- [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md) - in [oversizeNotify()](/code/functions/oversizeNotify.md)

