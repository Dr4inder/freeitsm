# imapGetEmails()

Fetch unread messages, normalised to the Graph-like structure the importer expects. Bodies are fetched with FT_PEEK so messages stay UNSEEN until the configured post-import action runs (mark read / delete / move).

```php
function imapGetEmails(array $mailbox): array
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 90.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$mailbox` | `array` |  |  |

**Returns:** `array`

## Calls

[imapNormaliseMessage()](/code/functions/imapNormaliseMessage.md), [imapStreamFor()](/code/functions/imapStreamFor.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

