# task_checklist_items

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `task_checklist_id` | `INT NOT NULL` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `suggested_role` | `VARCHAR(100) DEFAULT NULL` |  |
| `is_mandatory` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `is_completed` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `completed_by_id` | `INT DEFAULT NULL` |  |
| `completed_by_name` | `VARCHAR(150) DEFAULT NULL` |  |
| `completed_datetime` | `DATETIME DEFAULT NULL` |  |
| `requires_input` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `input_placeholder` | `VARCHAR(255) DEFAULT NULL` |  |
| `response_value` | `TEXT DEFAULT NULL` |  |
| `sort_order` | `INT NOT NULL DEFAULT 1` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):532 | `ChecklistsService::copyTemplateToTask` | insert | `task_checklist_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):572 | `ChecklistsService::reorderTaskChecklistItems` | update | `sort_order` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):615 | `ChecklistsService::toggleTaskItem` | update | `is_completed`, `response_value`, `completed_by_id`, `completed_by_name`, `completed_datetime` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):622 | `ChecklistsService::toggleTaskItem` | update | `is_completed`, `response_value`, `completed_by_id`, `completed_by_name`, `completed_datetime` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):640 | `ChecklistsService::removeTaskChecklist` | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):662 | `ChecklistsService::deleteForTasks` | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):784 | `ChecklistsService::copyTaskChecklists` | insert | `task_checklist_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) | ChecklistsService::taskChecklists L462, ChecklistsService::taskIdForItem L581, ChecklistsService::toggleTaskItem L602, ChecklistsService::toggleTaskItem L628, ChecklistsService::taskOutstandingMandatorySteps L677, ChecklistsService::copyTaskChecklists L784 |  |

