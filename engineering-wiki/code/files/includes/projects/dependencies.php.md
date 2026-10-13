# includes/projects/dependencies.php

> PHP - 119 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [projectDependenciesReady()](/code/functions/projectDependenciesReady.md) | 22 | Projects - task dependencies and the critical path (3.3.0). |
| [projectDependencies()](/code/functions/projectDependencies.md) | 33 | A project's dependencies - both ends inside the project: [{id, task_id, depends_on_id, lag_days}]. |
| [projectDependencyMakesCycle()](/code/functions/projectDependencyMakesCycle.md) | 47 | Would task -> dependsOn close a loop (dependsOn already waits, directly or not, for task)? |
| [projectDependencyAnalysis()](/code/functions/projectDependencyAnalysis.md) | 66 | Per task: depends_on [{id, lag}], waiting_on [ids], clash (bool), critical (bool), slack (days or null). `$tasks` need id, start_date, due_date, is_closed. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 26 | `projectDependenciesReady` | read [task_dependencies](/code/tables/task_dependencies.md) |  |
| 36 | `projectDependencies` | read [task_dependencies](/code/tables/task_dependencies.md), read [tasks](/code/tables/tasks.md) |  |

## How it hangs together

**Included by:** [api/projects/get.php](/code/files/api/projects/get.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

