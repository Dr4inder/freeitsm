# apiProjectBudgetLine()

```php
function apiProjectBudgetLine(PDO $conn, array $p, int $lineId, int $analystId): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 522.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$p` | `array` |  |  |
| `$lineId` | `int` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md)

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectBudgetLinesCreate()](/code/functions/apiProjectBudgetLinesCreate.md), [apiProjectBudgetLinesUpdate()](/code/functions/apiProjectBudgetLinesUpdate.md), [apiProjectBudgetLinesDelete()](/code/functions/apiProjectBudgetLinesDelete.md)

