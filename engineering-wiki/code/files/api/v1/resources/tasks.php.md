# api/v1/resources/tasks.php

> API endpoint - 491 lines

FreeITSM REST API v1 — tasks resource (kanban Tasks module).

Mirrors the module's internal endpoints so a task touched via the API is
indistinguishable from one touched in the UI:
  - create mirrors api/tasks/save.php: only title is required, defaults
    To Do / Medium (falling back to the is_default rows), board_position
    appends to the end of the target status column.
  - status changes drive completed_datetime exactly like the UI
    (COALESCE-stamped on entering a closed status, cleared on reopening),
    and a PATCH that moves an open task into a closed status fires the
    task.completed workflow event with save.php's exact payload.
  - POST /tasks/{id}/move mirrors reorder.php: status + position change
    with the column re-packed — and, like the UI's drag, it does NOT fire
    the workflow event (that asymmetry is the product's, preserved for
    parity).
  - comments are create-only (no edit/delete exists in the product);
    DELETE is a hard delete that cascades subtasks/comments/tags.

Tasks have no audit trail in the product — none is invented here.
Task tables carry no tenant_id (install-wide), BUT a task can link to a
ticket, and tickets ARE company-scoped: the API validates ticket links
against the key's company scope and only reveals linked-ticket details the
key could read directly — tighter than the UI, which doesn't check.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/tasks.php` |
| Protected by | REST API key |
| Reads | `GET parent_task_id`, `GET state`, `GET collaborator_id`, `GET involved_analyst_id`, `GET unassigned`, `GET tag`, `GET q`, `GET overdue`, `GET sort` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiTaskSelect()](/code/functions/apiTaskSelect.md) | 40 |  |
| [apiTaskContractor()](/code/functions/apiTaskContractor.md) | 56 | Contractors (3.3.0): the supplier and the person there, by name - includes/task_contractors.php. |
| [apiSerializeTask()](/code/functions/apiSerializeTask.md) | 61 |  |
| [apiLoadTask()](/code/functions/apiLoadTask.md) | 127 |  |
| [apiTasksList()](/code/functions/apiTasksList.md) | 149 |  |
| [apiTasksGet()](/code/functions/apiTasksGet.md) | 291 |  |
| [apiTasksCreate()](/code/functions/apiTasksCreate.md) | 371 |  |
| [apiTasksUpdate()](/code/functions/apiTasksUpdate.md) | 381 |  |
| [apiTasksMove()](/code/functions/apiTasksMove.md) | 391 |  |
| [apiTasksDelete()](/code/functions/apiTasksDelete.md) | 404 |  |
| [apiTaskCommentsList()](/code/functions/apiTaskCommentsList.md) | 414 |  |
| [apiTaskCommentsCreate()](/code/functions/apiTaskCommentsCreate.md) | 433 |  |
| [apiTaskStatusesList()](/code/functions/apiTaskStatusesList.md) | 443 |  |
| [apiTaskPrioritiesList()](/code/functions/apiTaskPrioritiesList.md) | 461 |  |
| [apiTaskTagsList()](/code/functions/apiTaskTagsList.md) | 476 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 41 | `apiTaskSelect` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [task_priorities](/code/tables/task_priorities.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md) |  |
| 67 | `apiSerializeTask` | read [task_tag_map](/code/tables/task_tag_map.md), read [task_tags](/code/tables/task_tags.md) |  |
| 73 | `apiSerializeTask` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 201 | `apiTasksList` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 205 | `apiTasksList` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 220 | `apiTasksList` | read [task_tag_map](/code/tables/task_tag_map.md), read [task_tags](/code/tables/task_tags.md) |  |
| 266 | `apiTasksList` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [task_priorities](/code/tables/task_priorities.md) |  |
| 298 | `apiTasksGet` | read [tasks](/code/tables/tasks.md) |  |
| 308 | `apiTasksGet` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 327 | `apiTasksGet` | read [tickets](/code/tables/tickets.md) |  |
| 340 | `apiTasksGet` | read [changes](/code/tables/changes.md) |  |
| 351 | `apiTasksGet` | read [task_comments](/code/tables/task_comments.md), read [analysts](/code/tables/analysts.md) |  |
| 418 | `apiTaskCommentsList` | read [task_comments](/code/tables/task_comments.md), read [analysts](/code/tables/analysts.md) |  |
| 445 | `apiTaskStatusesList` | read [task_statuses](/code/tables/task_statuses.md) |  |
| 463 | `apiTaskPrioritiesList` | read [task_priorities](/code/tables/task_priorities.md) |  |
| 478 | `apiTaskTagsList` | read [task_tag_map](/code/tables/task_tag_map.md), read [task_tags](/code/tables/task_tags.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md), [includes/task_contractors.php](/code/files/includes/task_contractors.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyCanAccessTicket()](/code/functions/apiKeyCanAccessTicket.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDateOnly()](/code/functions/apiParseDateOnly.md), [apiRespond()](/code/functions/apiRespond.md), [naive_today_sql()](/code/functions/naive_today_sql.md), [tasksContractors()](/code/functions/tasksContractors.md)

