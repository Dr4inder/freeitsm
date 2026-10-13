# imapSmtpCommand()

Send one SMTP command line and assert the reply code.

```php
function imapSmtpCommand($fp, string $command, array $expected): string
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 533.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fp` |  |  |  |
| `$command` | `string` |  |  |
| `$expected` | `array` |  |  |

**Returns:** `string`

## Calls

[imapSmtpExpect()](/code/functions/imapSmtpExpect.md)

## Called from

- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapSmtpSend()](/code/functions/imapSmtpSend.md)

