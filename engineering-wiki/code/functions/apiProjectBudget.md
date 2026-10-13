# apiProjectBudget()

GET /projects/{id}/budget - totals, labour and lines, in the project's currency. Never one person's rate.

```php
function apiProjectBudget(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 542.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadProject()](/code/functions/apiLoadProject.md), [apiRespond()](/code/functions/apiRespond.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md), [projectBudgetReady()](/code/functions/projectBudgetReady.md)

*Nothing calls this function by name.*

