# apiLoadTicket()

Load one ticket (with joins) enforcing the key's company scope; 404s if not visible.

```php
function apiLoadTicket(PDO $conn, array $apiKey, int $ticketId): array
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 99.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$ticketId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiTicketSelect()](/code/functions/apiTicketSelect.md)

## Called from

- [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md) - in [apiTicketsGet()](/code/functions/apiTicketsGet.md), [apiTicketsCreate()](/code/functions/apiTicketsCreate.md), [apiTicketsUpdate()](/code/functions/apiTicketsUpdate.md), [apiTicketsRestore()](/code/functions/apiTicketsRestore.md), [apiTicketNotesList()](/code/functions/apiTicketNotesList.md), [apiTicketThreadList()](/code/functions/apiTicketThreadList.md), [apiTicketAuditList()](/code/functions/apiTicketAuditList.md), [apiTicketSlaGet()](/code/functions/apiTicketSlaGet.md), [apiTicketTimeEntriesList()](/code/functions/apiTicketTimeEntriesList.md)

