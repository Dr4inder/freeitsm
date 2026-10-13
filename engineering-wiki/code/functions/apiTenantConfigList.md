# apiTenantConfigList()

Shared list for the tenant-overridable config tables (add/hide model).

```php
function apiTenantConfigList(PDO $conn, array $apiKey, string $table, string $entityType): void
```

Defined in [api/v1/resources/reference.php](/code/files/api/v1/resources/reference.php.md), line 95.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$table` | `string` |  |  |
| `$entityType` | `string` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiRespond()](/code/functions/apiRespond.md), [getTenantConfigRows()](/code/functions/getTenantConfigRows.md)

## Called from

- [api/v1/resources/reference.php](/code/files/api/v1/resources/reference.php.md) - in [apiTicketTypesList()](/code/functions/apiTicketTypesList.md), [apiOriginsList()](/code/functions/apiOriginsList.md)

