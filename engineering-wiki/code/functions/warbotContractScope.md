# warbotContractScope()

`contractVisibilitySql()` with its company ids written in: these queries bind NAMED parameters, which cannot be mixed with its "?" ones. Every value is a company id, cast to int, so writing them in cannot inject anything.

```php
function warbotContractScope(PDO $conn, int $analystId, string $alias): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 699.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$alias` | `string` |  |  |

**Returns:** `string`

## Calls

[contractVisibilitySql()](/code/functions/contractVisibilitySql.md)

## Called from

- [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) - in [warbotToolSupplierContact()](/code/functions/warbotToolSupplierContact.md)

