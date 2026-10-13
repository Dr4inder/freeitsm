# task_checklists

Checklists on TASKS (discussion #138, round three) - the same shape as the two ticket tables above, keyed on a task instead. Only used while Tasks → Settings → Checklists is switched on.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `task_id` | `INT NOT NULL` |  |
| `template_id` | `INT DEFAULT NULL` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `closure_mode` | `ENUM('warn','block') NOT NULL DEFAULT 'warn'` |  |
| `sort_order` | `INT NOT NULL DEFAULT 0` |  |
| `created_by_id` | `INT DEFAULT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):524 | `ChecklistsService::copyTemplateToTask` | insert | `task_id`, `template_id`, `title`, `closure_mode`, `sort_order`, `created_by_id`, `created_datetime` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):564 | `ChecklistsService::reorderTaskChecklists` | update | `sort_order` |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):643 | `ChecklistsService::removeTaskChecklist` | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):667 | `ChecklistsService::deleteForTasks` | delete |  |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md):781 | `ChecklistsService::copyTaskChecklists` | insert | `task_id`, `template_id`, `title`, `closure_mode`, `sort_order`, `created_by_id`, `created_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) | ChecklistsService::taskChecklists L458, ChecklistsService::nextTaskChecklistOrder L552, ChecklistsService::taskIdForItem L582, ChecklistsService::taskIdForChecklist L590, ChecklistsService::deleteForTasks L664, ChecklistsService::taskOutstandingMandatorySteps L679 ... |  |

