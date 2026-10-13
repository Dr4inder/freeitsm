# apiProblemChangesUnlink()

DELETE /problems/{id}/changes/{changeId} - unlinks a change from the problem through ProblemsService.

```php
function apiProblemChangesUnlink(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/problems.php](/code/files/api/v1/resources/problems.php.md), line 401.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiFailFromService()](/code/functions/apiFailFromService.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

