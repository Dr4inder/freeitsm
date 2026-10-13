# catalogueScalar()

Runs a prepared query and returns its first column of the first row (false when there is no row).

```php
function catalogueScalar(PDO $conn, string $sql, array $params)
```

Defined in [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md), line 602.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$sql` | `string` |  |  |
| `$params` | `array` |  |  |

## Called from

- [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md) - in [catalogueApprovalsList()](/code/functions/catalogueApprovalsList.md)

