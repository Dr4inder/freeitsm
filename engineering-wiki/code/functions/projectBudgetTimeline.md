# projectBudgetTimeline()

Spend over time for the chart (3.3.0): cumulative planned and actual by day, with the forecast from today to the target finish and the lines to measure against. Undated planned money counts from the start; undated actual money from the day its line was last saved; labour on the day it was logged.

```php
function projectBudgetTimeline(
    PDO $conn,
    array $project,
    array $lineRows,
    array $labourDays,
    float $planned,
    float $actual,
    float $forecast
): array
```

Defined in [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), line 299.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$project` | `array` |  |  |
| `$lineRows` | `array` |  |  |
| `$labourDays` | `array` |  |  |
| `$planned` | `float` |  |  |
| `$actual` | `float` |  |  |
| `$forecast` | `float` |  |  |

**Returns:** `array`

## Called from

- [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) - in [projectBudgetDetail()](/code/functions/projectBudgetDetail.md)

