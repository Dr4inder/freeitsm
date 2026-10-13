# csatRecordRating()

Record a 1-5 rating once. Returns false if it was already answered or out of range.

```php
function csatRecordRating(PDO $conn, int $responseId, int $rating): bool
```

Defined in [includes/csat.php](/code/files/includes/csat.php.md), line 254.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$responseId` | `int` |  |  |
| `$rating` | `int` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 259 | `csatRecordRating` | **update** [ticket_csat_responses](/code/tables/ticket_csat_responses.md) (`rating`, `responded_datetime`) |  |

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingRecordCsatReply()](/code/functions/messagingRecordCsatReply.md)

