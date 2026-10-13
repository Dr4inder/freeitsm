# mimeBuildMessage()

```php
function mimeBuildMessage(array $m): string
```

Defined in [includes/mime_message.php](/code/files/includes/mime_message.php.md), line 50.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$m` | `array` |  | from, fromName, to (list), cc (list), subject, html, parts (list), envelope (bool: add Date + Message-ID - SMTP only, see below) |

**Returns:** `string`

## Calls

[mimeEncodeHeader()](/code/functions/mimeEncodeHeader.md), [mimeHtmlPart()](/code/functions/mimeHtmlPart.md), [mimeMessageId()](/code/functions/mimeMessageId.md), [mimeMultipart()](/code/functions/mimeMultipart.md)

## Called from

- [includes/gmail.php](/code/files/includes/gmail.php.md) - in [gmailSendEmail()](/code/functions/gmailSendEmail.md)
- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapSmtpSend()](/code/functions/imapSmtpSend.md)

