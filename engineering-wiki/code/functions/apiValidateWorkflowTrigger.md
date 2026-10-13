# apiValidateWorkflowTrigger()

Validate a trigger event name against the engine's catalogue.

```php
function apiValidateWorkflowTrigger(string $trigger): string
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 181.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$trigger` | `string` |  |  |

**Returns:** `string`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md) - in [apiWorkflowsCreate()](/code/functions/apiWorkflowsCreate.md), [apiWorkflowsUpdate()](/code/functions/apiWorkflowsUpdate.md)

