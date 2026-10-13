# apiWorkflowsDelete()

```php
function apiWorkflowsDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 279.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 284 | `apiWorkflowsDelete` | **update** [workflow_executions](/code/tables/workflow_executions.md) (`workflow_name`, `workflow_id`) |  |
| 288 | `apiWorkflowsDelete` | **delete** [workflows](/code/tables/workflows.md) |  |

## Calls

[apiLoadWorkflow()](/code/functions/apiLoadWorkflow.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

