# projectBaselineAuto()

Take a baseline by itself when the setting says so - never twice for the same stage, and once only for the project starting. Quiet: it must never break the change that triggered it. `$trigger` 'start' - the project went active; 'stage' - `$stageId` started

```php
function projectBaselineAuto(
    PDO $conn,
    int $projectId,
    ?int $actorId,
    string $trigger,
    ?int $stageId = null
): ?int
```

Defined in [includes/projects/control.php](/code/files/includes/projects/control.php.md), line 226.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$actorId` | `?int` |  |  |
| `$trigger` | `string` |  |  |
| `$stageId` | `?int` | `null` |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 232 | `projectBaselineAuto` | read [projects](/code/tables/projects.md) |  |
| 237 | `projectBaselineAuto` | read [project_baselines](/code/tables/project_baselines.md) |  |
| 241 | `projectBaselineAuto` | read [project_baselines](/code/tables/project_baselines.md) |  |
| 247 | `projectBaselineAuto` | read [project_baselines](/code/tables/project_baselines.md) |  |

## Calls

[projectControlReady()](/code/functions/projectControlReady.md), [projectEnabledTools()](/code/functions/projectEnabledTools.md), [projectSetting()](/code/functions/projectSetting.md), [projectTakeBaseline()](/code/functions/projectTakeBaseline.md)

## Called from

- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::decideGate`
- [includes/services/projects.php](/code/files/includes/services/projects.php.md) - in `ProjectsService::updateProject`, `ProjectsService::saveStage`, `ProjectsService::decideProposal`

