# apiProjectStages()

```php
function apiProjectStages(PDO $conn, int $projectId): array
```

Defined in [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), line 287.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 288 | `apiProjectStages` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [project_stages](/code/tables/project_stages.md) |  |

## Called from

- [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) - in [apiProjectStage()](/code/functions/apiProjectStage.md), [apiProjectStagesList()](/code/functions/apiProjectStagesList.md)

