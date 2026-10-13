# domainApiTenantForCreate()

The company a NEW record belongs to: the one the request names (checked against what this analyst may reach), else the analyst's active company.

```php
function domainApiTenantForCreate(PDO $conn, int $analystId, $requested): int
```

Defined in [includes/domains/api_bootstrap.php](/code/files/includes/domains/api_bootstrap.php.md), line 70.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$requested` |  |  |  |

**Returns:** `int`

## Calls

[analystCanAccessTenant()](/code/functions/analystCanAccessTenant.md), [domainApiFail()](/code/functions/domainApiFail.md), [getActiveTenantId()](/code/functions/getActiveTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/domains/accounts.php](/code/files/api/domains/accounts.php.md)
- [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md)
- [api/domains/save.php](/code/files/api/domains/save.php.md)

