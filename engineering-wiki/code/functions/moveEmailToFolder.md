# moveEmailToFolder()

Move an email to a folder via Microsoft Graph API

```php
function moveEmailToFolder($accessToken, $messageId, $folderName)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 663.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` |  |  |  |
| `$messageId` |  |  |  |
| `$folderName` |  |  |  |

## Calls

[mailboxGraphBase()](/code/functions/mailboxGraphBase.md), [resolveMailFolderId()](/code/functions/resolveMailFolderId.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [handleEmailAfterProcessing()](/code/functions/handleEmailAfterProcessing.md)

