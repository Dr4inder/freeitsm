# supplierDetail()

Everything about one supplier this analyst may see, or null.

```php
function supplierDetail(PDO $conn, int $analystId, int $supplierId): ?array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 646.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$supplierId` | `int` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 650 | `supplierDetail` | read [suppliers](/code/tables/suppliers.md), read [supplier_types](/code/tables/supplier_types.md), read [supplier_statuses](/code/tables/supplier_statuses.md) |  |
| 669 | `supplierDetail` | read [contacts](/code/tables/contacts.md) |  |

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [peopleCanSeeSuppliers()](/code/functions/peopleCanSeeSuppliers.md), [peopleContactName()](/code/functions/peopleContactName.md), [peopleContractorTasks()](/code/functions/peopleContractorTasks.md), [peopleSupplierAssets()](/code/functions/peopleSupplierAssets.md), [peopleSupplierContracts()](/code/functions/peopleSupplierContracts.md), [peopleSupplierDomains()](/code/functions/peopleSupplierDomains.md), [peopleSupplierName()](/code/functions/peopleSupplierName.md)

## Called from

- [people/supplier.php](/code/files/people/supplier.php.md)

