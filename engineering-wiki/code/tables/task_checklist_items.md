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
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):533 | `ChecklistsService::copyTemplateToTask` | insert | `task_checklist_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):573 | `ChecklistsService::reorderTaskChecklistItems` | update | `sort_order` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):617 | `ChecklistsService::toggleTaskItem` | update | `is_completed`, `response_value`, `completed_by_id`, `completed_by_name`, `completed_datetime` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):624 | `ChecklistsService::toggleTaskItem` | update | `is_completed`, `response_value`, `completed_by_id`, `completed_by_name`, `completed_datetime` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):642 | `ChecklistsService::removeTaskChecklist` | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):664 | `ChecklistsService::deleteForTasks` | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):786 | `ChecklistsService::copyTaskChecklists` | insert | `task_checklist_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) | ChecklistsService::taskChecklists L463, ChecklistsService::taskIdForItem L582, ChecklistsService::toggleTaskItem L604, ChecklistsService::toggleTaskItem L630, ChecklistsService::taskOutstandingMandatorySteps L679, ChecklistsService::copyTaskChecklists L786 |  |

