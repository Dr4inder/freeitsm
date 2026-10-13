# apiWorkflowExecutionsListAll()

GET /workflow-executions — install-wide, including orphaned runs whose workflow has been deleted (filter with ?workflow_id or ?orphaned=true).

```php
function apiWorkflowExecutionsListAll(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 378.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiWorkflowExecutionsRespondList()](/code/functions/apiWorkflowExecutionsRespondList.md)

*Nothing calls this function by name.*

