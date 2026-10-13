# apiValidateWorkflowConditions()

Validate a conditions array. Returns it normalised (list of objects).

```php
function apiValidateWorkflowConditions($conditions): array
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 133.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conditions` |  |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md) - in [apiWorkflowsCreate()](/code/functions/apiWorkflowsCreate.md), [apiWorkflowsUpdate()](/code/functions/apiWorkflowsUpdate.md)

