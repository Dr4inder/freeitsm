# imapDecodePart()

Decode a transfer-encoded body part (base64 / quoted-printable / raw).

```php
function imapDecodePart(string $data, int $encoding): string
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 285.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$data` | `string` |  |  |
| `$encoding` | `int` |  |  |

**Returns:** `string`

## Called from

- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapWalkStructure()](/code/functions/imapWalkStructure.md)

