# getAttachmentById()

Get attachment by ID from database - only if it belongs to this ticket

```php
function getAttachmentById($id, $ticketId)
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 517.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$id` |  |  |  |
| `$ticketId` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 520 | `getAttachmentById` | read [email_attachments](/code/tables/email_attachments.md), read [emails](/code/tables/emails.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md) - in [processInlineImages()](/code/functions/processInlineImages.md)

