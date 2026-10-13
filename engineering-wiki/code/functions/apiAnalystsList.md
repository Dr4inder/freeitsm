# apiAnalystsList()

FreeITSM REST API v1 — reference data: the lookups an integration needs to build valid ticket writes (statuses, priorities, ticket types, origins, departments), plus analysts and companies.

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

