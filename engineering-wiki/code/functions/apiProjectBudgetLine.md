# apiProjectBudgetLine()

One budget line of a project as the analyst sees it in the budget detail, or answers 404 and stops.

```php
function apiProjectBudgetLine(PDO $conn, array $p, int $lineId, int $analystId): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 569.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$p` | `array` |  |  |
| `$lineId` | `int` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md)

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectBudgetLinesCreate()](/code/functions/apiProjectBudgetLinesCreate.md), [apiProjectBudgetLinesUpdate()](/code/functions/apiProjectBudgetLinesUpdate.md), [apiProjectBudgetLinesDelete()](/code/functions/apiProjectBudgetLinesDelete.md)

