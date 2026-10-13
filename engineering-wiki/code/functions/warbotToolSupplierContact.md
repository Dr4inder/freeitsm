# warbotToolSupplierContact()

supplier_contact: up to three suppliers matching by name or contract title, each with its latest contracts (only in companies the analyst can reach) and its active contacts' phone numbers and email.

```php
function warbotToolSupplierContact(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 739.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 749 | `warbotToolSupplierContact` | read [suppliers](/code/tables/suppliers.md), read [contracts](/code/tables/contracts.md) |  |
| 766 | `warbotToolSupplierContact` | read [contracts](/code/tables/contracts.md), read [contract_statuses](/code/tables/contract_statuses.md) |  |
| 779 | `warbotToolSupplierContact` | read [contacts](/code/tables/contacts.md) |  |

## Calls

[warbotContractScope()](/code/functions/warbotContractScope.md), [warbotLike()](/code/functions/warbotLike.md)

*Nothing calls this function by name.*

