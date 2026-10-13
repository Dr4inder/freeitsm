# projectAiFacts()

The facts about one project, as plain text, for the model - only what the analyst may see. `$days` is "the period" a report covers.

```php
function projectAiFacts(PDO $conn, array $project, int $analystId, int $days = 14): string
```

Defined in [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), line 69.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$project` | `array` |  |  |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$days` | `int` | `14` |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 81 | `projectAiFacts` | read [analysts](/code/tables/analysts.md) |  |
| 110 | `projectAiFacts` | read [task_time_entries](/code/tables/task_time_entries.md), read [tasks](/code/tables/tasks.md) |  |
| 124 | `projectAiFacts` | read [project_stages](/code/tables/project_stages.md) |  |
| 150 | `projectAiFacts` | read [suppliers](/code/tables/suppliers.md) |  |
| 153 | `projectAiFacts` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md), read [project_stages](/code/tables/project_stages.md) |  |
| 248 | `projectAiFacts` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 270 | `projectAiFacts` | read [project_stages](/code/tables/project_stages.md) |  |
| 282 | `projectAiFacts` | read [suppliers](/code/tables/suppliers.md) |  |
| 283 | `projectAiFacts` | read [project_members](/code/tables/project_members.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md), read [users](/code/tables/users.md) |  |
| 306 | `projectAiFacts` | read [project_audit](/code/tables/project_audit.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [projectAlertRows()](/code/functions/projectAlertRows.md), [projectBenefits()](/code/functions/projectBenefits.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md), [projectBudgetTotals()](/code/functions/projectBudgetTotals.md), [projectControlDetail()](/code/functions/projectControlDetail.md), [projectCurrencyOf()](/code/functions/projectCurrencyOf.md), [projectDependencies()](/code/functions/projectDependencies.md), [projectDependenciesReady()](/code/functions/projectDependenciesReady.md), [projectDependencyAnalysis()](/code/functions/projectDependencyAnalysis.md), [projectEnabledTools()](/code/functions/projectEnabledTools.md), [projectEstimatesReady()](/code/functions/projectEstimatesReady.md), [projectGateItems()](/code/functions/projectGateItems.md), [projectLinkKindAllowed()](/code/functions/projectLinkKindAllowed.md), [projectMilestones()](/code/functions/projectMilestones.md), [projectUnapprovedChanges()](/code/functions/projectUnapprovedChanges.md), [statusPlannedList()](/code/functions/statusPlannedList.md), [tasksContractorReady()](/code/functions/tasksContractorReady.md), [tasksSupplierNameSql()](/code/functions/tasksSupplierNameSql.md)

## Called from

- [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) - in [projectChatSystem()](/code/functions/projectChatSystem.md)
- [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md) - in `ProjectReportsService::briefing`, `ProjectReportsService::draftWithAi`, `ProjectReportsService::draftScheduled`

## Traps

> [!WARNING]
> **Line 195, in `projectAiFacts`:** `projectAlertRows()` rows carry no '_budget' (only the assistant's rows do), so reading it from `$p` meant the budget never reached the model - worked out here instead.

