# apiWorkflowExecutionsRespondList()

Shared list plumbing for both execution list routes.

```php
function apiWorkflowExecutionsRespondList(PDO $conn, array $where, array $args): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 318.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$where` | `array` |  |  |
| `$args` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 335 | `apiWorkflowExecutionsRespondList` | read [workflow_executions](/code/tables/workflow_executions.md) |  |

## Calls

[apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeWorkflowExecution()](/code/functions/apiSerializeWorkflowExecution.md), [apiWorkflowExecutionSelect()](/code/functions/apiWorkflowExecutionSelect.md)

## Called from

- [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md) - in [apiWorkflowExecutionsList()](/code/functions/apiWorkflowExecutionsList.md), [apiWorkflowExecutionsListAll()](/code/functions/apiWorkflowExecutionsListAll.md)

