# apiProjectStage()

```php
function apiProjectStage(PDO $conn, int $projectId, int $stageId): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 297.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `int` |  |  |

**Returns:** `array`

## Calls

[apiError()](/code/functions/apiError.md), [apiProjectStages()](/code/functions/apiProjectStages.md)

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectStagesCreate()](/code/functions/apiProjectStagesCreate.md), [apiProjectStagesUpdate()](/code/functions/apiProjectStagesUpdate.md), [apiProjectStagesDelete()](/code/functions/apiProjectStagesDelete.md), [apiProjectStagesGate()](/code/functions/apiProjectStagesGate.md)

