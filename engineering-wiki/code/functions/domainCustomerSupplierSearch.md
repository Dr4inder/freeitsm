# domainCustomerSupplierSearch()

Suppliers and supplier contacts matching `$q`, for the same picker (#162). A contact carries its supplier, so choosing one sets both.

```php
function domainCustomerSupplierSearch(PDO $conn, string $q, int $limit = 15): array
```

Defined in [includes/domains/customer.php](/code/files/includes/domains/customer.php.md), line 65.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$q` | `string` |  |  |
| `$limit` | `int` | `15` |  |

**Returns:** array<int,array{kind:string,id:int,name:string,email:?string,supplier_id:?int,supplier:?string}>

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 69 | `domainCustomerSupplierSearch` | read [suppliers](/code/tables/suppliers.md) |  |
| 76 | `domainCustomerSupplierSearch` | read [contacts](/code/tables/contacts.md), read [suppliers](/code/tables/suppliers.md) |  |

## Called from

- [api/domains/people.php](/code/files/api/domains/people.php.md)

