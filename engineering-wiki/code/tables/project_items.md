# project_items

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `project_id` | `INT NOT NULL` |  |
| `parent_id` | `INT NULL` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `description` | `TEXT NULL` |  |
| `acceptance_criteria` | `TEXT NULL` |  |
| `moscow` | `VARCHAR(10) NULL` |  |
| `stage_id` | `INT NULL` |  |
| `status` | `VARCHAR(20) NOT NULL DEFAULT 'proposed'` |  |
| `position` | `INT NOT NULL DEFAULT 0` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md):110 | `ProjectTemplatesService::createFromTemplate` | insert | `project_id`, `title`, `description`, `moscow`, `status`, `position`, `created_datetime`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):194 | `ProjectToolsService::saveItem` | update | `title`, `description`, `acceptance_criteria`, `moscow`, `stage_id`, `status`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):202 | `ProjectToolsService::saveItem` | insert | `project_id`, `title`, `description`, `acceptance_criteria`, `moscow`, `stage_id`, `status`, `position`, `created_datetime`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):215 | `ProjectToolsService::deleteItem` | update | `parent_id` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):216 | `ProjectToolsService::deleteItem` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):226 | `ProjectToolsService::moveItem` | update | `moscow`, `updated_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):227 | `ProjectToolsService::moveItem` | update | `position` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/people.php](/code/files/includes/people.php.md) | peopleProjects L477 |  |
| [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) | projectChatMaturity L122 |  |
| [includes/projects/control.php](/code/files/includes/projects/control.php.md) | projectPlanSnapshot L80 |  |
| [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) | projectTemplateCapture L457 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::saveItem L201, ProjectToolsService::items L1007, ProjectToolsService::item L1503 |  |

