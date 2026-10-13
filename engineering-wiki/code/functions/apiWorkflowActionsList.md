# apiWorkflowActionsList()

GET /workflow-actions — every action type with its args spec (labels, required flags, lookup sources, template-variable support).

```php
function apiWorkflowActionsList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/workflows.php](/code/files/api/v1/resources/workflows.php.md), line 413.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

