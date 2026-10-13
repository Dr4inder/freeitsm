# apiSerializeWorkflow()

Shapes a workflow row for the API - trigger, active flag, people, dates, last run and run count, plus the full conditions and actions when `$full` (only their counts otherwise).

```php
function apiSerializeWorkflow(array $r, bool $full): array
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 51.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |
| `$full` | `bool` |  |  |

**Returns:** `array`

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md) - in [apiWorkflowsList()](/code/functions/apiWorkflowsList.md), [apiWorkflowsGet()](/code/functions/apiWorkflowsGet.md), [apiWorkflowsCreate()](/code/functions/apiWorkflowsCreate.md), [apiWorkflowsUpdate()](/code/functions/apiWorkflowsUpdate.md)

