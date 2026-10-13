# costCentreSelectSql()

Columns for any SELECT over a table with cost_centre_id, alias `$a`: cost_centre_id and cost_centre_label ("CODE Name"). NULLs before Verification.

```php
function costCentreSelectSql(PDO $conn, string $table, string $a): string
```

Defined in [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), line 110.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$table` | `string` |  |  |
| `$a` | `string` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 113 | `costCentreSelectSql` | read [cost_centres](/code/tables/cost_centres.md) |  |

## Calls

[costCentreReady()](/code/functions/costCentreReady.md)

## Called from

- [api/contracts/get_contract.php](/code/files/api/contracts/get_contract.php.md)
- [api/contracts/get_contracts.php](/code/files/api/contracts/get_contracts.php.md)
- [api/tickets/get_person.php](/code/files/api/tickets/get_person.php.md)
- [includes/people.php](/code/files/includes/people.php.md) - in [personDetail()](/code/functions/personDetail.md)

