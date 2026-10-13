# apiDomainSelect()

```php
function apiDomainSelect(?PDO $conn = null): string
```

Defined in [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md), line 30.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` | `null` |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 34 | `apiDomainSelect` | read [users](/code/tables/users.md) |  |
| 40 | `apiDomainSelect` | read [suppliers](/code/tables/suppliers.md), read [contacts](/code/tables/contacts.md), read [analysts](/code/tables/analysts.md) |  |
| 44 | `apiDomainSelect` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md), read [suppliers](/code/tables/suppliers.md), read [domain_registrar_accounts](/code/tables/domain_registrar_accounts.md), read [analysts](/code/tables/analysts.md), read [contacts](/code/tables/contacts.md), read [tenants](/code/tables/tenants.md) |  |

## Calls

[domainCustomerReady()](/code/functions/domainCustomerReady.md), [domainPartiesReady()](/code/functions/domainPartiesReady.md)

## Called from

- [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md) - in [apiLoadDomain()](/code/functions/apiLoadDomain.md), [apiDomainsList()](/code/functions/apiDomainsList.md)

