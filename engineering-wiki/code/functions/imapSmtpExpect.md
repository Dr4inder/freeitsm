# imapSmtpExpect()

Read a (possibly multi-line) SMTP reply and assert its status code.

```php
function imapSmtpExpect($fp, array $expected): string
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 539.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fp` |  |  |  |
| `$expected` | `array` |  |  |

**Returns:** `string`

## Called from

- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapSmtpSend()](/code/functions/imapSmtpSend.md), [imapSmtpCommand()](/code/functions/imapSmtpCommand.md)

