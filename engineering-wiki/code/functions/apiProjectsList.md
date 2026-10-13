# apiProjectsList()

GET /projects

```php
function apiProjectsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 141.

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
| 190 | `apiProjectsList` | read [projects](/code/tables/projects.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiProjectDecorate()](/code/functions/apiProjectDecorate.md), [apiProjectSelect()](/code/functions/apiProjectSelect.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProject()](/code/functions/apiSerializeProject.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [projectMethodologies()](/code/functions/projectMethodologies.md), [projectStatuses()](/code/functions/projectStatuses.md), [projectVisibleSql()](/code/functions/projectVisibleSql.md)

*Nothing calls this function by name.*

