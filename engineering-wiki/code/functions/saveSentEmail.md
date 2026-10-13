# saveSentEmail()

Save sent email to database, including whatever was attached to it.

⚠️ THE ATTACHMENTS HAVE ALREADY GONE. This runs after the send, so nothing
here can refuse a file — it is recording what left the building, not deciding
whether it may. That is why a file the upload policy dislikes is still noted
on the message rather than silently dropped: the ticket has to show what the
requester actually received.

It still stores through includes/uploads.php like every other path, because
these land in tickets/attachments/ inside the web root and a name chosen by
somebody else must never become a file the server would execute.

```php
function saveSentEmail($conn, $ticketId, $mailbox, $to, $cc, $subject, $body, $attachments = [])
```

Defined in [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md), line 767.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$ticketId` |  |  |  |
| `$mailbox` |  |  |  |
| `$to` |  |  |  |
| `$cc` |  |  |  |
| `$subject` |  |  |  |
| `$body` |  |  |  |
| `$attachments` |  | `[]` |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 769 | `saveSentEmail` | **insert** [emails](/code/tables/emails.md) (`subject`, `from_address`, `from_name`, `to_recipients`, `cc_recipients`, `received_datetime`, `body_content`, `body_type`, `ticket_id`, `is_initial`, `direction`, `mailbox_id`) |  |
| 793 | `saveSentEmail` | **update** [tickets](/code/tables/tickets.md) (`updated_datetime`) |  |

## Calls

[saveSentAttachments()](/code/functions/saveSentAttachments.md)

## Called from

- [api/tickets/send_email.php](/code/files/api/tickets/send_email.php.md)

