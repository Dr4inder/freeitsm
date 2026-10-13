# searchIndexTicket()

Index (or reindex) one ticket and everything on it.

Safe to call for a ticket that does not exist, or one that is in the trash —
a deleted ticket's words are removed rather than left sitting in a searchable
table.

```php
function searchIndexTicket(PDO $conn, int $ticketId, int $maxBody = SEARCH_INDEX_MAX_BODY): array
```

Defined in [includes/search/indexer.php](/code/files/includes/search/indexer.php.md), line 53.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$maxBody` | `int` | `SEARCH_INDEX_MAX_BODY` |  |

**Returns:** array{tickets:int,emails:int,notes:int,attachments:int,skipped:int}

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 59 | `searchIndexTicket` | read [tickets](/code/tables/tickets.md) |  |
| 91 | `searchIndexTicket` | read [emails](/code/tables/emails.md) |  |
| 113 | `searchIndexTicket` | read [ticket_notes](/code/tables/ticket_notes.md) |  |

## Calls

[searchCorpusDeleteTicket()](/code/functions/searchCorpusDeleteTicket.md), [searchCorpusPlainText()](/code/functions/searchCorpusPlainText.md), [searchCorpusTicketScope()](/code/functions/searchCorpusTicketScope.md), [searchCorpusUpsert()](/code/functions/searchCorpusUpsert.md), [searchIndexTicketAttachments()](/code/functions/searchIndexTicketAttachments.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md) - in [saveEmailToDatabase()](/code/functions/saveEmailToDatabase.md)
- [includes/search/backfill.php](/code/files/includes/search/backfill.php.md) - in [searchBackfillRun()](/code/functions/searchBackfillRun.md)
- [includes/search/extract_queue.php](/code/files/includes/search/extract_queue.php.md) - in [extractQueueDrain()](/code/functions/extractQueueDrain.md)
- [includes/search/indexer.php](/code/files/includes/search/indexer.php.md) - in [searchIndexHandleEvent()](/code/functions/searchIndexHandleEvent.md)

