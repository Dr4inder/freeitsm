# project_raid

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `project_id` | `INT NOT NULL` |  |
| `type` | `VARCHAR(12) NOT NULL` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `description` | `TEXT NULL` |  |
| `probability` | `TINYINT NULL` |  |
| `impact` | `TINYINT NULL` |  |
| `response` | `VARCHAR(12) NULL` |  |
| `response_plan` | `TEXT NULL` |  |
| `owner_analyst_id` | `INT NULL` |  |
| `status` | `VARCHAR(10) NOT NULL DEFAULT 'open'` |  |
| `due_date` | `DATE NULL` |  |
| `ticket_id` | `INT NULL` |  |
| `knowledge_article_id` | `INT NULL` |  |
| `escalated_datetime` | `DATETIME NULL` | 3.3.0: escalation (any open entry) and the decision log. |
| `escalated_by_id` | `INT NULL` |  |
| `escalation_note` | `VARCHAR(500) NULL` |  |
| `decided_by` | `VARCHAR(150) NULL` |  |
| `decided_date` | `DATE NULL` |  |
| `rationale` | `TEXT NULL` |  |
| `raised_by_id` | `INT NULL` |  |
| `raised_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `closed_datetime` | `DATETIME NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md):115 | `ProjectTemplatesService::createFromTemplate` | insert | `project_id`, `type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `status`, `raised_by_id` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):362 | `ProjectToolsService::saveRaid` | update | `type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `owner_analyst_id`, `status`, `due_date` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):373 | `ProjectToolsService::saveRaid` | insert | `type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `owner_analyst_id`, `status`, `due_date` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):378 | `ProjectToolsService::saveRaid` | update | `decided_by`, `decided_date`, `rationale` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):398 | `ProjectToolsService::deleteRaid` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):430 | `ProjectToolsService::escalateRaid` | update | `escalated_datetime`, `escalated_by_id`, `escalation_note`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):447 | `ProjectToolsService::deescalateRaid` | update | `escalated_datetime`, `escalated_by_id`, `escalation_note`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):536 | `ProjectToolsService::lessonToKnowledge` | update | `knowledge_article_id`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):589 | `ProjectToolsService::issueToTicket` | update | `ticket_id`, `updated_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/projects/portfolio_charts.php](/code/files/api/projects/portfolio_charts.php.md) | L36 |  |
| [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) | projectChatMaturity L120, projectChatMaturity L121, projectChatRead L248 |  |
| [includes/projects/read.php](/code/files/includes/projects/read.php.md) | projectTaskStats L82, projectsPhase2Ready L188, projectExceptionColumns L198 |  |
| [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) | projectTemplateCapture L466 |  |
| [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md) | rpProjectsRisks L205 |  |
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md) | ProjectTemplatesService::cleanup L157 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::saveRaid L315, ProjectToolsService::deleteRaid L392, ProjectToolsService::raidLogReady L408, ProjectToolsService::raidRow L602, ProjectToolsService::raid L757 |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md) | ProjectsService::deleteProject L254 |  |

