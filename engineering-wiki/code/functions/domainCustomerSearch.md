# domainCustomerSearch()

People who could be the customer of a domain in company `$tenantId`, matching `$q`.

```php
function domainCustomerSearch(PDO $conn, ?int $tenantId, string $q, int $limit = 25): array
```

Defined in [includes/domains/customer.php](/code/files/includes/domains/customer.php.md), line 93.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `?int` |  | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |
| `$q` | `string` |  |  |
| `$limit` | `int` | `25` |  |

**Returns:** array<int,array{id:int,name:string,email:?string}>

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 96 | `domainCustomerSearch` | read [users](/code/tables/users.md) |  |

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/domains/people.php](/code/files/api/domains/people.php.md)

