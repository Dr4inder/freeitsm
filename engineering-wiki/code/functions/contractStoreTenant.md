# contractStoreTenant()

How a company is stored on a contract: the Default company is NULL, like every scoped table.

```php
function contractStoreTenant(PDO $conn, ?int $tenantId): ?int
```

Defined in [includes/contract_party.php](/code/files/includes/contract_party.php.md), line 52.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Returns:** `?int`

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

## Called from

- [includes/services/contracts.php](/code/files/includes/services/contracts.php.md) - in `ContractsService::writeTenant`

