# api/v1/resources/projects.php

> API endpoint - 617 lines

FreeITSM REST API v1 — projects resource (3.2.0).

Every WRITE goes through ProjectsService / ProjectToolsService, the code the
Projects screens use, so a project changed through the API gets the same
validation, history rows, workflow events, Calendar entries and alert scan as
one changed by a person. The reads and the serialisers live here: the API
shape is a public contract, not the screens' shape.

THE KEY ACTS AS ITS ANALYST. The module's own rules apply unchanged: who may
create a project, who may change one (its team, or everyone - Projects ->
Settings), and that only the project manager, the creator or somebody who
manages Projects may delete one. A refusal is a 403 with the service's words.

COMPANY SCOPE: projects are scoped data. The list is filtered to the key's
companies, every by-id route 404s outside them (never 403, so ids cannot be
probed), and a new project lands in `company_id` (checked against the key) or
the key's default company. Sub-resources (stages, scope items, RAID, budget
lines) are reached only through their project, so they inherit its scope.

HEALTH IS WORKED OUT, never stored: `health` in a response is the health the
portfolio shows (set by hand, or worked out from tasks, dates, targets,
tickets and tolerances), with `health_mode` saying which.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/projects.php` |
| Protected by | REST API key |
| Reads | `GET status`, `GET methodology`, `GET project_manager_id`, `GET q`, `GET company_id`, `GET health`, `GET sort`, `GET type` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiProjectSelect()](/code/functions/apiProjectSelect.md) | 37 |  |
| [apiProjectDecorate()](/code/functions/apiProjectDecorate.md) | 48 | Decorate rows (health, progress, exceptions, budget) the way the portfolio does. |
| [apiSerializeProject()](/code/functions/apiSerializeProject.md) | 55 |  |
| [apiLoadProject()](/code/functions/apiLoadProject.md) | 108 | The by-id gate: existence + company scope, both failing as 404. |
| [apiProjectCtx()](/code/functions/apiProjectCtx.md) | 119 |  |
| [apiProjectTry()](/code/functions/apiProjectTry.md) | 124 | Run a service call; a ServiceError becomes the API's error body. |
| [apiProjectFields()](/code/functions/apiProjectFields.md) | 134 | Only the fields the service accepts, so a body cannot reach a column it should not. |
| [apiProjectsList()](/code/functions/apiProjectsList.md) | 141 | GET /projects |
| [apiProjectsGet()](/code/functions/apiProjectsGet.md) | 212 | GET /projects/{id} |
| [apiProjectsCreate()](/code/functions/apiProjectsCreate.md) | 219 | POST /projects (optionally {template: "builtin:office_move" \| "saved:12"}) |
| [apiProjectsUpdate()](/code/functions/apiProjectsUpdate.md) | 243 | PATCH /projects/{id} |
| [apiProjectsDelete()](/code/functions/apiProjectsDelete.md) | 256 | DELETE /projects/{id} - its tasks are detached, never deleted |
| [apiSerializeProjectStage()](/code/functions/apiSerializeProjectStage.md) | 266 | Stages (phases / stages / sprints) |
| [apiProjectStages()](/code/functions/apiProjectStages.md) | 287 |  |
| [apiProjectStage()](/code/functions/apiProjectStage.md) | 297 |  |
| [apiProjectStagesList()](/code/functions/apiProjectStagesList.md) | 303 |  |
| [apiProjectStagesCreate()](/code/functions/apiProjectStagesCreate.md) | 309 |  |
| [apiProjectStagesUpdate()](/code/functions/apiProjectStagesUpdate.md) | 317 |  |
| [apiProjectStagesDelete()](/code/functions/apiProjectStagesDelete.md) | 327 |  |
| [apiProjectStagesGate()](/code/functions/apiProjectStagesGate.md) | 336 | POST /projects/{id}/stages/{sid}/gate {decision: go\|go_with_conditions\|stop, notes?} |
| [apiSerializeProjectItem()](/code/functions/apiSerializeProjectItem.md) | 347 | Scope items (deliverables, with MoSCoW) |
| [apiProjectItem()](/code/functions/apiProjectItem.md) | 362 |  |
| [apiProjectItemsList()](/code/functions/apiProjectItemsList.md) | 370 |  |
| [apiProjectItemsCreate()](/code/functions/apiProjectItemsCreate.md) | 376 |  |
| [apiProjectItemsUpdate()](/code/functions/apiProjectItemsUpdate.md) | 383 |  |
| [apiProjectItemsDelete()](/code/functions/apiProjectItemsDelete.md) | 393 |  |
| [apiSerializeProjectRaid()](/code/functions/apiSerializeProjectRaid.md) | 404 | RAID log |
| [apiProjectRaidRow()](/code/functions/apiProjectRaidRow.md) | 431 |  |
| [apiProjectRaidList()](/code/functions/apiProjectRaidList.md) | 439 |  |
| [apiProjectRaidCreate()](/code/functions/apiProjectRaidCreate.md) | 448 |  |
| [apiProjectRaidUpdate()](/code/functions/apiProjectRaidUpdate.md) | 455 |  |
| [apiProjectRaidDelete()](/code/functions/apiProjectRaidDelete.md) | 465 |  |
| [apiSerializeBudgetLine()](/code/functions/apiSerializeBudgetLine.md) | 476 | Budget |
| [apiProjectBudget()](/code/functions/apiProjectBudget.md) | 499 | GET /projects/{id}/budget - totals, labour and lines, in the project's currency. Never one person's rate. |
| [apiProjectBudgetLine()](/code/functions/apiProjectBudgetLine.md) | 522 |  |
| [apiProjectBudgetLinesCreate()](/code/functions/apiProjectBudgetLinesCreate.md) | 528 |  |
| [apiProjectBudgetLinesUpdate()](/code/functions/apiProjectBudgetLinesUpdate.md) | 536 |  |
| [apiProjectBudgetLinesDelete()](/code/functions/apiProjectBudgetLinesDelete.md) | 552 |  |
| [apiProjectTasks()](/code/functions/apiProjectTasks.md) | 564 | GET /projects/{id}/tasks - its top-level tasks. Change them through /tasks. |
| [apiProjectLinks()](/code/functions/apiProjectLinks.md) | 587 | GET /projects/{id}/links - what it is connected to, only the kinds the key's analyst may open. |
| [apiProjectHistory()](/code/functions/apiProjectHistory.md) | 600 | GET /projects/{id}/history - newest first, paged. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `apiProjectSelect` | read [project_stages](/code/tables/project_stages.md) |  |
| 41 | `apiProjectSelect` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |
| 190 | `apiProjectsList` | read [projects](/code/tables/projects.md) |  |
| 288 | `apiProjectStages` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [project_stages](/code/tables/project_stages.md) |  |
| 567 | `apiProjectTasks` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md) |  |
| 604 | `apiProjectHistory` | read [project_audit](/code/tables/project_audit.md) |  |
| 607 | `apiProjectHistory` | read [project_audit](/code/tables/project_audit.md), read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/projects.php](/code/files/includes/services/projects.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), [includes/projects/read.php](/code/files/includes/projects/read.php.md), [includes/projects/budget.php](/code/files/includes/projects/budget.php.md), [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [projectBudgetDetail()](/code/functions/projectBudgetDetail.md), [projectBudgetReady()](/code/functions/projectBudgetReady.md), [projectCode()](/code/functions/projectCode.md), [projectCurrencyOf()](/code/functions/projectCurrencyOf.md), [projectDecorate()](/code/functions/projectDecorate.md), [projectExceptionColumns()](/code/functions/projectExceptionColumns.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectLinks()](/code/functions/projectLinks.md), [projectMethodologies()](/code/functions/projectMethodologies.md), [projectStatuses()](/code/functions/projectStatuses.md), [projectTaskStats()](/code/functions/projectTaskStats.md), [projectVisibleSql()](/code/functions/projectVisibleSql.md), [projectVisibleTo()](/code/functions/projectVisibleTo.md)

