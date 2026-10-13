# projectApiTenantForCreate()

The company a NEW project belongs to: the one the request names (checked against what this analyst may reach), else the analyst's active company.

```php
function projectApiTenantForCreate(PDO $conn, int $analystId, $requested): int
```

Defined in [includes/projects/api_bootstrap.php](/code/files/includes/projects/api_bootstrap.php.md), line 65.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$requested` |  |  |  |

**Returns:** `int`

## Calls

[analystCanAccessTenant()](/code/functions/analystCanAccessTenant.md), [getActiveTenantId()](/code/functions/getActiveTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [projectApiFail()](/code/functions/projectApiFail.md)

## Called from

- [api/projects/save.php](/code/files/api/projects/save.php.md)

