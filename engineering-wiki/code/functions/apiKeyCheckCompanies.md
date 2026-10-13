# apiKeyCheckCompanies()

For System -> API: refuse a company list the key's analyst cannot reach, so a key is never saved promising access it will not have. Throws Exception.

```php
function apiKeyCheckCompanies(PDO $conn, int $analystId, ?array $companyIds): void
```

Defined in [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md), line 193.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$companyIds` | `?array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 197 | `apiKeyCheckCompanies` | read [tenants](/code/tables/tenants.md) |  |
| 205 | `apiKeyCheckCompanies` | read [tenants](/code/tables/tenants.md) |  |

## Calls

[getAccessibleTenantIds()](/code/functions/getAccessibleTenantIds.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/system/api_keys/create_key.php](/code/files/api/system/api_keys/create_key.php.md)
- [api/system/api_keys/update_key.php](/code/files/api/system/api_keys/update_key.php.md)

