# saveSentAttachments()

Put the files an analyst attached to a reply on the ticket.

Same convention as inbound mail (check_mailbox_email.php) and the portal
(self-service/reply_ticket.php): tickets/attachments/{floor(id/1000)}/{id}/,
so get_attachment.php serves them with no changes and the reading pane shows
them against the message they went with.

Without this the file reached the requester and left NO trace on the ticket —
so the next analyst to open it saw a reply referring to a document that,
as far as FreeITSM was concerned, had never existed. Reported by Ed.

```php
function saveSentAttachments($conn, $emailId, $attachments)
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 817.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$emailId` |  |  |  |
| `$attachments` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 835 | `saveSentAttachments` | **insert** [email_attachments](/code/tables/email_attachments.md) (`email_id`, `filename`, `content_type`, `file_path`, `file_size`, `is_inline`, `created_datetime`) |  |
| 872 | `saveSentAttachments` | **update** [emails](/code/tables/emails.md) (`has_attachments`) |  |
| 881 | `saveSentAttachments` | **update** [emails](/code/tables/emails.md) (`body_content`) |  |

## Calls

[attachmentAllowedTypes()](/code/functions/attachmentAllowedTypes.md), [attachmentRejectPolicy()](/code/functions/attachmentRejectPolicy.md), [uploadStoreBytes()](/code/functions/uploadStoreBytes.md)

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md) - in [saveSentEmail()](/code/functions/saveSentEmail.md)

