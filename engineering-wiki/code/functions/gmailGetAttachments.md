# gmailGetAttachments()

Get Gmail attachments for a message. Returns array of [filename, mimeType, data (base64-decoded)].

```php
function gmailGetAttachments(string $accessToken, string $messageId, array $payload): array
```

Defined in [includes/gmail.php](/code/files/includes/gmail.php.md), line 527.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` | `string` |  |  |
| `$messageId` | `string` |  |  |
| `$payload` | `array` |  |  |

**Returns:** `array`

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

*Nothing calls this function by name.*

