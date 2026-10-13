# webchatInsertOutbound()

Store an automated/outbound web chat message against a ticket in `emails` (direction='Outbound', channel='webchat'), so the analyst sees it in the thread and the widget's reply-poll picks it up. Used to post the AI's answers alongside the ticket in assist mode. Returns the new email id.

```php
function webchatInsertOutbound(
    PDO $conn,
    int $ticketId,
    array $channel,
    string $body,
    string $fromName
): int
```

Defined in [includes/webchat/webchat.php](/code/files/includes/webchat/webchat.php.md), line 278.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$channel` | `array` |  |  |
| `$body` | `string` |  |  |
| `$fromName` | `string` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 281 | `webchatInsertOutbound` | **insert** [emails](/code/tables/emails.md) (`exchange_message_id`, `subject`, `from_address`, `from_name`, `to_recipients`, `received_datetime`, `body_content`, `body_type`, `has_attachments`, `is_read`, `processed_datetime`, `ticket_id`) |  |

## Called from

- [api/webchat/send.php](/code/files/api/webchat/send.php.md)

