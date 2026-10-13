# csatStoredRating()

The rating a survey holds, or null while it is unanswered.

```php
function csatStoredRating(PDO $conn, int $responseId): ?int
```

Defined in [includes/csat.php](/code/files/includes/csat.php.md), line 242.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$responseId` | `int` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 244 | `csatStoredRating` | read [ticket_csat_responses](/code/tables/ticket_csat_responses.md) |  |

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingRecordCsatReply()](/code/functions/messagingRecordCsatReply.md)

