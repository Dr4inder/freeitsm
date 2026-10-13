# project_stages

Phases, stages and sprints in ONE table - the same thing through different methods.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `project_id` | `INT NOT NULL` |  |
| `kind` | `VARCHAR(10) NOT NULL DEFAULT 'phase'` |  |
| `name` | `VARCHAR(150) NOT NULL` |  |
| `goal` | `VARCHAR(500) NULL` |  |
| `start_date` | `DATE NULL` |  |
| `end_date` | `DATE NULL` |  |
| `position` | `INT NOT NULL DEFAULT 0` |  |
| `status` | `VARCHAR(10) NOT NULL DEFAULT 'planned'` |  |
| `gate_decision` | `VARCHAR(20) NULL` |  |
| `gate_notes` | `TEXT NULL` |  |
| `gate_decided_by` | `INT NULL` |  |
| `gate_decided_datetime` | `DATETIME NULL` |  |
| `gate_kind` | `VARCHAR(10) NOT NULL DEFAULT 'standard'` | 3.3.0 standard \| golive |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):281 | `ProjectsService::applyMethodology` | update | `kind`, `updated_datetime` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):293 | `ProjectsService::applyMethodology` | update | `status` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):334 | `ProjectsService::saveStage` | update | `name`, `goal`, `start_date`, `end_date`, `status`, `updated_datetime` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):348 | `ProjectsService::saveStage` | insert | `project_id`, `kind`, `name`, `goal`, `start_date`, `end_date`, `position`, `status`, `created_datetime`, `updated_datetime` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):373 | `ProjectsService::deleteStage` | delete |  |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):389 | `ProjectsService::reorderStages` | update | `position` |  |
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md):59 | `ProjectTemplatesService::createFromTemplate` | insert | `project_id`, `kind`, `name`, `goal`, `start_date`, `end_date`, `position`, `status`, `created_datetime`, `updated_datetime` |  |
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md):77 | `ProjectTemplatesService::createFromTemplate` | update | `gate_kind` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):682 | `ProjectToolsService::decideGate` | update | `gate_decision`, `gate_notes`, `gate_decided_by`, `gate_decided_datetime`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):689 | `ProjectToolsService::decideGate` | update | `status` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):694 | `ProjectToolsService::decideGate` | update | `status`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):1172 | `ProjectToolsService::setGateKind` | update | `gate_kind`, `updated_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/tasks/get.php](/code/files/api/tasks/get.php.md) | L87 |  |
| [api/tasks/list.php](/code/files/api/tasks/list.php.md) | L169 |  |
| [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) | apiProjectSelect L38, apiProjectStages L288 |  |
| [includes/feature_bingo/cards/projects.php](/code/files/includes/feature_bingo/cards/projects.php.md) | L33 |  |
| [includes/projects/ai.php](/code/files/includes/projects/ai.php.md) | projectAiFacts L124, projectAiFacts L153, projectAiFacts L270 |  |
| [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) | projectAlertsStagesDue L225 |  |
| [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md) | projectAssistRows L34, projectAssistOverview L146, projectAssistTasks L231, projectAssistDates L264 |  |
| [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) | projectChatMaturity L117, projectChatRead L232, projectChatRead L242, projectChatRead L255, projectChatApplyOne L496, projectChatApplyOne L500 |  |
| [includes/projects/calendar.php](/code/files/includes/projects/calendar.php.md) | projectSyncCalendar L68 |  |
| [includes/projects/control.php](/code/files/includes/projects/control.php.md) | projectPlanSnapshot L67, projectControlDetail L274 |  |
| [includes/projects/milestones.php](/code/files/includes/projects/milestones.php.md) | projectMilestones L43 |  |
| [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md) | projectAlertsStalled L119 |  |
| [includes/projects/read.php](/code/files/includes/projects/read.php.md) | projectExceptionColumns L198, projectListRows L300, projectDetail L356 |  |
| [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) | projectGateKindReady L52, projectTemplateCapture L396, projectTemplateCapture L410 |  |
| [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md) | rpProjectRows L38, rpProjectsKpis L81, rpProjectsMilestones L151 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::decideGate L659, ProjectToolsService::decideGate L691, ProjectToolsService::items L1007, ProjectToolsService::stageOf L1521 |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md) | ProjectsService::applyMethodology L287, ProjectsService::saveStage L326, ProjectsService::saveStage L347, ProjectsService::loadStage L511, ProjectsService::signoffEvent L720 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L879 |  |

