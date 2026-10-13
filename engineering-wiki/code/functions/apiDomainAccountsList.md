# apiDomainAccountsList()

GET /domain-registrar-accounts - the registrar accounts in the key's companies, with registrar, owner, company and how many domains each holds.

```php
function apiDomainAccountsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), line 409.

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
| 412 | `apiDomainAccountsList` | read [domains](/code/tables/domains.md), read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md), read [suppliers](/code/tables/suppliers.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |

## Calls

[apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

