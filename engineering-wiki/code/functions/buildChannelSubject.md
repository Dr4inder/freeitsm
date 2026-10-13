# buildChannelSubject()

A short, human ticket subject from the first line of the first message.

```php
function buildChannelSubject(string $channelType, string $displayName, string $body): string
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 925.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$channelType` | `string` |  |  |
| `$displayName` | `string` |  |  |
| `$body` | `string` |  |  |

**Returns:** `string`

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [ingestInboundMessage()](/code/functions/ingestInboundMessage.md)
- [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) - in [webchatInsertInbound()](/code/functions/webchatInsertInbound.md), [webchatIngestMessage()](/code/functions/webchatIngestMessage.md), [webchatPromoteToTicket()](/code/functions/webchatPromoteToTicket.md)

