# imapNormaliseMessage()

Build one normalised (Graph-like) message array from a UID.

```php
function imapNormaliseMessage($stream, int $uid, array $mailbox): ?array
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 118.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stream` |  |  |  |
| `$uid` | `int` |  |  |
| `$mailbox` | `array` |  |  |

**Returns:** `?array`

## Calls

[imapDecodeHeader()](/code/functions/imapDecodeHeader.md), [imapParseAddressList()](/code/functions/imapParseAddressList.md), [imapWalkStructure()](/code/functions/imapWalkStructure.md)

## Called from

- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapGetEmails()](/code/functions/imapGetEmails.md)

