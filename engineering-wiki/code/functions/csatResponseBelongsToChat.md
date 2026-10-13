# csatResponseBelongsToChat()

Was this request sent to this customer on this channel? Guards a button press against a forged or replayed id.

```php
function csatResponseBelongsToChat(PDO $conn, int $responseId, int $channelId, string $from): bool
```

Defined in [includes/csat.php](/code/files/includes/csat.php.md), line 231.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$responseId` | `int` |  |  |
| `$channelId` | `int` |  |  |
| `$from` | `string` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 233 | `csatResponseBelongsToChat` | read [ticket_csat_responses](/code/tables/ticket_csat_responses.md) |  |

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingRecordCsatReply()](/code/functions/messagingRecordCsatReply.md)

