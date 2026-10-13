# apiContractCompany()

`company_id` from a request body as the service's tenant_id: checked to exist and to be in the key's reach (403), or - on a create with none - the key's default company. On an update with none, nothing: the contract stays put.

```php
function apiContractCompany(PDO $conn, array $apiKey, array $body, bool $creating): array
```

Defined in [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md), line 322.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$body` | `array` |  |  |
| `$creating` | `bool` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md)

## Called from

- [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) - in [apiContractsCreate()](/code/functions/apiContractsCreate.md), [apiContractsUpdate()](/code/functions/apiContractsUpdate.md)

