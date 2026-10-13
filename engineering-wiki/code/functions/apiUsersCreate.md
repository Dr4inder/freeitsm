# apiUsersCreate()

```php
function apiUsersCreate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md), line 142.

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
| 167 | `apiUsersCreate` | read [users](/code/tables/users.md) |  |
| 174 | `apiUsersCreate` | read [users](/code/tables/users.md) |  |
| 195 | `apiUsersCreate` | **insert** [users](/code/tables/users.md) (`email`, `username`, `display_name`, `preferred_name`, `tenant_id`, `created_at`) |  |
| 198 | `apiUsersCreate` | **update** [users](/code/tables/users.md) (`cost_centre_id`) |  |
| 200 | `apiUsersCreate` | read [users](/code/tables/users.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeUser()](/code/functions/apiSerializeUser.md), [apiUserColumns()](/code/functions/apiUserColumns.md), [apiUserCostCentre()](/code/functions/apiUserCostCentre.md), [resolveTenantForNewUser()](/code/functions/resolveTenantForNewUser.md)

*Nothing calls this function by name.*

