# apiUsersGet()

GET /users/{id}

```php
function apiUsersGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md), line 112.

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
| 120 | `apiUsersGet` | read [users](/code/tables/users.md) |  |
| 131 | `apiUsersGet` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyTicketFilter()](/code/functions/apiKeyTicketFilter.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeUser()](/code/functions/apiSerializeUser.md), [apiUserColumns()](/code/functions/apiUserColumns.md)

*Nothing calls this function by name.*

