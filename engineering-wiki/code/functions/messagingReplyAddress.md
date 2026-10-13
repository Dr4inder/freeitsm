# messagingReplyAddress()

```php
function messagingReplyAddress(string $channelType, array $row): string
```

Defined in [includes/messaging/messaging.php](/code/files/includes/messaging/messaging.php.md), line 407.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$channelType` | `string` |  |  |
| `$row` | `array` |  |  |

**Returns:** `string`

## Called from

- [api/messaging/send_message.php](/code/files/api/messaging/send_message.php.md)
- [includes/csat.php](/code/files/includes/csat.php.md) - in [csatTicketChannel()](/code/functions/csatTicketChannel.md)
- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [ingestInboundMessage()](/code/functions/ingestInboundMessage.md)

