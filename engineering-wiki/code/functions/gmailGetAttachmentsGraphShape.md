# gmailGetAttachmentsGraphShape()

Fetch Gmail attachments for a message and return them in the Graph fileAttachment shape the importer (saveAttachment) expects. Walks nested multiparts.

```php
function gmailGetAttachmentsGraphShape(
    string $accessToken,
    string $messageId,
    array $payload
): array
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 364.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` | `string` |  |  |
| `$messageId` | `string` |  |  |
| `$payload` | `array` |  |  |

**Returns:** `array`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/gmail.php](/code/files/includes/gmail.php.md) - in [gmailGetMessage()](/code/functions/gmailGetMessage.md)

