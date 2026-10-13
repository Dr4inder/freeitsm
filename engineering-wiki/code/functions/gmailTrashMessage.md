# gmailTrashMessage()

Delete a Gmail message (move to trash).

```php
function gmailTrashMessage(string $accessToken, string $messageId): void
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 479.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` | `string` |  |  |
| `$messageId` | `string` |  |  |

**Returns:** `void`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [handleEmailAfterProcessing()](/code/functions/handleEmailAfterProcessing.md)

