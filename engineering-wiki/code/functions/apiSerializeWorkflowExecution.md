# apiSerializeWorkflowExecution()

Shapes a workflow execution for the API - workflow, trigger, status, times and error, plus the trigger payload and step log when `$full`.

```php
function apiSerializeWorkflowExecution(array $r, bool $full): array
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 108.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |
| `$full` | `bool` |  |  |

**Returns:** `array`

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md) - in [apiWorkflowExecutionsRespondList()](/code/functions/apiWorkflowExecutionsRespondList.md), [apiWorkflowExecutionsGet()](/code/functions/apiWorkflowExecutionsGet.md)

