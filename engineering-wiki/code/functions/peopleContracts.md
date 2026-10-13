# peopleContracts()

Contracts where the person / the company is the CUSTOMER (#153 step 1).

```php
function peopleContracts(PDO $conn, int $analystId, array $who): array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 376.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$who` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 391 | `peopleContracts` | read [contracts](/code/tables/contracts.md), read [contract_statuses](/code/tables/contract_statuses.md) |  |

## Calls

[contractCustomerTenantExpr()](/code/functions/contractCustomerTenantExpr.md), [contractPartyLabel()](/code/functions/contractPartyLabel.md), [contractPartyReady()](/code/functions/contractPartyReady.md), [contractPartySql()](/code/functions/contractPartySql.md), [contractVisibilitySql()](/code/functions/contractVisibilitySql.md), [entityLink()](/code/functions/entityLink.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md)

## Called from

- [includes/people.php](/code/files/includes/people.php.md) - in [personDetail()](/code/functions/personDetail.md), [companyDetail()](/code/functions/companyDetail.md)

