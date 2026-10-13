# apiCmdbObjectTicketsList()

Ticket links — company-scoped on both the CI and the tickets

```php
function apiCmdbObjectTicketsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), line 499.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 507 | `apiCmdbObjectTicketsList` | read [ticket_cmdb_objects](/code/tables/ticket_cmdb_objects.md), read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## Calls

[apiCmdbLoadObject()](/code/functions/apiCmdbLoadObject.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

