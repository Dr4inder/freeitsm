# markEmailAsRead()

Mark an email as read via Microsoft Graph API

```php
function markEmailAsRead($accessToken, $messageId)
```

Defined in [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), line 701.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` |  |  |  |
| `$messageId` |  |  |  |

## Calls

[mailboxGraphBase()](/code/functions/mailboxGraphBase.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [handleEmailAfterProcessing()](/code/functions/handleEmailAfterProcessing.md)

