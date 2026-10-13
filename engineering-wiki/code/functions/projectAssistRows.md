# projectAssistRows()

Decorated project rows (health, progress, exceptions, budget totals) for a WHERE, inside `$scope`.

```php
function projectAssistRows(PDO $conn, array $scope, string $where, array $args, int $limit): array
```

Defined in [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md), line 31.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$scope` | `array` |  |  |
| `$where` | `string` |  |  |
| `$args` | `array` |  |  |
| `$limit` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 34 | `projectAssistRows` | read [project_stages](/code/tables/project_stages.md) |  |
| 36 | `projectAssistRows` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectDecorate()](/code/functions/projectDecorate.md), [projectExceptionColumns()](/code/functions/projectExceptionColumns.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectTaskStats()](/code/functions/projectTaskStats.md)

## Called from

- [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md) - in [projectAssistFind()](/code/functions/projectAssistFind.md), [projectAssistList()](/code/functions/projectAssistList.md)

