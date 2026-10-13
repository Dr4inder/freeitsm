# peopleCompanies()

The companies this analyst can access, with how many people are in each.

```php
function peopleCompanies(PDO $conn, int $analystId): array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 112.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 118 | `peopleCompanies` | read [tenants](/code/tables/tenants.md) |  |
| 122 | `peopleCompanies` | read [users](/code/tables/users.md) |  |

## Calls

[getAccessibleTenantIds()](/code/functions/getAccessibleTenantIds.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [includes/people.php](/code/files/includes/people.php.md) - in [peopleCompanyCards()](/code/functions/peopleCompanyCards.md)
- [people/index.php](/code/files/people/index.php.md)

