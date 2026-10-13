# handleEmailAfterProcessing()

Handle email after processing based on action setting Actions: 'delete' (permanent), 'move_to_deleted' (Deleted Items), 'mark_read' (leave in inbox), 'move_to_folder' (custom folder)

```php
function handleEmailAfterProcessing(
    $accessToken,
    $messageId,
    $action,
    $folderName = null,
    $provider = 'microsoft',
    $mailbox = null
)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 736.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` |  |  |  |
| `$messageId` |  |  |  |
| `$action` |  |  |  |
| `$folderName` |  | `null` |  |
| `$provider` |  | `'microsoft'` |  |
| `$mailbox` |  | `null` |  |

## Calls

[deleteEmailFromMailbox()](/code/functions/deleteEmailFromMailbox.md), [gmailMarkAsRead()](/code/functions/gmailMarkAsRead.md), [gmailTrashMessage()](/code/functions/gmailTrashMessage.md), [imapHandleAfterProcessing()](/code/functions/imapHandleAfterProcessing.md), [markEmailAsRead()](/code/functions/markEmailAsRead.md), [moveEmailToFolder()](/code/functions/moveEmailToFolder.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

