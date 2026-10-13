# csatChannelLocale()

The language to write a customer-facing rating message in. Telegram has the customer's own language_code (stored on the identity link); other channels do not report one, so they get English.

```php
function csatChannelLocale(PDO $conn, array $channel, string $from): string
```

Defined in [includes/csat.php](/code/files/includes/csat.php.md), line 156.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$channel` | `array` |  |  |
| `$from` | `string` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 161 | `csatChannelLocale` | read [messaging_identity_links](/code/tables/messaging_identity_links.md) |  |

## Called from

- [includes/csat.php](/code/files/includes/csat.php.md) - in [csatSendInChannel()](/code/functions/csatSendInChannel.md)
- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingRecordCsatReply()](/code/functions/messagingRecordCsatReply.md)

