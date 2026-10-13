# gmailMarkAsRead()

Mark a Gmail message as read (remove UNREAD label).

```php
function gmailMarkAsRead(string $accessToken, string $messageId): void
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 505.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` | `string` |  |  |
| `$messageId` | `string` |  |  |

**Returns:** `void`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [handleEmailAfterProcessing()](/code/functions/handleEmailAfterProcessing.md)

