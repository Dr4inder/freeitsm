# projectTemplateCapture()

A project as a template: its plan with dates turned into days from its start, and none of its people, companies or links. `$parts` picks what to keep: plan, scope, raid, tolerances, targets.

```php
function projectTemplateCapture(PDO $conn, array $project, array $parts): array
```

Defined in [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), line 390.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$project` | `array` |  |  |
| `$parts` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 396 | `projectTemplateCapture` | read [project_stages](/code/tables/project_stages.md) |  |
| 410 | `projectTemplateCapture` | read [project_stages](/code/tables/project_stages.md) |  |
| 412 | `projectTemplateCapture` | read [tasks](/code/tables/tasks.md) |  |
| 424 | `projectTemplateCapture` | read [project_gate_items](/code/tables/project_gate_items.md) |  |
| 442 | `projectTemplateCapture` | read [task_dependencies](/code/tables/task_dependencies.md) |  |
| 449 | `projectTemplateCapture` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 457 | `projectTemplateCapture` | read [project_items](/code/tables/project_items.md) |  |
| 465 | `projectTemplateCapture` | read [project_raid](/code/tables/project_raid.md) |  |
| 473 | `projectTemplateCapture` | read [project_benefits](/code/tables/project_benefits.md) |  |
| 486 | `projectTemplateCapture` | read [project_asset_targets](/code/tables/project_asset_targets.md) |  |

## Calls

[projectBenefitsReady()](/code/functions/projectBenefitsReady.md), [projectDependenciesReady()](/code/functions/projectDependenciesReady.md), [projectEstimatesReady()](/code/functions/projectEstimatesReady.md), [projectGateItemsReady()](/code/functions/projectGateItemsReady.md), [projectGateKindReady()](/code/functions/projectGateKindReady.md), [projectMilestonesReady()](/code/functions/projectMilestonesReady.md), [projectTargetsReady()](/code/functions/projectTargetsReady.md), [projectTargetValueNames()](/code/functions/projectTargetValueNames.md), [projectTemplateNormalise()](/code/functions/projectTemplateNormalise.md)

## Called from

- [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md) - in `ProjectTemplatesService::saveFromProject`

