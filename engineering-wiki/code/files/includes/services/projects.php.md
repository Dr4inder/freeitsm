# includes/services/projects.php

> PHP - 907 lines

ProjectsService - the write rules for the Projects module (3.2.0), ONCE.

Shared by the UI endpoints (api/projects/*.php) and, later, the REST API and
the MCP server. Each caller passes an ActorContext + canonical input; this
layer validates, writes, records history and returns ids or throws
ServiceError. It never emits HTTP.

─────────────────────────────────────────────────────────────────────────────
TASKS ARE THE WORK

A project's work items are ordinary tasks carrying tasks.project_id (and
optionally project_stage_id). This service never owns task rows: deleting a
project or a stage DETACHES its tasks, it never deletes them - the work people
did must survive a project being tidied away. The FKs are SET NULL as well;
the hand-written detach is for installs whose FKs failed to add.

─────────────────────────────────────────────────────────────────────────────
COMPANIES

A project is scoped data: it belongs to exactly one company, NULL = the
Default company. Every by-id method starts with `loadForActor()`, which reports
a project in a company the caller cannot reach as not found - never forbidden,
so a company's projects cannot be probed by guessing ids.

─────────────────────────────────────────────────────────────────────────────
METHODOLOGY

A lens, not a schema (includes/projects/methodologies.php). Switching method
relabels the OPEN time boxes to the new preset's kind and leaves closed ones
exactly as they were. Nothing is converted or deleted, and the switch is
written to the project's history.

## Classes

- [ProjectsService](/code/classes/ProjectsService.md) (class, line 41)

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 130 | `ProjectsService::createProject` | **insert** [projects](/code/tables/projects.md) |  |
| 193 | `ProjectsService::updateProject` | **update** [projects](/code/tables/projects.md) |  |
| 231 | `ProjectsService::deleteProject` | **update** [tasks](/code/tables/tasks.md) (`project_id`, `project_stage_id`) |  |
| 238 | `ProjectsService::deleteProject` | **delete** [project_benefit_measures](/code/tables/project_benefit_measures.md), read [project_benefits](/code/tables/project_benefits.md) |  |
| 240 | `ProjectsService::deleteProject` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md), read [project_raid](/code/tables/project_raid.md) |  |
| 254 | `ProjectsService::deleteProject` | **delete** [project_labour_rates](/code/tables/project_labour_rates.md) |  |
| 258 | `ProjectsService::deleteProject` | **update** [status_planned](/code/tables/status_planned.md) (`project_id`) |  |
| 259 | `ProjectsService::deleteProject` | **delete** [projects](/code/tables/projects.md) |  |
| 281 | `ProjectsService::applyMethodology` | **update** [project_stages](/code/tables/project_stages.md) (`kind`, `updated_datetime`) |  |
| 287 | `ProjectsService::applyMethodology` | read [project_stages](/code/tables/project_stages.md) |  |
| 293 | `ProjectsService::applyMethodology` | **update** [project_stages](/code/tables/project_stages.md) (`status`) |  |
| 326 | `ProjectsService::saveStage` | read [project_stages](/code/tables/project_stages.md) |  |
| 334 | `ProjectsService::saveStage` | **update** [project_stages](/code/tables/project_stages.md) (`name`, `goal`, `start_date`, `end_date`, `status`, `updated_datetime`) |  |
| 347 | `ProjectsService::saveStage` | read [project_stages](/code/tables/project_stages.md) |  |
| 348 | `ProjectsService::saveStage` | **insert** [project_stages](/code/tables/project_stages.md) (`project_id`, `kind`, `name`, `goal`, `start_date`, `end_date`, `position`, `status`, `created_datetime`, `updated_datetime`) |  |
| 368 | `ProjectsService::deleteStage` | **update** [tasks](/code/tables/tasks.md) (`project_stage_id`) |  |
| 370 | `ProjectsService::deleteStage` | **update** [project_milestones](/code/tables/project_milestones.md) (`stage_id`) |  |
| 372 | `ProjectsService::deleteStage` | **delete** [project_gate_items](/code/tables/project_gate_items.md) |  |
| 373 | `ProjectsService::deleteStage` | **delete** [project_stages](/code/tables/project_stages.md) |  |
| 389 | `ProjectsService::reorderStages` | **update** [project_stages](/code/tables/project_stages.md) (`position`) |  |
| 408 | `ProjectsService::assignTask` | read [tasks](/code/tables/tasks.md) |  |
| 424 | `ProjectsService::assignTask` | **update** [tasks](/code/tables/tasks.md) (`project_id`, `project_stage_id`, `updated_datetime`) |  |
| 439 | `ProjectsService::assignTask` | **update** [tasks](/code/tables/tasks.md) (`project_id`, `project_stage_id`, `updated_datetime`) |  |
| 478 | `ProjectsService::createTaskInProject` | **update** [tasks](/code/tables/tasks.md) (`tenant_id`, `project_id`, `project_stage_id`) |  |
| 491 | `ProjectsService::loadRow` | read [projects](/code/tables/projects.md) |  |
| 511 | `ProjectsService::loadStage` | read [project_stages](/code/tables/project_stages.md) |  |
| 600 | `ProjectsService::validateField` | read [analysts](/code/tables/analysts.md) |  |
| 720 | `ProjectsService::signoffEvent` | read [project_gate_items](/code/tables/project_gate_items.md), read [project_stages](/code/tables/project_stages.md) |  |
| 753 | `ProjectsService::decideProposal` | **update** [projects](/code/tables/projects.md) (`approval_status`, `approval_by_id`, `approval_datetime`, `approval_notes`, `status`, `closed_datetime`) |  |
| 780 | `ProjectsService::proposalEvent` | read [projects](/code/tables/projects.md) |  |
| 877 | `ProjectsService::touch` | **update** [projects](/code/tables/projects.md) (`updated_datetime`) |  |
| 883 | `ProjectsService::audit` | **insert** [project_audit](/code/tables/project_audit.md) (`project_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |
| 898 | `ProjectsService::auditDisplay` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/projects/methodologies.php](/code/files/includes/projects/methodologies.php.md), [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md), [includes/projects/intake.php](/code/files/includes/projects/intake.php.md), [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), [includes/projects/control.php](/code/files/includes/projects/control.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md), [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md)

**Included by:** [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/api_bootstrap.php](/code/files/includes/projects/api_bootstrap.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), [includes/projects/control.php](/code/files/includes/projects/control.php.md), [includes/projects/intake.php](/code/files/includes/projects/intake.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

**Calls:** [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [projectAlertRows()](/code/functions/projectAlertRows.md), [projectAlertsScan()](/code/functions/projectAlertsScan.md), [projectBaselineAuto()](/code/functions/projectBaselineAuto.md), [projectCanChange()](/code/functions/projectCanChange.md), [projectCanCreate()](/code/functions/projectCanCreate.md), [projectCanDecideProposal()](/code/functions/projectCanDecideProposal.md), [projectCanDelete()](/code/functions/projectCanDelete.md), [projectColours()](/code/functions/projectColours.md), [projectDispatch()](/code/functions/projectDispatch.md), [projectEventPayload()](/code/functions/projectEventPayload.md), [projectFinishedStatuses()](/code/functions/projectFinishedStatuses.md), [projectHealthValues()](/code/functions/projectHealthValues.md), [projectIcons()](/code/functions/projectIcons.md), [projectIntakeReady()](/code/functions/projectIntakeReady.md), [projectIsManager()](/code/functions/projectIsManager.md), [projectIsTeam()](/code/functions/projectIsTeam.md), [projectLinksDeleteAll()](/code/functions/projectLinksDeleteAll.md), [projectMethodologies()](/code/functions/projectMethodologies.md), [projectMilestoneEventFields()](/code/functions/projectMilestoneEventFields.md), [projectPriorities()](/code/functions/projectPriorities.md), [projectProposalApprovers()](/code/functions/projectProposalApprovers.md), [projectProposalBlocksStatus()](/code/functions/projectProposalBlocksStatus.md), [projectProposalNeedsApproval()](/code/functions/projectProposalNeedsApproval.md), [projectSetting()](/code/functions/projectSetting.md), [projectStageStatuses()](/code/functions/projectStageStatuses.md), [projectStampCurrency()](/code/functions/projectStampCurrency.md), [projectStatuses()](/code/functions/projectStatuses.md), [projectSyncCalendar()](/code/functions/projectSyncCalendar.md), [projectToolDefinitions()](/code/functions/projectToolDefinitions.md), [projectUnapprovedChanges()](/code/functions/projectUnapprovedChanges.md), [projectVisibilityReady()](/code/functions/projectVisibilityReady.md), [projectVisibleTo()](/code/functions/projectVisibleTo.md)

