# project_raid_tasks

Follow-up actions on a RAID entry (3.3.0) - project tasks, joined.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `raid_id` | `INT NOT NULL` |  |
| `task_id` | `INT NOT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):254 | `ProjectsService::deleteProject` | delete |  |  |
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md):157 | `ProjectTemplatesService::cleanup` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):397 | `ProjectToolsService::deleteRaid` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):471 | `ProjectToolsService::addRaidAction` | insert | `raid_id`, `task_id`, `created_datetime` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):482 | `ProjectToolsService::removeRaidAction` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::raidActionsReady L490, ProjectToolsService::raid L779 |  |

