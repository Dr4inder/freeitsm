# imapListFolders()

List every folder on the server, with the {host} prefix stripped.

Names come back in modified UTF-7 (IMAP's own encoding), so a folder called
"Anfragen" or "Support/Übergabe" would otherwise be reported back mangled.

```php
function imapListFolders($stream, array $mailbox): array
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 563.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stream` |  |  |  |
| `$mailbox` | `array` |  |  |

**Returns:** array<int, array{name:string, delimiter:string}>

## Calls

[imapMailboxRef()](/code/functions/imapMailboxRef.md)

## Called from

- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapVerifyFolder()](/code/functions/imapVerifyFolder.md)

