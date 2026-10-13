# apiProjectStagesList()

GET /projects/{id}/stages - the project's stages in order.

```php
function apiProjectStagesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 318.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectStages()](/code/functions/apiProjectStages.md), [apiRespond()](/code/functions/apiRespond.md)

*Nothing calls this function by name.*

