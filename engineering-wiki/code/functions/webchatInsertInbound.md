# webchatInsertInbound()

Store one inbound visitor message against a ticket in the shared `emails` table (channel='webchat'), so the reading-pane thread and reply path work unchanged. Returns the new email id.

```php
function webchatInsertInbound(
    PDO $conn,
    int $ticketId,
    array $conversation,
    array $channel,
    string $body,
    bool $isInitial
): int
```

Defined in [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), line 230.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$conversation` | `array` |  |  |
| `$channel` | `array` |  |  |
| `$body` | `string` |  |  |
| `$isInitial` | `bool` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 245 | `webchatInsertInbound` | **insert** [emails](/code/tables/emails.md) (`exchange_message_id`, `subject`, `from_address`, `from_name`, `to_recipients`, `received_datetime`, `body_content`, `body_type`, `has_attachments`, `is_read`, `processed_datetime`, `ticket_id`) |  |
| 265 | `webchatInsertInbound` | **update** [messaging_channels](/code/tables/messaging_channels.md) (`last_inbound_datetime`) |  |

## Calls

[buildChannelSubject()](/code/functions/buildChannelSubject.md), [webchatVisitorName()](/code/functions/webchatVisitorName.md)

## Called from

- [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md) - in [webchatIngestMessage()](/code/functions/webchatIngestMessage.md), [webchatPromoteToTicket()](/code/functions/webchatPromoteToTicket.md)

