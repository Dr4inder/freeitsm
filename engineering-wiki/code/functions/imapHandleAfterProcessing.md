# imapHandleAfterProcessing()

Apply the post-import (or post-reject) action to a message by UID. Mirrors `handleEmailAfterProcessing()`'s action vocabulary for Microsoft/Google.

```php
function imapHandleAfterProcessing(
    array $mailbox,
    int $uid,
    string $action,
    ?string $folderName = null
): int
```

Defined in [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md), line 378.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$mailbox` | `array` |  |  |
| `$uid` | `int` |  |  |
| `$action` | `string` |  |  |
| `$folderName` | `?string` | `null` |  |

**Returns:** `int`

## Calls

[imapStreamFor()](/code/functions/imapStreamFor.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [handleEmailAfterProcessing()](/code/functions/handleEmailAfterProcessing.md)

