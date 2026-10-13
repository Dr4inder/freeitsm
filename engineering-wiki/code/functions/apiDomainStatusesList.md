# apiDomainStatusesList()

GET /domain-statuses · GET /domain-registrar-accounts

```php
function apiDomainStatusesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), line 397.

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
| 398 | `apiDomainStatusesList` | read [domain_statuses](/code/tables/domain_statuses.md) |  |

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

