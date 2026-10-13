# apiProjectsCreate()

POST /projects (optionally {template: "builtin:office_move" | "saved:12"})

```php
function apiProjectsCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 228.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectCtx()](/code/functions/apiProjectCtx.md), [apiProjectFields()](/code/functions/apiProjectFields.md), [apiProjectTry()](/code/functions/apiProjectTry.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProject()](/code/functions/apiSerializeProject.md), [getTenantById()](/code/functions/getTenantById.md)

*Nothing calls this function by name.*

