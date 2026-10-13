# includes/projects/flow.php

> PHP - 100 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [projectFlowReady()](/code/functions/projectFlowReady.md) | 18 | Projects - task flow over time (3.3.0): the cumulative flow diagram. |
| [projectFlowSnapshot()](/code/functions/projectFlowSnapshot.md) | 29 | Record today's counts by status for these projects (top-level tasks). Quiet: never breaks its caller. |
| [projectFlow()](/code/functions/projectFlow.md) | 53 | The flow for one project's chart: statuses [{id, name, closed}] in board order (the install's task statuses) points [{d, counts: {status_id\|'open'\|'done': n}, recorded: bool}] from the first recorded day (null = none yet) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 22 | `projectFlowReady` | read [project_task_flow](/code/tables/project_task_flow.md) |  |
| 35 | `projectFlowSnapshot` | read [tasks](/code/tables/tasks.md) |  |
| 39 | `projectFlowSnapshot` | **delete** [project_task_flow](/code/tables/project_task_flow.md) |  |
| 40 | `projectFlowSnapshot` | **insert** [project_task_flow](/code/tables/project_task_flow.md) (`project_id`, `day`, `status_id`, `task_count`) |  |
| 57 | `projectFlow` | read [task_statuses](/code/tables/task_statuses.md) |  |
| 60 | `projectFlow` | read [project_task_flow](/code/tables/project_task_flow.md) |  |
| 67 | `projectFlow` | read [tasks](/code/tables/tasks.md) |  |
| 76 | `projectFlow` | read [tasks](/code/tables/tasks.md) |  |

## How it hangs together

**Included by:** [api/projects/get.php](/code/files/api/projects/get.php.md), [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md)

