# messagingReplyAddress()

The address to reply to on a conversation row - to_recipients on threaded channels (Slack, Teams, Mattermost), from_address elsewhere.

```php
function messagingReplyAddress(string $channelType, array $row): string
```

Defined in [includes/messaging/messaging.php](/code/files/includes/messaging/messaging.php.md), line 411.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$channelType` | `string` |  |  |
| `$row` | `array` |  |  |

**Returns:** `string`

## Called from

- [api/messaging/send_message.php](/code/files/api/messaging/send_message.php.md)
- [includes/csat.php](/code/files/includes/csat.php.md) - in [csatTicketChannel()](/code/functions/csatTicketChannel.md)
- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [ingestInboundMessage()](/code/functions/ingestInboundMessage.md)

