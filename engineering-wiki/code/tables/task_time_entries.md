# task_time_entries

Time actually SPENT on a task, as many sessions as it took (GH #112). Mirrors ticket_time_entries column for column, because it is the same idea about a different record — a second, subtly different shape would be the thing that later drifts.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `task_id` | `INT NOT NULL` |  |
| `analyst_id` | `INT NOT NULL` |  |
| `notes` | `LONGTEXT NULL` |  |
| `time_spent_minutes` | `INT NOT NULL` |  |
| `entry_datetime` | `DATETIME NOT NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):1458 | `TasksService::createTimeEntry` | insert | `task_id`, `analyst_id`, `notes`, `time_spent_minutes`, `entry_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):1477 | `TasksService::deleteTimeEntry` | update | `is_active` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [includes/projects/ai.php](/code/files/includes/projects/ai.php.md) | projectAiFacts L110 |  |
| [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) | projectLabour L130, projectLabourToCome L261 |  |
| [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md) | projectCapacity L124 |  |
| [includes/projects/read.php](/code/files/includes/projects/read.php.md) | projectDetail L369 |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md) | TasksService::deleteTimeEntry L1467, TasksService::timeEntriesFor L1496, TasksService::timeEntriesFor L1512 |  |

