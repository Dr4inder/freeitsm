# apiWorkflowsUpdate()

PATCH /workflows/{id}

```php
function apiWorkflowsUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 254.

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
| 281 | `apiWorkflowsUpdate` | **update** [workflows](/code/tables/workflows.md) (`name`, `description`, `trigger_event`, `conditions`, `actions`, `is_active`, `updated_datetime`) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadWorkflow()](/code/functions/apiLoadWorkflow.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeWorkflow()](/code/functions/apiSerializeWorkflow.md), [apiValidateWorkflowActions()](/code/functions/apiValidateWorkflowActions.md), [apiValidateWorkflowConditions()](/code/functions/apiValidateWorkflowConditions.md), [apiValidateWorkflowTrigger()](/code/functions/apiValidateWorkflowTrigger.md)

*Nothing calls this function by name.*

