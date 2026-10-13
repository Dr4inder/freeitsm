# apiUserCostCentre()

`cost_centre_id` from a request body for a requester in company `$tenantId` (NULL = Default): an ACTIVE one of that company, or the one they hold. 422 otherwise. Returns [sent?, value].

```php
function apiUserCostCentre(PDO $conn, array $body, ?int $tenantId, ?int $currentId): array
```

Defined in [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md), line 29.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$body` | `array` |  |  |
| `$tenantId` | `?int` |  |  |
| `$currentId` | `?int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [costCentreCheck()](/code/functions/costCentreCheck.md), [costCentreReady()](/code/functions/costCentreReady.md), [costCentreRecordTenant()](/code/functions/costCentreRecordTenant.md)

## Called from

- [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md) - in [apiUsersCreate()](/code/functions/apiUsersCreate.md), [apiUsersUpdate()](/code/functions/apiUsersUpdate.md)

