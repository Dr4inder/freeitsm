# gmailGetMessage()

Fetch a single Gmail message and normalise to Graph-like structure.

```php
function gmailGetMessage(string $accessToken, string $messageId): ?array
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 275.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` | `string` |  |  |
| `$messageId` | `string` |  |  |

**Returns:** `?array`

## Calls

[gmailExtractBody()](/code/functions/gmailExtractBody.md), [gmailGetAttachmentsGraphShape()](/code/functions/gmailGetAttachmentsGraphShape.md), [gmailParseAddressList()](/code/functions/gmailParseAddressList.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/gmail.php](/code/files/includes/gmail.php.md) - in [gmailGetEmails()](/code/functions/gmailGetEmails.md)

