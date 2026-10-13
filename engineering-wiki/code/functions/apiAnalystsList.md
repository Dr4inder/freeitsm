# apiAnalystsList()

GET /analysts — active analysts (assignment targets). 3.5.0 (PR #174): ?email= finds one by address (case-insensitive) and ?include_inactive=1 adds deactivated ones, so a provisioning client can find someone it deactivated and switch them back on. is_active is in every row.

```php
function apiAnalystsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/reference.php](/code/files/api/v1/resources/reference.php.md), line 12.

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
| 22 | `apiAnalystsList` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

