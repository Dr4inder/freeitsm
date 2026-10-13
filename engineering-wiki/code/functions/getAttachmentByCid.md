# getAttachmentByCid()

Get attachment by CID and email_id from database - only if it belongs to this ticket

```php
function getAttachmentByCid($cid, $emailId, $ticketId)
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 536.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cid` |  |  |  |
| `$emailId` |  |  |  |
| `$ticketId` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 542 | `getAttachmentByCid` | read [email_attachments](/code/tables/email_attachments.md), read [emails](/code/tables/emails.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md) - in [processInlineImages()](/code/functions/processInlineImages.md)

