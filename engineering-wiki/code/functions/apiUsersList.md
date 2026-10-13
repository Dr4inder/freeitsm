# apiUsersList()

GET /users?q=&email=

```php
function apiUsersList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md), line 67.

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
| 94 | `apiUsersList` | read [users](/code/tables/users.md) |  |
| 101 | `apiUsersList` | read [users](/code/tables/users.md) |  |

## Calls

[apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [apiUserColumns()](/code/functions/apiUserColumns.md)

*Nothing calls this function by name.*

