# project_raci

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `project_id` | `INT NOT NULL` |  |
| `item_id` | `INT NOT NULL` |  |
| `member_id` | `INT NOT NULL` |  |
| `letter` | `CHAR(1) NOT NULL` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):170 | `ProjectToolsService::removeMember` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):214 | `ProjectToolsService::deleteItem` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):251 | `ProjectToolsService::setRaci` | delete |  |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):255 | `ProjectToolsService::setRaci` | update | `letter` |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md):257 | `ProjectToolsService::setRaci` | insert | `project_id`, `item_id`, `member_id`, `letter` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/people.php](/code/files/includes/people.php.md) | peopleProjects L477 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::setRaci L261, ProjectToolsService::raci L1021 |  |

