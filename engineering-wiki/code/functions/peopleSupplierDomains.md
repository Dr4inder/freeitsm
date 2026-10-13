# peopleSupplierDomains()

Domains a supplier or a contact is involved in, and how: registrar, customer, technical contact. `$who` = ['supplier' => id] or ['contact' => id]. A domain belongs to a company, so only companies the analyst can access count.

```php
function peopleSupplierDomains(PDO $conn, int $analystId, array $who): array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 807.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$who` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 817 | `peopleSupplierDomains` | read [contacts](/code/tables/contacts.md) |  |
| 829 | `peopleSupplierDomains` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |

## Calls

[domainPartiesReady()](/code/functions/domainPartiesReady.md), [entityLink()](/code/functions/entityLink.md), [peopleScope()](/code/functions/peopleScope.md)

## Called from

- [includes/people.php](/code/files/includes/people.php.md) - in [supplierDetail()](/code/functions/supplierDetail.md), [supplierContactDetail()](/code/functions/supplierContactDetail.md)

