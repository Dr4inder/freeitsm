# projectRateOn()

The rate in force on `$date` for one scope/ref, or null.

```php
function projectRateOn(array $rates, string $scope, int $ref, string $date): ?float
```

Defined in [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), line 107.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rates` | `array` |  |  |
| `$scope` | `string` |  |  |
| `$ref` | `int` |  |  |
| `$date` | `string` |  |  |

**Returns:** `?float`

## Called from

- [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) - in [projectLabour()](/code/functions/projectLabour.md), [projectLabourToCome()](/code/functions/projectLabourToCome.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md)

