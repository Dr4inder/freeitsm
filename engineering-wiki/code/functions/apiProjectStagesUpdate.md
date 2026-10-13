# apiProjectStagesUpdate()

PATCH /projects/{id}/stages/{stageId} - updates the stage fields sent through ProjectsService and returns the stage.

```php
function apiProjectStagesUpdate(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 340.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Calls

[apiError()](/code/functions/apiError.md), [apiLoadProject()](/code/functions/apiLoadProject.md), [apiProjectCtx()](/code/functions/apiProjectCtx.md), [apiProjectStage()](/code/functions/apiProjectStage.md), [apiProjectTry()](/code/functions/apiProjectTry.md), [apiRespond()](/code/functions/apiRespond.md), [apiSerializeProjectStage()](/code/functions/apiSerializeProjectStage.md)

*Nothing calls this function by name.*

