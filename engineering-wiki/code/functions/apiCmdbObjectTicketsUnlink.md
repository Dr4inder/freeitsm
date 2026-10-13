# apiCmdbObjectTicketsUnlink()

```php
function apiCmdbObjectTicketsUnlink(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), line 543.

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
| 549 | `apiCmdbObjectTicketsUnlink` | **delete** [ticket_cmdb_objects](/code/tables/ticket_cmdb_objects.md) |  |

## Calls

[apiCmdbLoadObject()](/code/functions/apiCmdbLoadObject.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

