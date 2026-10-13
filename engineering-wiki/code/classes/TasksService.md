# TasksService

> Class in [includes/services/tasks.php](/code/files/includes/services/tasks.php.md), line 48

## Methods

| Method | What it does |
|---|---|
| [saveTask()](#savetask) | Create (no id) or update (id present) a task. Returns ['id','created']. |
| [createTask()](#createtask) | Creates a task with its status, priority, assignee, team or contractor, links, dates and tags, and fires task.created. Returns the new id. |
| [updateTask()](#updatetask) | Changes the fields sent for a task and fires the workflow and notification events the changes call for. |
| [moveTask()](#movetask) | Kanban move: change status (+ completed mechanics) and re-pack the target column. No workflow event. Returns the id. |
| [calendarOnTaskChanged()](#calendarontaskchanged) | Put this task into (or take it out of) its assignee's calendar (#75). |
| [recurrenceOnClosed()](#recurrenceonclosed) | Tells the recurrence engine a task was closed, so it can create the next occurrence; a failure is logged, never thrown. |
| [deleteTask()](#deletetask) | Hard-delete a task + its whole subtask tree (comments/tags too). Returns ['id','subtasks_deleted']. |
| [createComment()](#createcomment) | Add a comment to a task (create-only). Returns the comment id. |
| [taskEventDispatch()](#taskeventdispatch) | One dispatch helper for the task events that describe a CHANGE TO THE TASK rather than to one person's place on it. |
| [collaboratorCompletionEnabled()](#collaboratorcompletionenabled) | Is per-person completion switched on? (Tasks → Settings) |
| [taskForCollaborators()](#taskforcollaborators) | The task row, scoped — for a caller that needs the owner and company before it can decide what to offer. |
| [collaboratorsFor()](#collaboratorsfor) | The collaborators on one task, in the order they were added. |
| [collaboratorsForMany()](#collaboratorsformany) | Collaborators for many tasks at once, as [task_id => [rows]]. |
| [addCollaborator()](#addcollaborator) | Put somebody on a task. Idempotent — adding twice is not a second fact. |
| [removeCollaborator()](#removecollaborator) | Take somebody off a task. |
| [setCollaboratorDone()](#setcollaboratordone) | Tick or untick one person's part of the task. |
| [collaboratorsOutstanding()](#collaboratorsoutstanding) | How many collaborators have yet to tick — for the closing warning. |
| [assertCollaboratorsAllowed()](#assertcollaboratorsallowed) | Collaborators are for TOP-LEVEL tasks only — Ed's call, and a sound one. A subtask already takes an assignee of its own, so people on a subtask is how you say "these four are each doing a piece"; collaborators on top of that would give two overlapping ways to express the same thing and no rule for which wins. |
| [assertAnalystInTaskCompany()](#assertanalystintaskcompany) | 🔒 The analyst being added must be able to reach the task's company. |
| [collaboratorDispatch()](#collaboratordispatch) | A NEW workflow event, never a widened `task.assigned`. |
| [loadTaskRow()](#loadtaskrow) | Load a task with its status is_closed flag, or throw 404. |
| [moveTaskToCompany()](#movetasktocompany) | Move a task to another company. |
| [tableHasTenantColumn()](#tablehastenantcolumn) | Does this table carry a `tenant_id` column? |
| [taskAndDescendantIds()](#taskanddescendantids) | A task and every task beneath it, however deep. |
| [parentTaskTenant()](#parenttasktenant) | A subtask inherits its parent's company, always. |
| [taskAccessible()](#taskaccessible) | Is an already-loaded task row inside the actor's company scope? |
| [resolveNewTaskTenant()](#resolvenewtasktenant) | Which company should a NEW task belong to? |
| [resolveLookup()](#resolvelookup) | Resolve a status/priority lookup by name or id — strict 422 on unknown. Returns [id, name(, is_closed)] or null. |
| [lookupDefault()](#lookupdefault) | The default row of a lookup table — the CONFIGURED default, never a name. |
| [contractorAllowed()](#contractorallowed) | Contractors (3.3.0): suppliers live in Contracts, so CHOOSING one needs it - from the board, the REST API or Ask AI alike. The system (actorId 0) may. |
| [validateTeam()](#validateteam) | Validate an optional team id (422 on unknown). |
| [validateLink()](#validatelink) | Validate a link column + parent task. Ticket links are checked against the actor's company scope (tickets are tenant-scoped; tasks aren't). |
| [ticketAccessible()](#ticketaccessible) | Can the actor's company scope reach this ticket? Mirrors apiKeyCanAccessTicket via ActorContext. |
| [resolveTags()](#resolvetags) | Resolve a tags array (names or ids) to ids — strict 422 on unknown (curated list). |
| [syncTags()](#synctags) | Replaces a task's tags with `$tagIds`. |
| [timeScope()](#timescope) | The administrator's choice of where time appears, from Tasks → Settings. |
| [timeAllowedFor()](#timeallowedfor) | May THIS task carry scheduled work and time entries? |
| [createTimeEntry()](#createtimeentry) | Log time against a task. Returns the entry id. |
| [deleteTimeEntry()](#deletetimeentry) | Soft-delete a time entry. Only the analyst who logged it may remove it. |
| [timeEntriesFor()](#timeentriesfor) | The entries on a task, plus two totals. |
| [assertTimeAllowed()](#asserttimeallowed) | Refuse the WRITE too, not only the display — a stale tab must not slip past a setting. |
| [assignedDispatch()](#assigneddispatch) | task.assigned — fired whenever a task comes to rest with a NEW assignee, from creation and from reassignment alike (GH #110). |
| [completedDispatch()](#completeddispatch) | save.php's exact task.completed dispatch (open -> closed via PATCH only). |
| [resolveAnalyst()](#resolveanalyst) | Throws unless the id is an active analyst. |
| [parseEstimate()](#parseestimate) | An estimate in hours (3.3.0): empty = not estimated; otherwise more than 0 and at most 9999, to two decimals ("1.5" = an hour and a half). |
| [parseDateOnly()](#parsedateonly) | Validates an optional YYYY-MM-DD date for `$field`; blank gives null. |
| [parseNaiveDateTime()](#parsenaivedatetime) | A NAIVE wall clock — scheduled work, stored and shown exactly as typed. |
| [parseInstant()](#parseinstant) | An absolute INSTANT — when a piece of work actually happened. |

### saveTask

*public static* - line 55

Create (no id) or update (id present) a task. Returns ['id','created'].

```php
function saveTask(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Called from:** [api/tasks/save.php](/code/files/api/tasks/save.php.md), [api/tickets/save_ticket_task.php](/code/files/api/tickets/save_ticket_task.php.md), [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), [includes/services/projects.php](/code/files/includes/services/projects.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### createTask

*private static* - line 67

Creates a task with its status, priority, assignee, team or contractor, links, dates and tags, and fires task.created. Returns the new id.

```php
function createTask(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 111 | `TasksService::createTask` | read [tasks](/code/tables/tasks.md) |  |
| 117 | `TasksService::createTask` | read [tasks](/code/tables/tasks.md) |  |
| 130 | `TasksService::createTask` | **insert** [tasks](/code/tables/tasks.md) (`title`, `description`, `status_id`, `priority_id`, `start_date`, `due_date`, `assigned_analyst_id`, `assigned_team_id`, `parent_task_id`, `ticket_id`, `change_id`, `contract_id`) |  |
| 145 | `TasksService::createTask` | **update** [tasks](/code/tables/tasks.md) (`estimate_hours`) |  |
| 148 | `TasksService::createTask` | **update** [tasks](/code/tables/tasks.md) (`assigned_supplier_id`, `assigned_contact_id`) |  |

### updateTask

*private static* - line 193

Changes the fields sent for a task and fires the workflow and notification events the changes call for.

Closing a task stamps its completed time and lets a recurring task schedule its next
occurrence.

```php
function updateTask(PDO $conn, ActorContext $ctx, int $taskId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 370 | `TasksService::updateTask` | **update** [tasks](/code/tables/tasks.md) |  |
| 374 | `TasksService::updateTask` | **update** [tasks](/code/tables/tasks.md) (`updated_datetime`) |  |

### moveTask

*public static* - line 408

Kanban move: change status (+ completed mechanics) and re-pack the target column. No workflow event. Returns the id.

```php
function moveTask(PDO $conn, ActorContext $ctx, int $taskId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 429 | `TasksService::moveTask` | **update** [tasks](/code/tables/tasks.md) (`status_id`, `completed_datetime`) |  |
| 436 | `TasksService::moveTask` | read [tasks](/code/tables/tasks.md) |  |
| 446 | `TasksService::moveTask` | **update** [tasks](/code/tables/tasks.md) (`board_position`) |  |

**Called from:** [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md)

### calendarOnTaskChanged

*private static* - line 490

Put this task into (or take it out of) its assignee's calendar (#75).

⚠️ CALL AFTER COMMIT, never inside a transaction — it makes a network
call, and holding row locks across one turns a slow third party into a
database problem. Same rule the ticket side documents.

⚠️ Wrapped, and swallowing Throwable rather than Exception: a task must
save even if the calendar file is missing on a part-upgraded install,
and a missing class raises an Error, which `catch (Exception)` misses.

```php
function calendarOnTaskChanged(PDO $conn, int $taskId, bool $gone = false): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |
| `$gone` | `bool` | `false` |  |

### recurrenceOnClosed

*private static* - line 504

Tells the recurrence engine a task was closed, so it can create the next occurrence; a failure is logged, never thrown.

```php
function recurrenceOnClosed(PDO $conn, int $taskId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |

### deleteTask

*public static* - line 515

Hard-delete a task + its whole subtask tree (comments/tags too). Returns ['id','subtasks_deleted'].

```php
function deleteTask(PDO $conn, ActorContext $ctx, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 523 | `TasksService::deleteTask` | read [tasks](/code/tables/tasks.md) |  |
| 542 | `TasksService::deleteTask` | **delete** [task_comments](/code/tables/task_comments.md) |  |
| 543 | `TasksService::deleteTask` | **delete** [task_tag_map](/code/tables/task_tag_map.md) |  |
| 548 | `TasksService::deleteTask` | **delete** [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/tasks/delete.php](/code/files/api/tasks/delete.php.md), [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md)

### createComment

*public static* - line 560

Add a comment to a task (create-only). Returns the comment id.

```php
function createComment(PDO $conn, ActorContext $ctx, int $taskId, string $text): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$text` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 567 | `TasksService::createComment` | **insert** [task_comments](/code/tables/task_comments.md) (`task_id`, `analyst_id`, `comment`, `created_datetime`) |  |
| 570 | `TasksService::createComment` | **update** [tasks](/code/tables/tasks.md) (`updated_datetime`) |  |

**Called from:** [api/tasks/save_comment.php](/code/files/api/tasks/save_comment.php.md), [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md)

### taskEventDispatch

*private static* - line 587

One dispatch helper for the task events that describe a CHANGE TO THE TASK rather than to one person's place on it.

⚠️ assignee_id carries the OWNER, as it does on every other task event, so
a workflow reading these the way it reads task.assigned finds the person
accountable. Who is TOLD is a separate question, answered by the router:
these events reach the owner AND everybody involved.

```php
function taskEventDispatch(PDO $conn, string $event, int $taskId, array $extra = []): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$event` | `string` |  |  |
| `$taskId` | `int` |  |  |
| `$extra` | `array` | `[]` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 590 | `TasksService::taskEventDispatch` | read [tasks](/code/tables/tasks.md) |  |

### collaboratorCompletionEnabled

*public static* - line 633

Is per-person completion switched on? (Tasks → Settings)

Off by default — the request was to SEE other people on a task, and a tick
box each is a heavier thing that most desks will not want. Naming and shape
follow `timeScope()` above.

```php
function collaboratorCompletionEnabled(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 636 | `TasksService::collaboratorCompletionEnabled` | read [system_settings](/code/tables/system_settings.md) |  |

**Called from:** [api/tasks/collaborators.php](/code/files/api/tasks/collaborators.php.md), [api/tasks/get.php](/code/files/api/tasks/get.php.md)

### taskForCollaborators

*public static* - line 654

The task row, scoped — for a caller that needs the owner and company before it can decide what to offer.

⚠️ It exists so the READ path goes through `loadTaskRow()` like every write
does. Letting the endpoint run its own `SELECT * FROM tasks` would be the
one by-id route not covered by the company check, which is exactly how a
child endpoint gets missed.

```php
function taskForCollaborators(PDO $conn, ActorContext $ctx, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |

**Called from:** [api/tasks/collaborators.php](/code/files/api/tasks/collaborators.php.md)

### collaboratorsFor

*public static* - line 667

The collaborators on one task, in the order they were added.

⚠️ INNER JOIN on analysts, so a row whose analyst has been deleted simply
does not come back. The FK cascades, so that should not happen — but a
half-migrated install can have rows the constraint never covered, and a
chip reading "undefined" is worse than a person quietly missing.

```php
function collaboratorsFor(PDO $conn, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |

**Called from:** [api/tasks/collaborators.php](/code/files/api/tasks/collaborators.php.md), [api/tasks/get.php](/code/files/api/tasks/get.php.md), [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md)

### collaboratorsForMany

*public static* - line 680

Collaborators for many tasks at once, as [task_id => [rows]].

⚠️ ONE QUERY, NOT ONE PER TASK. The board renders every task on the desk;
a per-task lookup here would add a query per card to the module's busiest
endpoint. Same reason list.php already batches its subtask and tag lookups.

```php
function collaboratorsForMany(PDO $conn, array $taskIds): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 689 | `TasksService::collaboratorsForMany` | read [task_collaborators](/code/tables/task_collaborators.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/tasks/list.php](/code/files/api/tasks/list.php.md), [api/tickets/get_ticket_tasks.php](/code/files/api/tickets/get_ticket_tasks.php.md)

### addCollaborator

*public static* - line 717

Put somebody on a task. Idempotent — adding twice is not a second fact.

```php
function addCollaborator(PDO $conn, ActorContext $ctx, int $taskId, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 731 | `TasksService::addCollaborator` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 738 | `TasksService::addCollaborator` | **insert** [task_collaborators](/code/tables/task_collaborators.md) (`task_id`, `analyst_id`, `added_by_id`, `added_datetime`) |  |
| 741 | `TasksService::addCollaborator` | **update** [tasks](/code/tables/tasks.md) (`updated_datetime`) |  |

**Called from:** [api/tasks/collaborators.php](/code/files/api/tasks/collaborators.php.md)

### removeCollaborator

*public static* - line 748

Take somebody off a task.

```php
function removeCollaborator(PDO $conn, ActorContext $ctx, int $taskId, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 751 | `TasksService::removeCollaborator` | **delete** [task_collaborators](/code/tables/task_collaborators.md) |  |
| 756 | `TasksService::removeCollaborator` | **update** [tasks](/code/tables/tasks.md) (`updated_datetime`) |  |

**Called from:** [api/tasks/collaborators.php](/code/files/api/tasks/collaborators.php.md)

### setCollaboratorDone

*public static* - line 773

Tick or untick one person's part of the task.

🔴 A TICK IS PROGRESS, NOT A GATE. The owner still closes the task, whether
or not everybody has ticked. Making completion conditional on the ticks
would mean one person leaving makes a task permanently uncloseable, and
would quietly hand every collaborator a veto — which is co-ownership again,
the thing owner+collaborators exists to avoid.

⚠️ Only the person themselves, or the task's owner, may move a tick. Anyone
else marking your work done is a statement about you that you did not make.

```php
function setCollaboratorDone(
    PDO $conn,
    ActorContext $ctx,
    int $taskId,
    int $analystId,
    bool $done
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$analystId` | `int` |  |  |
| `$done` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 783 | `TasksService::setCollaboratorDone` | **update** [task_collaborators](/code/tables/task_collaborators.md) (`is_completed`, `completed_datetime`) |  |
| 791 | `TasksService::setCollaboratorDone` | read [task_collaborators](/code/tables/task_collaborators.md) |  |
| 797 | `TasksService::setCollaboratorDone` | **update** [tasks](/code/tables/tasks.md) (`updated_datetime`) |  |

**Called from:** [api/tasks/collaborators.php](/code/files/api/tasks/collaborators.php.md)

### collaboratorsOutstanding

*public static* - line 802

How many collaborators have yet to tick — for the closing warning.

```php
function collaboratorsOutstanding(PDO $conn, int $taskId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 805 | `TasksService::collaboratorsOutstanding` | read [task_collaborators](/code/tables/task_collaborators.md) |  |

### assertCollaboratorsAllowed

*private static* - line 820

Collaborators are for TOP-LEVEL tasks only — Ed's call, and a sound one. A subtask already takes an assignee of its own, so people on a subtask is how you say "these four are each doing a piece"; collaborators on top of that would give two overlapping ways to express the same thing and no rule for which wins.

```php
function assertCollaboratorsAllowed(array $taskRow): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$taskRow` | `array` |  |  |

### assertAnalystInTaskCompany

*private static* - line 838

🔒 The analyst being added must be able to reach the task's company.

⚠️ THE PICKER IS THE SAME QUESTION AND MUST USE THE SAME ANSWER. A list
offering analysts from other companies is a disclosure on its own, before
anybody is added — so api/tasks/collaborators.php filters its candidate
list through this too, rather than validating only on save.

Permissive on a single-company install, where the question does not arise.

```php
function assertAnalystInTaskCompany(PDO $conn, array $taskRow, int $analystId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskRow` | `array` |  |  |
| `$analystId` | `int` |  |  |

### collaboratorDispatch

*private static* - line 866

A NEW workflow event, never a widened `task.assigned`.

🔴 THIS IS THE ONE THAT WOULD HAVE BROKEN EXISTING INSTALLS. `task.assigned`
carries a SCALAR `assignee_id`, and the notification router reads the
recipient from exactly that field (GH #110). Turning it into an array would
leave every stored workflow running and quietly matching nothing; firing
`task.assigned` once per collaborator instead would make workflows that
fired once fire four times. Both failures are silent. A separate event
cannot do either.

```php
function collaboratorDispatch(PDO $conn, string $event, int $taskId, int $analystId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$event` | `string` |  |  |
| `$taskId` | `int` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 869 | `TasksService::collaboratorDispatch` | read [tasks](/code/tables/tasks.md) |  |

### loadTaskRow

*private static* - line 895

Load a task with its status is_closed flag, or throw 404.

```php
function loadTaskRow(PDO $conn, ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 898 | `TasksService::loadTaskRow` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |

### moveTaskToCompany

*public static* - line 951

Move a task to another company.

Asked for in the 2.5.0 request list. Tasks could be CREATED in a company
but never moved between them, so a task raised against the wrong client
could only be deleted and retyped - losing its comments, its time entries
and its history along with the mistake.

The twin of api/change-management/move_to_company.php, gated the same way:
the actor must be able to reach the task where it currently sits AND the
company it is going to. Two things make this harder than the Changes
version, and both are refusals rather than quiet fixes:

 1. A SUBTASK inherits its parent's company, always (see
    parentTaskTenant). Moving one on its own would break that invariant
    silently - the subtask would sit in a company its parent is not in,
    and the board would show a parent with a child nobody else can see.
    So it is refused, naming the parent to move instead.

 2. A task LINKED to a ticket, change or contract belongs where that
    record belongs; createTask already enforces exactly that and refuses a
    tenant_id that disagrees with the linked ticket. Moving the task alone
    would leave the two disagreeing, so this refuses too and says which
    link is in the way. Unlinking first is a decision for the person, not
    something to do on their behalf while they are looking elsewhere.

SUBTASKS MOVE WITH THE PARENT. That is not a convenience - leaving them
behind is the same broken state as (1), reached from the other direction.

```php
function moveTaskToCompany(PDO $conn, ActorContext $ctx, int $taskId, int $targetTenantId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$targetTenantId` | `int` |  |  |

**Returns:** array{moved:int, from:string, to:string}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1044 | `TasksService::moveTaskToCompany` | **update** [tasks](/code/tables/tasks.md) (`tenant_id`, `updated_datetime`) |  |
| 1051 | `TasksService::moveTaskToCompany` | **insert** [task_audit](/code/tables/task_audit.md) (`task_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |

**Called from:** [api/tasks/move_to_company.php](/code/files/api/tasks/move_to_company.php.md)

### tableHasTenantColumn

*private static* - line 1075

Does this table carry a `tenant_id` column?

Asked of information_schema rather than assumed, because the answer
differs per table and changes over time: tickets and changes have one,
contracts do not. Cached per request - the move loop asks about the same
three tables, and this is called on a path a person is waiting on.

```php
function tableHasTenantColumn(PDO $conn, string $table): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |

### taskAndDescendantIds

*private static* - line 1101

A task and every task beneath it, however deep.

Iterative rather than recursive SQL: MySQL 5.7 has no recursive CTE and
this product still supports it. The visited set is not decoration - a
parent chain that somehow loops would otherwise spin here for ever, and a
bad row in the database should not be able to hang a request.

```php
function taskAndDescendantIds(PDO $conn, int $rootId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$rootId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1109 | `TasksService::taskAndDescendantIds` | read [tasks](/code/tables/tasks.md) |  |

### parentTaskTenant

*private static* - line 1125

A subtask inherits its parent's company, always.

```php
function parentTaskTenant(PDO $conn, int $parentId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$parentId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1127 | `TasksService::parentTaskTenant` | read [tasks](/code/tables/tasks.md) |  |

### taskAccessible

*private static* - line 1134

Is an already-loaded task row inside the actor's company scope?

```php
function taskAccessible(PDO $conn, ActorContext $ctx, array $row): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$row` | `array` |  |  |

### resolveNewTaskTenant

*private static* - line 1171

Which company should a NEW task belong to?

1. Linked to a ticket → the ticket's company. The task is work arising from
   that ticket, so it belongs where the ticket belongs. This is the GH #83
   path and the one that matters most.
2. Explicitly supplied → honoured only if the actor may reach it. Refused
   outright rather than quietly downgraded to NULL, which would silently
   move someone's task to the Default company.
3. From the UI → the analyst's active company, so a task created while
   working on a client does not vanish from the board the moment it is made.
4. Otherwise → NULL, i.e. the Default company. The state every existing task
   is already in.

```php
function resolveNewTaskTenant(PDO $conn, ActorContext $ctx, array $in, ?int $ticketId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |
| `$ticketId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1178 | `TasksService::resolveNewTaskTenant` | read [tickets](/code/tables/tickets.md) |  |

### resolveLookup

*private static* - line 1204

Resolve a status/priority lookup by name or id — strict 422 on unknown. Returns [id, name(, is_closed)] or null.

```php
function resolveLookup(
    PDO $conn,
    array $in,
    string $key,
    string $table,
    bool $withClosed = false
): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |
| `$key` | `string` |  |  |
| `$table` | `string` |  |  |
| `$withClosed` | `bool` | `false` |  |

### lookupDefault

*private static* - line 1244

The default row of a lookup table — the CONFIGURED default, never a name.

This used to try `WHERE name = 'To Do'` / `'Medium'` first and fall back to
is_default. Two faults in one line. It ignored an admin who had made a
different status or priority the default, because the English seed name
won; and on a site that had renamed or translated them the name matched
nothing, which is the shape of GH #79 — every ticket intake path looked the
starting status up by the word 'Open', and a German install that renamed it
to Offen got tickets with no status and no error.

Same ordering as the fix there: is_active filters rather than sorts, since
a deactivated default is absent from the dropdown and choosing it would
reproduce the symptom by another route; is_closed is deliberately not
filtered, because an admin who makes a closed status the default has said
what they meant.

```php
function lookupDefault(PDO $conn, string $table, bool $withClosed = false): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$table` | `string` |  |  |
| `$withClosed` | `bool` | `false` |  |

### contractorAllowed

*private static* - line 1265

Contractors (3.3.0): suppliers live in Contracts, so CHOOSING one needs it - from the board, the REST API or Ask AI alike. The system (actorId 0) may.

```php
function contractorAllowed(PDO $conn, ActorContext $ctx): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |

### validateTeam

*private static* - line 1273

Validate an optional team id (422 on unknown).

```php
function validateTeam(PDO $conn, $value): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$value` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1279 | `TasksService::validateTeam` | read [teams](/code/tables/teams.md) |  |

### validateLink

*private static* - line 1291

Validate a link column + parent task. Ticket links are checked against the actor's company scope (tickets are tenant-scoped; tasks aren't).

```php
function validateLink(PDO $conn, ActorContext $ctx, string $field, $value): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$field` | `string` |  |  |
| `$value` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1304 | `TasksService::validateLink` | read [changes](/code/tables/changes.md) |  |
| 1310 | `TasksService::validateLink` | read [contracts](/code/tables/contracts.md) |  |
| 1313 | `TasksService::validateLink` | read [tasks](/code/tables/tasks.md) |  |

### ticketAccessible

*private static* - line 1330

Can the actor's company scope reach this ticket? Mirrors apiKeyCanAccessTicket via ActorContext.

```php
function ticketAccessible(PDO $conn, ActorContext $ctx, int $ticketId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$ticketId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1336 | `TasksService::ticketAccessible` | read [tickets](/code/tables/tickets.md) |  |

### resolveTags

*private static* - line 1365

Resolve a tags array (names or ids) to ids — strict 422 on unknown (curated list).

```php
function resolveTags(PDO $conn, array $tags): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tags` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1370 | `TasksService::resolveTags` | read [task_tags](/code/tables/task_tags.md) |  |
| 1373 | `TasksService::resolveTags` | read [task_tags](/code/tables/task_tags.md) |  |

### syncTags

*private static* - line 1386

Replaces a task's tags with `$tagIds`.

```php
function syncTags(PDO $conn, int $taskId, array $tagIds): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |
| `$tagIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1388 | `TasksService::syncTags` | **delete** [task_tag_map](/code/tables/task_tag_map.md) |  |
| 1389 | `TasksService::syncTags` | **insert** [task_tag_map](/code/tables/task_tag_map.md) (`task_id`, `tag_id`) |  |

### timeScope

*public static* - line 1410

The administrator's choice of where time appears, from Tasks → Settings.

A top-level task and a subtask are the SAME record, told apart only by
parent_task_id, so this setting is the only thing that distinguishes them
here — which is why the rule lives in one function rather than being
re-derived at each call site.

```php
function timeScope(PDO $conn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1413 | `TasksService::timeScope` | read [system_settings](/code/tables/system_settings.md) |  |

### timeAllowedFor

*public static* - line 1432

May THIS task carry scheduled work and time entries?

⚠️ Existing entries are never deleted when the setting narrows, only
hidden — an administrator changing a display rule must not destroy hours
somebody recorded. The same applies when a task changes level: drag a
top-level task under a parent and its time is still there, shown again the
moment the setting allows it.

```php
function timeAllowedFor(PDO $conn, ?int $parentTaskId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$parentTaskId` | `?int` |  |  |

**Called from:** [api/tasks/get_time_entries.php](/code/files/api/tasks/get_time_entries.php.md)

### createTimeEntry

*public static* - line 1442

Log time against a task. Returns the entry id.

```php
function createTimeEntry(PDO $conn, ActorContext $ctx, int $taskId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1458 | `TasksService::createTimeEntry` | **insert** [task_time_entries](/code/tables/task_time_entries.md) (`task_id`, `analyst_id`, `notes`, `time_spent_minutes`, `entry_datetime`) |  |

**Called from:** [api/tasks/save_time_entry.php](/code/files/api/tasks/save_time_entry.php.md)

### deleteTimeEntry

*public static* - line 1465

Soft-delete a time entry. Only the analyst who logged it may remove it.

```php
function deleteTimeEntry(PDO $conn, ActorContext $ctx, int $entryId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$entryId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1467 | `TasksService::deleteTimeEntry` | read [task_time_entries](/code/tables/task_time_entries.md) |  |
| 1477 | `TasksService::deleteTimeEntry` | **update** [task_time_entries](/code/tables/task_time_entries.md) (`is_active`) |  |

**Called from:** [api/tasks/delete_time_entry.php](/code/files/api/tasks/delete_time_entry.php.md)

### timeEntriesFor

*public static* - line 1491

The entries on a task, plus two totals.

`total_minutes` is this task alone. `total_with_subtasks_minutes` adds every
subtask's time — which is the number mbsouth asked for, and the one that
answers "how long did this piece of work take" once it has been broken up.

One level deep, deliberately: FreeITSM only lets a task have subtasks, not
sub-subtasks, so a recursive walk would be answering a question the data
model cannot ask.

```php
function timeEntriesFor(PDO $conn, ActorContext $ctx, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1496 | `TasksService::timeEntriesFor` | read [task_time_entries](/code/tables/task_time_entries.md), read [analysts](/code/tables/analysts.md) |  |
| 1512 | `TasksService::timeEntriesFor` | read [task_time_entries](/code/tables/task_time_entries.md), read [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/tasks/get_time_entries.php](/code/files/api/tasks/get_time_entries.php.md)

### assertTimeAllowed

*private static* - line 1529

Refuse the WRITE too, not only the display — a stale tab must not slip past a setting.

```php
function assertTimeAllowed(PDO $conn, array $taskRow): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskRow` | `array` |  |  |

### assignedDispatch

*private static* - line 1557

task.assigned — fired whenever a task comes to rest with a NEW assignee, from creation and from reassignment alike (GH #110).

⚠️ Both paths matter, and only one of them looks like "assigning". A task
created with an assignee is the ordinary way work is handed out here, so
firing only on reassignment would leave the commonest case silent — which
is the half a fix like this is most likely to miss.

The row is read back AFTER the write so the payload carries what was
actually stored, rather than a mixture of new input and stale columns when
the title changed in the same request.

Deliberately NOT filtered for self-assignment. Whether to suppress "you
assigned it to yourself" is the notification layer's rule, enforced in
includes/notifications_router.php; a workflow may legitimately want the
event either way, and duplicating the rule here would let the two drift.

```php
function assignedDispatch(PDO $conn, int $taskId, int $assigneeId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |
| `$assigneeId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1560 | `TasksService::assignedDispatch` | read [tasks](/code/tables/tasks.md) |  |

### completedDispatch

*private static* - line 1580

save.php's exact task.completed dispatch (open -> closed via PATCH only).

```php
function completedDispatch(PDO $conn, int $taskId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$taskId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1583 | `TasksService::completedDispatch` | read [tasks](/code/tables/tasks.md) |  |

### resolveAnalyst

*private static* - line 1600

Throws unless the id is an active analyst.

```php
function resolveAnalyst(PDO $conn, int $analystId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1602 | `TasksService::resolveAnalyst` | read [analysts](/code/tables/analysts.md) |  |

### parseEstimate

*private static* - line 1613

An estimate in hours (3.3.0): empty = not estimated; otherwise more than 0 and at most 9999, to two decimals ("1.5" = an hour and a half).

```php
function parseEstimate($v): ?float
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### parseDateOnly

*private static* - line 1623

Validates an optional YYYY-MM-DD date for `$field`; blank gives null.

```php
function parseDateOnly($value, string $field): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

### parseNaiveDateTime

*private static* - line 1643

A NAIVE wall clock — scheduled work, stored and shown exactly as typed.

⚠️ Deliberately NOT `parseInstant()` below. A 2pm slot means 2pm to everybody
who reads it, so this value is never zone-converted in either direction; a
zone offset in the input is therefore refused rather than quietly dropped,
because accepting it would imply a conversion that will not happen.

```php
function parseNaiveDateTime($value, string $field): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$field` | `string` |  |  |

### parseInstant

*private static* - line 1671

An absolute INSTANT — when a piece of work actually happened.

The opposite kind of value to the one above, and the distinction that GH
#116 turned on: this one IS zone-converted for each reader, so a zone-less
string can only be read as UTC. The browser sends ISO-8601 with a Z.

```php
function parseInstant(string $value, string $field): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` | `string` |  |  |
| `$field` | `string` |  |  |

