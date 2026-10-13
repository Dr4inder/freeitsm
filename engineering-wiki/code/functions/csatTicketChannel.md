# csatTicketChannel()

The chat a ticket's customer is talking on, ready to ask in - or null, which means "use the email survey": the setting is off, the ticket's latest contact was not a chat, the channel has gone, or (WhatsApp) the 24-hour window has closed and a free-form message cannot be sent.

```php
function csatTicketChannel(PDO $conn, int $ticketId): ?array
```

Defined in [includes/csat.php](/code/files/includes/csat.php.md), line 120.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |

**Returns:** array{channel:array, from:string, address:string}|null

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 126 | `csatTicketChannel` | read [emails](/code/tables/emails.md) |  |

## Calls

[channelHasServiceWindow()](/code/functions/channelHasServiceWindow.md), [channelWindowOpen()](/code/functions/channelWindowOpen.md), [csatGetSetting()](/code/functions/csatGetSetting.md), [loadMessagingChannel()](/code/functions/loadMessagingChannel.md), [messagingReplyAddress()](/code/functions/messagingReplyAddress.md)

## Called from

- [includes/csat.php](/code/files/includes/csat.php.md) - in [sendCsatSurvey()](/code/functions/sendCsatSurvey.md)

