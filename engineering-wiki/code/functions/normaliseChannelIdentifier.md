# normaliseChannelIdentifier()

Normalise a sender identifier for storage and matching.

⚠️ This USED to be phone-only, and silently destroyed anything that wasn't a
phone number: it stripped every non-digit, so a Slack user id like
"U08ABCDEF" became "+08". Every Slack user whose id contained the same digits
would then collapse onto ONE requester and thread into each other's tickets —
a data leak, not a cosmetic bug. Hence the channel-type argument.

The phone behaviour is unchanged and must stay that way: whatsapp is the
default so every existing caller keeps its exact previous result.

```php
function normaliseChannelIdentifier(string $raw, string $channelType = 'whatsapp'): string
```

Defined in [includes/messaging/messaging.php](/code/files/includes/messaging/messaging.php.md), line 223.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |
| `$channelType` | `string` | `'whatsapp'` |  |

**Returns:** `string`

## Called from

- [api/messaging/test_channel.php](/code/files/api/messaging/test_channel.php.md) - in [simCleanup()](/code/functions/simCleanup.md)
- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [ingestInboundMessage()](/code/functions/ingestInboundMessage.md)

