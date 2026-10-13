# apiCmdbObjectTicketsLink()

POST /cmdb/objects/{id}/tickets - links a ticket to the object. Both must be in the key's companies; a link that already exists answers 409.

```php
function apiCmdbObjectTicketsLink(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), line 533.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

**Writes:** ticket_cmdb_objects - the link, with the key's analyst as creator

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 546 | `apiCmdbObjectTicketsLink` | **insert** [ticket_cmdb_objects](/code/tables/ticket_cmdb_objects.md) (`ticket_id`, `cmdb_object_id`, `created_datetime`, `created_by_analyst_id`) |  |

## Calls

[apiCmdbLoadObject()](/code/functions/apiCmdbLoadObject.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

