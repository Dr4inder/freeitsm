# apiUsersUpdate()

```php
function apiUsersUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md), line 206.

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
| 221 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |
| 235 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |
| 274 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |
| 286 | `apiUsersUpdate` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 296 | `apiUsersUpdate` | **update** [users](/code/tables/users.md) |  |
| 298 | `apiUsersUpdate` | read [users](/code/tables/users.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeUser()](/code/functions/apiSerializeUser.md), [apiUserColumns()](/code/functions/apiUserColumns.md), [apiUserCostCentre()](/code/functions/apiUserCostCentre.md), [costCentreReady()](/code/functions/costCentreReady.md), [costCentreRecordTenant()](/code/functions/costCentreRecordTenant.md)

*Nothing calls this function by name.*

