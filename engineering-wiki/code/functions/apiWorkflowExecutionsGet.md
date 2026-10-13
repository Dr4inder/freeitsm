# apiWorkflowExecutionsGet()

GET /workflow-executions/{id} — full detail with payload + step log.

```php
function apiWorkflowExecutionsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 377.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeWorkflowExecution()](/code/functions/apiSerializeWorkflowExecution.md), [apiWorkflowExecutionSelect()](/code/functions/apiWorkflowExecutionSelect.md)

*Nothing calls this function by name.*

