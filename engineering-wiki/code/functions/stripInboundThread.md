# stripInboundThread()

Strip the quoted thread from an inbound reply Relies on our own visible marker text which survives all email clients, with a generic blockquote fallback

```php
function stripInboundThread($bodyContent)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 1342.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$bodyContent` |  |  |  |

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [saveEmailToDatabase()](/code/functions/saveEmailToDatabase.md)

