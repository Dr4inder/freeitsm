# includes/projects/ai.php

> PHP - 368 lines

Projects - the AI project manager (3.2.0).

What it does: a short BRIEFING on a project's Overview (what moved, what
slipped, what needs a decision) and DRAFTS of highlight, exception and
checkpoint reports, from the project's real data.

🔑 THE AI PROPOSES, A PERSON APPROVES. Nothing here changes a task, a risk,
a date or a status. A report is saved as a draft marked "drafted by AI"; a
person edits it and approves it (includes/services/project_reports.php). The
briefing is advice on a page, never an action.

🔑 IT SEES WHAT THE ASKING ANALYST SEES. `projectAiFacts()` reads one project
the analyst can open, and leaves out what belongs to a module they cannot:
unapproved changes need Changes, the linked-ticket jump needs Tickets,
planned disruption needs Service Status, history rows naming another module
are dropped as the MCP server drops them.

🔑 PROJECT TEXT IS DATA, NOT INSTRUCTIONS. Task titles, risks, notes and the
business case are written by people - and a requester can end up quoted in
a ticket-raised issue. They go to the model inside <project_data> with a
standing instruction to treat everything there as facts to report, never as
instructions. Even if one were followed, the worst outcome is a strange
draft that a person reads before approving: nothing is written anywhere else.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [projectAiReportKinds()](/code/functions/projectAiReportKinds.md) | 34 | The report kinds a person can ask the AI to draft, with what each must contain. |
| [projectAiLanguage()](/code/functions/projectAiLanguage.md) | 56 | The language the analyst reads FreeITSM in, as a name the model understands. |
| [projectAiFacts()](/code/functions/projectAiFacts.md) | 69 | The facts about one project, as plain text, for the model - only what the analyst may see. `$days` is "the period" a report covers. |
| [projectAiSystemPrompt()](/code/functions/projectAiSystemPrompt.md) | 325 | The standing rules every prompt starts with. |
| [projectAiAsk()](/code/functions/projectAiAsk.md) | 340 | Ask the model. Returns ['text', 'model']. Throws RuntimeException when AI is not set up ('not_configured') or the provider cannot be reached. |
| [projectAiReady()](/code/functions/projectAiReady.md) | 356 | Is AI set up for Projects? |
| [projectAiBriefingTask()](/code/functions/projectAiBriefingTask.md) | 361 |  |

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

## How it hangs together

**Includes:** [includes/projects/read.php](/code/files/includes/projects/read.php.md), [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), [includes/ai_settings.php](/code/files/includes/ai_settings.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/task_contractors.php](/code/files/includes/task_contractors.php.md), [includes/projects/benefits.php](/code/files/includes/projects/benefits.php.md), [includes/projects/control.php](/code/files/includes/projects/control.php.md), [includes/projects/dependencies.php](/code/files/includes/projects/dependencies.php.md), [includes/projects/gatecheck.php](/code/files/includes/projects/gatecheck.php.md), [includes/service_status_planned.php](/code/files/includes/service_status_planned.php.md)

**Included by:** [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md)

**Calls:** [aiProviderChat()](/code/functions/aiProviderChat.md), [aiSettingsLoad()](/code/functions/aiSettingsLoad.md), [analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [projectAlertRows()](/code/functions/projectAlertRows.md), [projectBenefits()](/code/functions/projectBenefits.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md), [projectBudgetTotals()](/code/functions/projectBudgetTotals.md), [projectControlDetail()](/code/functions/projectControlDetail.md), [projectCurrencyOf()](/code/functions/projectCurrencyOf.md), [projectDependencies()](/code/functions/projectDependencies.md), [projectDependenciesReady()](/code/functions/projectDependenciesReady.md), [projectDependencyAnalysis()](/code/functions/projectDependencyAnalysis.md), [projectEnabledTools()](/code/functions/projectEnabledTools.md), [projectEstimatesReady()](/code/functions/projectEstimatesReady.md), [projectGateItems()](/code/functions/projectGateItems.md), [projectLinkKindAllowed()](/code/functions/projectLinkKindAllowed.md), [projectMilestones()](/code/functions/projectMilestones.md), [projectUnapprovedChanges()](/code/functions/projectUnapprovedChanges.md), [statusPlannedList()](/code/functions/statusPlannedList.md), [tasksContractorReady()](/code/functions/tasksContractorReady.md), [tasksSupplierNameSql()](/code/functions/tasksSupplierNameSql.md)

## Traps

> [!WARNING]
> **Line 195, in `projectAiFacts`:** `projectAlertRows()` rows carry no '_budget' (only the assistant's rows do), so reading it from `$p` meant the budget never reached the model - worked out here instead.

