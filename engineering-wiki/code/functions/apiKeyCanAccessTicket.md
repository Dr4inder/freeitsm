# apiKeyCanAccessTicket()

May this key access this ticket (by its owning company)? Unknown id => false.

```php
function apiKeyCanAccessTicket(PDO $conn, array $apiKey, int $ticketId): bool
```

Defined in [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md), line 246.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$ticketId` | `int` |  |  |

**Returns:** `bool`

## Calls

[apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md)

## Called from

- [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md) - in [apiCmdbObjectTicketsLink()](/code/functions/apiCmdbObjectTicketsLink.md), [apiCmdbObjectTicketsUnlink()](/code/functions/apiCmdbObjectTicketsUnlink.md)
- [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md) - in [apiTasksGet()](/code/functions/apiTasksGet.md)
- [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md) - in [apiLoadTicket()](/code/functions/apiLoadTicket.md)

