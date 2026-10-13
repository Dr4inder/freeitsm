# tasks

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `description` | `LONGTEXT NULL` |  |
| `status_id` | `INT NULL` |  |
| `priority_id` | `INT NULL` |  |
| `start_date` | `DATE NULL` |  |
| `due_date` | `DATE NULL` |  |
| `assigned_analyst_id` | `INT NULL` |  |
| `assigned_team_id` | `INT NULL` |  |
| `assigned_supplier_id` | `INT NULL` | Contractors (3.3.0) - includes/task_contractors.php. |
| `assigned_contact_id` | `INT NULL` |  |
| `parent_task_id` | `INT NULL` |  |
| `ticket_id` | `INT NULL` |  |
| `change_id` | `INT NULL` |  |
| `contract_id` | `INT NULL` |  |
| `tenant_id` | `INT NULL` | SCOPED DATA, like tickets and assets: NULL = the Default company's, NOT "shared". Existing tasks stay NULL and become Default-owned, which is the same migration tickets and assets took. |
| `board_position` | `INT NOT NULL DEFAULT 0` |  |
| `created_by_id` | `INT NOT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `completed_datetime` | `DATETIME NULL` |  |
| `work_start_datetime` | `DATETIME NULL` | WHEN THE WORK IS PLANNED FOR (GH #112). Deliberately the same three columns, with the same names, that a ticket's scheduled work uses — one convention for "this is booked in", not two.  These are NAIVE wall-clock values, like every other scheduling field: a 2pm slot means 2pm to whoever reads it. Never run them through parseUTCDate/tzOpts. See the "Timezones and Time Handling" note.  Separate from start_date/due_date, which are a plan and a deadline and stay date-only. "Due by Friday" and "being done 09:00-11:00 on Tuesday" are different statements and a task can carry both. |
| `work_end_datetime` | `DATETIME NULL` |  |
| `work_all_day` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `recurrence_id` | `INT NULL` | Recurring tasks (#94). A recurrence is a SERIES, not a template: recurrence_id names the rule every occurrence was made by, and recurrence_master_id points at the FIRST task of the series so any occurrence can show a reader where it started. Both NULL on the vast majority of tasks, which do not repeat. |
| `recurrence_master_id` | `INT NULL` |  |
| `project_id` | `INT NULL` | Projects (3.2.0): a project's work items ARE tasks, so a task names the project and the stage/phase it belongs to. NULL on every other task. |
| `project_stage_id` | `INT NULL` |  |
| `estimate_hours` | `DECIMAL(7,2) NULL` | 3.3.0: how long the work is expected to take, in hours. Read by the Projects capacity view and estimate-vs-logged; NULL = not estimated. |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/tasks/reorder.php](/code/files/api/tasks/reorder.php.md):74 |  | update | `status_id`, `updated_datetime` |  |
| [api/tasks/reorder.php](/code/files/api/tasks/reorder.php.md):87 |  | update | `board_position` |  |
| [api/tasks/reorder_subtasks.php](/code/files/api/tasks/reorder_subtasks.php.md):44 |  | update | `board_position` |  |
| [api/tasks/save_recurrence.php](/code/files/api/tasks/save_recurrence.php.md):107 |  | update | `recurrence_id`, `recurrence_master_id` |  |
| [api/tasks/toggle_subtask.php](/code/files/api/tasks/toggle_subtask.php.md):111 |  | update | `status_id`, `completed_datetime`, `updated_datetime` |  |
| [api/tasks/toggle_subtask.php](/code/files/api/tasks/toggle_subtask.php.md):123 |  | update | `updated_datetime` |  |
| [api/tickets/delete_ticket_task.php](/code/files/api/tickets/delete_ticket_task.php.md):49 |  | update | `ticket_id`, `updated_datetime` |  |
| [api/tickets/save_ticket_task.php](/code/files/api/tickets/save_ticket_task.php.md):102 |  | update | `ticket_id`, `updated_datetime` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):267 | `calendarPullApplyTaskWork` | update | `work_start_datetime`, `work_end_datetime`, `work_all_day`, `updated_datetime` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):286 | `calendarPullApplyTaskDue` | update | `due_date`, `updated_datetime` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):298 | `calendarPullUnscheduleTask` | update | `due_date`, `updated_datetime` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):305 | `calendarPullUnscheduleTask` | update | `work_start_datetime`, `work_end_datetime`, `updated_datetime` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):231 | `ProjectsService::deleteProject` | update | `project_id`, `project_stage_id` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):368 | `ProjectsService::deleteStage` | update | `project_stage_id` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):424 | `ProjectsService::assignTask` | update | `project_id`, `project_stage_id`, `updated_datetime` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):439 | `ProjectsService::assignTask` | update | `project_id`, `project_stage_id`, `updated_datetime` |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md):478 | `ProjectsService::createTaskInProject` | update | `tenant_id`, `project_id`, `project_stage_id` |  |
| [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md):155 | `ProjectTemplatesService::cleanup` | delete |  |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):126 | `TasksService::createTask` | insert | `title`, `description`, `status_id`, `priority_id`, `start_date`, `due_date`, `assigned_analyst_id`, `assigned_team_id`, `parent_task_id`, `ticket_id` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):141 | `TasksService::createTask` | update | `estimate_hours` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):144 | `TasksService::createTask` | update | `assigned_supplier_id`, `assigned_contact_id` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):359 | `TasksService::updateTask` | update |  |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):363 | `TasksService::updateTask` | update | `updated_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):418 | `TasksService::moveTask` | update | `status_id`, `completed_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):435 | `TasksService::moveTask` | update | `board_position` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):533 | `TasksService::deleteTask` | delete |  |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):555 | `TasksService::createComment` | update | `updated_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):726 | `TasksService::addCollaborator` | update | `updated_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):741 | `TasksService::removeCollaborator` | update | `updated_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):782 | `TasksService::setCollaboratorDone` | update | `updated_datetime` |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md):1029 | `TasksService::moveTaskToCompany` | update | `tenant_id`, `updated_datetime` |  |
| [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md):651 | `TaskRecurrence::createOccurrence` | insert | `title`, `description`, `status_id`, `priority_id`, `start_date`, `due_date`, `assigned_analyst_id`, `assigned_team_id`, `ticket_id`, `change_id` |  |
| [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md):696 | `TaskRecurrence::createOccurrence` | insert | `title`, `status_id`, `priority_id`, `assigned_analyst_id`, `assigned_team_id`, `parent_task_id`, `tenant_id`, `created_by_id`, `created_datetime`, `updated_datetime` |  |
| [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md):2389 | `WorkflowEngine::action_create_task` | insert | `title`, `description`, `status_id`, `priority_id`, `assigned_analyst_id`, `ticket_id`, `board_position`, `created_by_id`, `created_datetime`, `updated_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/system/debug-tools/D002_delete_ticket.php](/code/files/api/system/debug-tools/D002_delete_ticket.php.md) | L327 |  |
| [api/tasks/delete_task_priority.php](/code/files/api/tasks/delete_task_priority.php.md) | L32 |  |
| [api/tasks/delete_task_status.php](/code/files/api/tasks/delete_task_status.php.md) | L32 |  |
| [api/tasks/get.php](/code/files/api/tasks/get.php.md) | L39, L100, L107, L162, L170 |  |
| [api/tasks/get_time_entries.php](/code/files/api/tasks/get_time_entries.php.md) | L31 |  |
| [api/tasks/list.php](/code/files/api/tasks/list.php.md) | L125, L169, L198, L223, L297 |  |
| [api/tasks/recurrence_preview.php](/code/files/api/tasks/recurrence_preview.php.md) | L48, L77 |  |
| [api/tasks/reorder.php](/code/files/api/tasks/reorder.php.md) | L55 |  |
| [api/tasks/save_recurrence.php](/code/files/api/tasks/save_recurrence.php.md) | L41 |  |
| [api/tasks/toggle_subtask.php](/code/files/api/tasks/toggle_subtask.php.md) | L41 |  |
| [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md) | enrolReconcileTasks L94 |  |
| [api/tickets/get_ticket_tasks.php](/code/files/api/tickets/get_ticket_tasks.php.md) | L44 |  |
| [api/tickets/save_ticket_task.php](/code/files/api/tickets/save_ticket_task.php.md) | L75 |  |
| [api/tickets/schedule_feed.php](/code/files/api/tickets/schedule_feed.php.md) | L115 |  |
| [api/tickets/search_linkable_tasks.php](/code/files/api/tickets/search_linkable_tasks.php.md) | L50 |  |
| [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md) | apiProjectStages L288, apiProjectTasks L567 |  |
| [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md) | apiTaskSelect L41, apiSerializeTask L73, apiTasksList L266, apiTasksGet L298, apiTasksGet L308 |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) | calendarSyncPullForAnalyst L127 |  |
| [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md) | calendarSyncReconcileTask L184 |  |
| [includes/feature_bingo/cards/projects.php](/code/files/includes/feature_bingo/cards/projects.php.md) | L33, L338 |  |
| [includes/notifications_router.php](/code/files/includes/notifications_router.php.md) | notificationsTaskAssignedEmail L425 |  |
| [includes/people.php](/code/files/includes/people.php.md) | peopleContractorTasks L729 |  |
| [includes/projects/ai.php](/code/files/includes/projects/ai.php.md) | projectAiFacts L110, projectAiFacts L153, projectAiFacts L248 |  |
| [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md) | projectAssistTasks L231 |  |
| [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) | projectChatMaturity L114, projectChatMaturity L115, projectChatMaturity L116, projectChatMaturity L119, projectChatRead L232, projectChatTurn L368 ... |  |
| [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) | projectLabour L126, projectLabourToCome L257, projectEarnedValue L346 |  |
| [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md) | projectCapacity L121 |  |
| [includes/projects/control.php](/code/files/includes/projects/control.php.md) | projectPlanSnapshot L60, projectPlanSnapshot L63 |  |
| [includes/projects/dependencies.php](/code/files/includes/projects/dependencies.php.md) | projectDependencies L36 |  |
| [includes/projects/flow.php](/code/files/includes/projects/flow.php.md) | projectFlowSnapshot L35, projectFlow L67, projectFlow L76 |  |
| [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md) | projectAlertsOverdueDigest L39 |  |
| [includes/projects/read.php](/code/files/includes/projects/read.php.md) | projectTaskStats L35, projectEstimatesReady L338, projectDetail L356, projectDetail L364, projectDetail L369 |  |
| [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) | projectTemplateCapture L412 |  |
| [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) | recentTrailLabelsForType L436 |  |
| [includes/record_preview.php](/code/files/includes/record_preview.php.md) | recordPreviewTask L173 |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) | ChecklistsService::taskTenantId L440 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::raid L745, ProjectToolsService::setTaskDates L946, ProjectToolsService::setTaskEstimate L968, ProjectToolsService::addTaskDependency L1040 |  |
| [includes/services/projects.php](/code/files/includes/services/projects.php.md) | ProjectsService::assignTask L408 |  |
| [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md) | TaskRecurrence::ruleForTask L223, TaskRecurrence::project L384, TaskRecurrence::occurrenceExistsFor L448, TaskRecurrence::taskRow L610, TaskRecurrence::latestOccurrence L619, TaskRecurrence::createOccurrence L638 ... |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md) | TasksService::createTask L107, TasksService::createTask L113, TasksService::moveTask L425, TasksService::deleteTask L508, TasksService::taskEventDispatch L575, TasksService::collaboratorDispatch L854 ... |  |
| [includes/task_contractors.php](/code/files/includes/task_contractors.php.md) | tasksContractorReady L33, tasksContractors L55, tasksContractorEmail L135, tasksContractorReminders L190 |  |
| [includes/tenancy.php](/code/files/includes/tenancy.php.md) | analystCanAccessTask L572 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L783, getWatchtowerData L793, getWatchtowerData L810 |  |
| [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) | WorkflowEngine::action_create_task L2384 |  |

