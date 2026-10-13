# apiProblemAuditList()

```php
function apiProblemAuditList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 334.

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
| 337 | `apiProblemAuditList` | read [problem_audit](/code/tables/problem_audit.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiLoadProblem()](/code/functions/apiLoadProblem.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

