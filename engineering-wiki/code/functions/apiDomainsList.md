# apiDomainsList()

GET /domains

```php
function apiDomainsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), line 164.

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
| 235 | `apiDomainsList` | read [domains](/code/tables/domains.md) |  |

## Calls

[apiDomainSelect()](/code/functions/apiDomainSelect.md), [apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [domainNormalise()](/code/functions/domainNormalise.md), [domainPurposes()](/code/functions/domainPurposes.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

*Nothing calls this function by name.*

