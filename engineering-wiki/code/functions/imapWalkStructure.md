# imapWalkStructure()

Recursively walk an `imap_fetchstructure()` tree, accumulating decoded HTML/plain body text and Graph-shaped attachment entries.

```php
function imapWalkStructure(
    $stream,
    int $uid,
    $part,
    string $partNo,
    string &$html,
    string &$plain,
    array &$attachments
): void
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 206.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stream` |  |  |  |
| `$uid` | `int` |  |  |
| `$part` |  |  |  |
| `$partNo` | `string` |  |  |
| `$html` | `string` |  |  |
| `$plain` | `string` |  |  |
| `$attachments` | `array` |  |  |

**Returns:** `void`

## Calls

[imapDecodeHeader()](/code/functions/imapDecodeHeader.md), [imapDecodePart()](/code/functions/imapDecodePart.md), [imapToUtf8()](/code/functions/imapToUtf8.md)

## Called from

- [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md) - in [imapNormaliseMessage()](/code/functions/imapNormaliseMessage.md), [imapWalkStructure()](/code/functions/imapWalkStructure.md)

