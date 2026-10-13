# buildEmailMessage()

Build email message structure for Graph API

```php
function buildEmailMessage($to, $cc, $subject, $body, $attachments, $ticketId)
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 316.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` |  |  |  |
| `$cc` |  |  |  |
| `$subject` |  |  |  |
| `$body` |  |  |  |
| `$attachments` |  |  |  |
| `$ticketId` |  |  |  |

## Calls

[parseRecipients()](/code/functions/parseRecipients.md), [processInlineImages()](/code/functions/processInlineImages.md), [uploadedFileParts()](/code/functions/uploadedFileParts.md)

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md)

