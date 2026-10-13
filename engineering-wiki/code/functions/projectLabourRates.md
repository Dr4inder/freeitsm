# projectLabourRates()

Every rate, [scope][ref] => [[from, rate], ...] newest first. Cached per request.

```php
function projectLabourRates(PDO $conn): array
```

Defined in [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), line 84.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 89 | `projectLabourRates` | read [project_labour_rates](/code/tables/project_labour_rates.md) |  |

## Called from

- [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) - in [projectLabour()](/code/functions/projectLabour.md), [projectLabourToCome()](/code/functions/projectLabourToCome.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md)

