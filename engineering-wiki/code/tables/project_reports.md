# project_reports

AI project manager (3.2.0): briefings and reports - see includes/projects/ai.php.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `project_id` | `INT NOT NULL` |  |
| `kind` | `VARCHAR(20) NOT NULL` |  |
| `title` | `VARCHAR(200) NOT NULL` |  |
| `body` | `MEDIUMTEXT NULL` |  |
| `status` | `VARCHAR(10) NOT NULL DEFAULT 'draft'` |  |
| `ai_drafted` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `ai_edited` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `ai_model` | `VARCHAR(120) NULL` |  |
| `created_by_id` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_by_id` | `INT NULL` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `approved_by_id` | `INT NULL` |  |
| `approved_datetime` | `DATETIME NULL` |  |
| `sent_datetime` | `DATETIME NULL` | 3.3.0: sending an approved report. |
| `sent_by_id` | `INT NULL` |  |
| `sent_to` | `TEXT NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):96 | `ProjectReportsService::briefing` | delete |  |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):97 | `ProjectReportsService::briefing` | insert | `project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `ai_model`, `created_by_id`, `created_datetime`, `updated_datetime` |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):113 | `ProjectReportsService::draftWithAi` | insert | `project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `ai_model`, `created_by_id`, `created_datetime`, `updated_datetime` |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):136 | `ProjectReportsService::save` | update | `title`, `body`, `ai_edited`, `updated_by_id`, `updated_datetime` |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):142 | `ProjectReportsService::save` | insert | `project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `created_by_id`, `created_datetime`, `updated_datetime` |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):160 | `ProjectReportsService::approve` | update | `status`, `approved_by_id`, `approved_datetime` |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):177 | `ProjectReportsService::delete` | delete |  |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):293 | `ProjectReportsService::send` | update | `sent_datetime`, `sent_by_id`, `sent_to` |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md):411 | `ProjectReportsService::draftScheduled` | insert | `project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `ai_model`, `created_by_id`, `created_datetime`, `updated_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md) | projectAlertsStalled L130 |  |
| [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md) | ProjectReportsService::ready L38, ProjectReportsService::listFor L46, ProjectReportsService::latestBriefing L63, ProjectReportsService::scheduleReady L193, ProjectReportsService::load L422 |  |

