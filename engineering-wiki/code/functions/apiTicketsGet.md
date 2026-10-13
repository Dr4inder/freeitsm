# apiTicketsGet()

```php
function apiTicketsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/tickets.php](/code/files/api/v1/resources/tickets.php.md), line 242.

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
| 248 | `apiTicketsGet` | read [emails](/code/tables/emails.md) |  |

## Calls

[apiLoadTicket()](/code/functions/apiLoadTicket.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeTicket()](/code/functions/apiSerializeTicket.md)

*Nothing calls this function by name.*

