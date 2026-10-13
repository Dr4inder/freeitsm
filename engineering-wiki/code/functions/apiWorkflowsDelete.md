# apiWorkflowsDelete()

DELETE /workflows/{id} — executions survive (the module's audit-trail intent) but are detached explicitly: name snapshot filled, workflow_id NULLed. Explicit rather than FK-reliant so grown installs that haven't re-run Database Verification behave identically.

```php
function apiWorkflowsDelete(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 294.

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
| 299 | `apiWorkflowsDelete` | **update** [workflow_executions](/code/tables/workflow_executions.md) (`workflow_name`, `workflow_id`) |  |
| 303 | `apiWorkflowsDelete` | **delete** [workflows](/code/tables/workflows.md) |  |

## Calls

[apiLoadWorkflow()](/code/functions/apiLoadWorkflow.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

