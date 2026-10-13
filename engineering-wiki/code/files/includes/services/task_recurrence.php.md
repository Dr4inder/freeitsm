# includes/services/task_recurrence.php

> PHP - 764 lines

## Classes

- [TaskRecurrence](/code/classes/TaskRecurrence.md) (class, line 36) - Task recurrence — the date engine and the spawning of occurrences.

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 223 | `TaskRecurrence::ruleForTask` | read [task_recurrences](/code/tables/task_recurrences.md), read [tasks](/code/tables/tasks.md) |  |
| 301 | `TaskRecurrence::runDue` | read [task_recurrences](/code/tables/task_recurrences.md) |  |
| 353 | `TaskRecurrence::runDue` | **update** [task_recurrences](/code/tables/task_recurrences.md) (`next_due_date`) |  |
| 384 | `TaskRecurrence::project` | read [task_recurrences](/code/tables/task_recurrences.md), read [tasks](/code/tables/tasks.md) |  |
| 440 | `TaskRecurrence::deactivate` | **update** [task_recurrences](/code/tables/task_recurrences.md) (`is_active`, `updated_datetime`) |  |
| 448 | `TaskRecurrence::occurrenceExistsFor` | read [tasks](/code/tables/tasks.md) |  |
| 610 | `TaskRecurrence::taskRow` | read [tasks](/code/tables/tasks.md) |  |
| 619 | `TaskRecurrence::latestOccurrence` | read [tasks](/code/tables/tasks.md) |  |
| 638 | `TaskRecurrence::createOccurrence` | read [tasks](/code/tables/tasks.md) |  |
| 651 | `TaskRecurrence::createOccurrence` | **insert** [tasks](/code/tables/tasks.md) (`title`, `description`, `status_id`, `priority_id`, `start_date`, `due_date`, `assigned_analyst_id`, `assigned_team_id`, `ticket_id`, `change_id`, `contract_id`, `tenant_id`) |  |
| 682 | `TaskRecurrence::createOccurrence` | **insert** [task_tag_map](/code/tables/task_tag_map.md) (`task_id`, `tag_id`) |  |
| 691 | `TaskRecurrence::createOccurrence` | read [tasks](/code/tables/tasks.md) |  |
| 696 | `TaskRecurrence::createOccurrence` | **insert** [tasks](/code/tables/tasks.md) (`title`, `status_id`, `priority_id`, `assigned_analyst_id`, `assigned_team_id`, `parent_task_id`, `tenant_id`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 716 | `TaskRecurrence::createOccurrence` | **insert** [document_links](/code/tables/document_links.md) (`document_id`, `parent_type`, `parent_id`, `linked_by_id`, `created_datetime`) |  |
| 737 | `TaskRecurrence::createOccurrence` | **update** [task_recurrences](/code/tables/task_recurrences.md) (`occurrences_created`, `updated_datetime`) |  |
| 758 | `TaskRecurrence::defaultOpenStatusId` | read [task_statuses](/code/tables/task_statuses.md) |  |

## How it hangs together

**Includes:** [includes/services/checklists.php](/code/files/includes/services/checklists.php.md)

**Included by:** [api/tasks/projected.php](/code/files/api/tasks/projected.php.md), [api/tasks/recurrence_preview.php](/code/files/api/tasks/recurrence_preview.php.md), [api/tasks/save_recurrence.php](/code/files/api/tasks/save_recurrence.php.md), [cron/task_recurrence.php](/code/files/cron/task_recurrence.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md)

