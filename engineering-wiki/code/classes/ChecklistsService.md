# ChecklistsService

> Class in [includes/services/checklists.php](/code/files/includes/services/checklists.php.md), line 50

## Methods

| Method | What it does |
|---|---|
| [hasAttachedChecklists()](#hasattachedchecklists) | Check if a ticket has at least one checklist / SOP attached. |
| [outstandingMandatorySteps()](#outstandingmandatorysteps) | Mandatory steps still outstanding on a ticket. |
| [effectiveClosureMode()](#effectiveclosuremode) | What this one checklist's gate actually is, once the company setting has had its say. |
| [assertClosureAllowed()](#assertclosureallowed) | Refuse the closure outright where the gate is a block. |
| [recordClosureOverride()](#recordclosureoverride) | Called by TicketsService when a ticket moves to a closed status. |
| [closedBy()](#closedby) | "Closed by Jane Smith via the web interface." — one phrasing, used by both notes. |
| [writeClosureNote()](#writeclosurenote) | Write one closure-audit entry, wherever it belongs. |
| [lookup()](#lookup) | The table and label of a checklist settings list; throws for an unknown list. |
| [saveLookup()](#savelookup) | Create (no id) or rename (id present) a category or role. Returns the id. |
| [deleteLookup()](#deletelookup) | Delete a category or role. |
| [tasksEnabled()](#tasksenabled) | Is Tasks → Settings → Checklists switched on? Off by default; safe before DB Verification. |
| [taskTenantId()](#tasktenantid) | The task's company for the gate (NULL = the Default company, read as the install default). |
| [taskChecklists()](#taskchecklists) | The task's checklists with their steps and progress, each carrying the gate it will ACTUALLY apply (template mode + company setting), resolved here so the padlock in the panel is the lock the server enforces. |
| [templatesForTask()](#templatesfortask) | Templates offered for a task: scope task or both, active, with the gate each would apply. |
| [attachTemplateToTask()](#attachtemplatetotask) | Attach a template to a task: copy its title, gate and steps. Returns the new id. |
| [copyTemplateToTask()](#copytemplatetotask) | The one place a task checklist is written: parent, then its steps, in one transaction. |
| [nextTaskChecklistOrder()](#nexttaskchecklistorder) | A newly attached checklist goes below the ones already on the task. |
| [reorderTaskChecklists()](#reordertaskchecklists) | Put a task's checklists in a new order. `$ids` is the whole list, top first. Each UPDATE is pinned to the task, so an id from another task matches nothing - the caller gates on `$taskId` and that gate then covers every row. |
| [reorderTaskChecklistItems()](#reordertaskchecklistitems) | The same for the steps inside one checklist, pinned to that checklist. |
| [taskIdForItem()](#taskidforitem) | Which task does this step / checklist belong to? 0 if neither exists. Callers gate on the task. |
| [taskIdForChecklist()](#taskidforchecklist) | The task a checklist is attached to, or 0. |
| [toggleTaskItem()](#toggletaskitem) | Tick or untick a step. A step that asks for a value cannot be ticked without one - enforced here, not only in the panel, because a tick with an empty answer is a record that says something was checked when it was not. |
| [removeTaskChecklist()](#removetaskchecklist) | Remove one checklist from a task: its steps first (no FK to rely on), then it. |
| [deleteForTasks()](#deletefortasks) | Remove every checklist from these tasks - for TasksService::deleteTask, which deletes a whole subtask tree. Children explicitly, then parents; tolerant of the tables not existing yet. |
| [taskOutstandingMandatorySteps()](#taskoutstandingmandatorysteps) | Mandatory steps still outstanding on a task (same shape as the ticket version). |
| [taskCompletionCheck()](#taskcompletioncheck) | What completing this task now would run into - for the panel and the board to warn BEFORE they post. Read-only; the server still decides. |
| [assertTaskCompletionAllowed()](#asserttaskcompletionallowed) | Refuse completing the task where a Critical checklist has steps outstanding. |
| [recordTaskCompletionOverride()](#recordtaskcompletionoverride) | Called AFTER a task has moved to a closed status: record any Standard checklist steps it was completed without, on the task's own audit trail. |
| [copyTaskChecklists()](#copytaskchecklists) | Give a new occurrence of a recurring task fresh, unticked copies of the checklists the finished one had (TaskRecurrence::createOccurrence). |

### hasAttachedChecklists

*public static* - line 55

Check if a ticket has at least one checklist / SOP attached.

```php
function hasAttachedChecklists(PDO $conn, int $ticketId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 59 | `ChecklistsService::hasAttachedChecklists` | read [ticket_checklists](/code/tables/ticket_checklists.md) |  |

### outstandingMandatorySteps

*public static* - line 72

Mandatory steps still outstanding on a ticket.

```php
function outstandingMandatorySteps(PDO $conn, int $ticketId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |

**Returns:** array<int, array{checklist: string, step: string, item_id: int}>

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 80 | `ChecklistsService::outstandingMandatorySteps` | read [ticket_checklist_items](/code/tables/ticket_checklist_items.md), read [ticket_checklists](/code/tables/ticket_checklists.md) |  |

### effectiveClosureMode

*public static* - line 116

What this one checklist's gate actually is, once the company setting has had its say.

Two dials, and they only ever tighten:

  the template   Standard (warn and record) or Critical (block), chosen
                 by whoever wrote the procedure, because they are the one
                 who knows whether skipping a step is a nuisance or a
                 compliance breach.
  the company    'per_template' honours that choice; 'block_all' overrides
                 every template and blocks the lot.

There is deliberately no company setting that loosens a Critical template
to a warning. An operator who wants that should edit the template, where
the change is visible to the people following the procedure.

🔑 Strictest wins, and a ticket carrying several checklists is resolved a
checklist at a time by `assertClosureAllowed()` — so one Critical checklist
blocks the close even if three Standard ones would have warned.

```php
function effectiveClosureMode(PDO $conn, string $mode, ?int $tenantId = null): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$mode` | `string` |  |  |
| `$tenantId` | `?int` | `null` | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [api/tickets/ticket_checklists.php](/code/files/api/tickets/ticket_checklists.php.md)

### assertClosureAllowed

*public static* - line 141

Refuse the closure outright where the gate is a block.

🔴 MUST be called BEFORE the status is written. Called after, a blocked
close would throw having already closed the ticket - the caller sees an
error and the database disagrees with it.

Enforced here rather than in the browser so the REST API, bulk actions and
automation obey whichever the operator chose; that is the whole reason the
rule left inbox.js.

Two separate refusals live here, and they answer different questions:
whether this ticket may close with steps outstanding, and whether it may
close with no checklist at all.

```php
function assertClosureAllowed(PDO $conn, int $ticketId, ?int $tenantId = null): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `?int` | `null` | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

### recordClosureOverride

*public static* - line 204

Called by TicketsService when a ticket moves to a closed status.

Records what was skipped rather than refusing it — see the header. Returns
the steps that were outstanding so the caller can tell the analyst what was
skipped; empty array = a clean close, or a close this install does not care
to record.

```php
function recordClosureOverride(
    PDO $conn,
    ActorContext $ctx,
    int $ticketId,
    ?int $tenantId = null
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$tenantId` | `?int` | `null` | A company (tenant) id; null means the Default company. *([standard](/handbook/standard-parameters.md))* |

**Returns:** array<int, array{checklist: string, step: string, item_id: int}>

**Called from:** [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

### closedBy

*private static* - line 250

"Closed by Jane Smith via the web interface." — one phrasing, used by both notes.

```php
function closedBy(ActorContext $ctx): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |

### writeClosureNote

*private static* - line 276

Write one closure-audit entry, wherever it belongs.

🔴 A WORKFLOW MUST NOT WRITE TO ticket_notes. `analyst_id` is NOT NULL
with a foreign key to `analysts`, and a workflow has no analyst behind it.
Naming any id there does one of two bad things: on an install where that
analyst does not exist the insert throws and the audit entry is lost, and
on an install where they do exist it puts a real person's name against an
action they did not take. So an automated close is recorded in
`ticket_audit` with a NULL analyst, which is where the workflow engine's
own notes go and where the timeline already knows to look for them.

Both notes go through here so that reasoning cannot be missed by the next
person adding a third kind of closure note.

UTC at rest (GH #126).

```php
function writeClosureNote(PDO $conn, ActorContext $ctx, int $ticketId, string $note): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$ticketId` | `int` |  | The id of the ticket. *([standard](/handbook/standard-parameters.md))* |
| `$note` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 281 | `ChecklistsService::writeClosureNote` | **insert** [ticket_notes](/code/tables/ticket_notes.md) (`ticket_id`, `analyst_id`, `note_text`, `is_internal`, `created_datetime`) |  |
| 286 | `ChecklistsService::writeClosureNote` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

### lookup

*private static* - line 313

The table and label of a checklist settings list; throws for an unknown list.

```php
function lookup(string $kind): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$kind` | `string` |  |  |

### saveLookup

*public static* - line 329

Create (no id) or rename (id present) a category or role. Returns the id.

Renaming matters more than it looks: templates store their category as
TEXT (`checklist_templates.category`) and steps store their suggested role
the same way, so the rows have to be carried across with the rename or the
list silently orphans every template that used the old name.

```php
function saveLookup(PDO $conn, ActorContext $ctx, string $kind, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$kind` | `string` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 359 | `ChecklistsService::saveLookup` | **update** [checklist_templates](/code/tables/checklist_templates.md) (`category`) |  |
| 361 | `ChecklistsService::saveLookup` | **update** [checklist_template_items](/code/tables/checklist_template_items.md) (`suggested_role`) |  |
| 362 | `ChecklistsService::saveLookup` | **update** [ticket_checklist_items](/code/tables/ticket_checklist_items.md) (`suggested_role`) |  |

**Called from:** [api/checklists/save_lookup.php](/code/files/api/checklists/save_lookup.php.md)

### deleteLookup

*public static* - line 384

Delete a category or role.

The rows that reference it by name are left alone deliberately: a template
filed under a category you retire keeps saying what it said. Losing the
list entry should not silently re-file somebody's SOP.

```php
function deleteLookup(PDO $conn, ActorContext $ctx, string $kind, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$kind` | `string` |  |  |
| `$id` | `int` |  |  |

**Called from:** [api/checklists/delete_lookup.php](/code/files/api/checklists/delete_lookup.php.md)

### tasksEnabled

*public static* - line 426

Is Tasks → Settings → Checklists switched on? Off by default; safe before DB Verification.

```php
function tasksEnabled(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 429 | `ChecklistsService::tasksEnabled` | read [system_settings](/code/tables/system_settings.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md), [checklists/edit/index.php](/code/files/checklists/edit/index.php.md)

### taskTenantId

*public static* - line 438

The task's company for the gate (NULL = the Default company, read as the install default).

```php
function taskTenantId(PDO $conn, int $taskId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 441 | `ChecklistsService::taskTenantId` | read [tasks](/code/tables/tasks.md) |  |

### taskChecklists

*public static* - line 455

The task's checklists with their steps and progress, each carrying the gate it will ACTUALLY apply (template mode + company setting), resolved here so the padlock in the panel is the lock the server enforces.

```php
function taskChecklists(PDO $conn, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 458 | `ChecklistsService::taskChecklists` | read [task_checklists](/code/tables/task_checklists.md) |  |
| 463 | `ChecklistsService::taskChecklists` | read [task_checklist_items](/code/tables/task_checklist_items.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### templatesForTask

*public static* - line 482

Templates offered for a task: scope task or both, active, with the gate each would apply.

```php
function templatesForTask(PDO $conn, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 485 | `ChecklistsService::templatesForTask` | read [checklist_templates](/code/tables/checklist_templates.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### attachTemplateToTask

*public static* - line 502

Attach a template to a task: copy its title, gate and steps. Returns the new id.

The copy is the point, exactly as on a ticket: rewriting a procedure must
not change a task already half-way through it.

```php
function attachTemplateToTask(PDO $conn, ActorContext $ctx, int $taskId, int $templateId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |
| `$templateId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 504 | `ChecklistsService::attachTemplateToTask` | read [checklist_templates](/code/tables/checklist_templates.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### copyTemplateToTask

*private static* - line 518

The one place a task checklist is written: parent, then its steps, in one transaction.

```php
function copyTemplateToTask(
    PDO $conn,
    int $taskId,
    int $templateId,
    string $title,
    string $closureMode,
    ?int $createdBy
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |
| `$templateId` | `int` |  |  |
| `$title` | `string` |  |  |
| `$closureMode` | `string` |  |  |
| `$createdBy` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 524 | `ChecklistsService::copyTemplateToTask` | **insert** [task_checklists](/code/tables/task_checklists.md) (`task_id`, `template_id`, `title`, `closure_mode`, `sort_order`, `created_by_id`, `created_datetime`) |  |
| 530 | `ChecklistsService::copyTemplateToTask` | read [checklist_template_items](/code/tables/checklist_template_items.md) |  |
| 533 | `ChecklistsService::copyTemplateToTask` | **insert** [task_checklist_items](/code/tables/task_checklist_items.md) (`task_checklist_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order`) |  |

### nextTaskChecklistOrder

*private static* - line 550

A newly attached checklist goes below the ones already on the task.

```php
function nextTaskChecklistOrder(PDO $conn, int $taskId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 552 | `ChecklistsService::nextTaskChecklistOrder` | read [task_checklists](/code/tables/task_checklists.md) |  |

### reorderTaskChecklists

*public static* - line 562

Put a task's checklists in a new order. `$ids` is the whole list, top first. Each UPDATE is pinned to the task, so an id from another task matches nothing - the caller gates on `$taskId` and that gate then covers every row.

```php
function reorderTaskChecklists(PDO $conn, int $taskId, array $ids): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |
| `$ids` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 564 | `ChecklistsService::reorderTaskChecklists` | **update** [task_checklists](/code/tables/task_checklists.md) (`sort_order`) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### reorderTaskChecklistItems

*public static* - line 571

The same for the steps inside one checklist, pinned to that checklist.

```php
function reorderTaskChecklistItems(PDO $conn, int $checklistId, array $ids): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$checklistId` | `int` |  |  |
| `$ids` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 573 | `ChecklistsService::reorderTaskChecklistItems` | **update** [task_checklist_items](/code/tables/task_checklist_items.md) (`sort_order`) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### taskIdForItem

*public static* - line 580

Which task does this step / checklist belong to? 0 if neither exists. Callers gate on the task.

```php
function taskIdForItem(PDO $conn, int $itemId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 582 | `ChecklistsService::taskIdForItem` | read [task_checklist_items](/code/tables/task_checklist_items.md), read [task_checklists](/code/tables/task_checklists.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### taskIdForChecklist

*public static* - line 588

The task a checklist is attached to, or 0.

```php
function taskIdForChecklist(PDO $conn, int $checklistId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$checklistId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 590 | `ChecklistsService::taskIdForChecklist` | read [task_checklists](/code/tables/task_checklists.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### toggleTaskItem

*public static* - line 602

Tick or untick a step. A step that asks for a value cannot be ticked without one - enforced here, not only in the panel, because a tick with an empty answer is a record that says something was checked when it was not.

UTC at rest (GH #126). Returns the stored row.

```php
function toggleTaskItem(
    PDO $conn,
    ActorContext $ctx,
    int $itemId,
    bool $completed,
    ?string $value
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |
| `$completed` | `bool` |  |  |
| `$value` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 604 | `ChecklistsService::toggleTaskItem` | read [task_checklist_items](/code/tables/task_checklist_items.md) |  |
| 617 | `ChecklistsService::toggleTaskItem` | **update** [task_checklist_items](/code/tables/task_checklist_items.md) (`is_completed`, `response_value`, `completed_by_id`, `completed_by_name`, `completed_datetime`) |  |
| 624 | `ChecklistsService::toggleTaskItem` | **update** [task_checklist_items](/code/tables/task_checklist_items.md) (`is_completed`, `response_value`, `completed_by_id`, `completed_by_name`, `completed_datetime`) |  |
| 630 | `ChecklistsService::toggleTaskItem` | read [task_checklist_items](/code/tables/task_checklist_items.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### removeTaskChecklist

*public static* - line 637

Remove one checklist from a task: its steps first (no FK to rely on), then it.

```php
function removeTaskChecklist(PDO $conn, int $checklistId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$checklistId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 642 | `ChecklistsService::removeTaskChecklist` | **delete** [task_checklist_items](/code/tables/task_checklist_items.md) |  |
| 643 | `ChecklistsService::removeTaskChecklist` | **delete** [task_checklists](/code/tables/task_checklists.md) |  |

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### deleteForTasks

*public static* - line 658

Remove every checklist from these tasks - for TasksService::deleteTask, which deletes a whole subtask tree. Children explicitly, then parents; tolerant of the tables not existing yet.

```php
function deleteForTasks(PDO $conn, array $taskIds): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 664 | `ChecklistsService::deleteForTasks` | **delete** [task_checklist_items](/code/tables/task_checklist_items.md), read [task_checklists](/code/tables/task_checklists.md) |  |
| 667 | `ChecklistsService::deleteForTasks` | **delete** [task_checklists](/code/tables/task_checklists.md) |  |

**Called from:** [includes/services/tasks.php](/code/files/includes/services/tasks.php.md)

### taskOutstandingMandatorySteps

*public static* - line 674

Mandatory steps still outstanding on a task (same shape as the ticket version).

```php
function taskOutstandingMandatorySteps(PDO $conn, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 679 | `ChecklistsService::taskOutstandingMandatorySteps` | read [task_checklist_items](/code/tables/task_checklist_items.md), read [task_checklists](/code/tables/task_checklists.md) |  |

### taskCompletionCheck

*public static* - line 698

What completing this task now would run into - for the panel and the board to warn BEFORE they post. Read-only; the server still decides.

```php
function taskCompletionCheck(PDO $conn, int $taskId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Returns:** array{blocking: array<string,string[]>, warning: array<string,string[]>}

**Called from:** [api/tasks/checklists.php](/code/files/api/tasks/checklists.php.md)

### assertTaskCompletionAllowed

*public static* - line 717

Refuse completing the task where a Critical checklist has steps outstanding.

🔴 MUST be called BEFORE the status is written - see `assertClosureAllowed()`.
Called from every path that completes a task; a new one must call it too.

```php
function assertTaskCompletionAllowed(PDO $conn, int $taskId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [api/tasks/reorder.php](/code/files/api/tasks/reorder.php.md), [api/tasks/toggle_subtask.php](/code/files/api/tasks/toggle_subtask.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md)

### recordTaskCompletionOverride

*public static* - line 738

Called AFTER a task has moved to a closed status: record any Standard checklist steps it was completed without, on the task's own audit trail.

task_audit, not a comment: its analyst_id is nullable, so a workflow or
an API key with no analyst behind it is recorded honestly as nobody,
instead of being stamped with a colleague's name (the round-two lesson,
see `writeClosureNote()`).

```php
function recordTaskCompletionOverride(PDO $conn, ActorContext $ctx, int $taskId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 746 | `ChecklistsService::recordTaskCompletionOverride` | **insert** [task_audit](/code/tables/task_audit.md) (`task_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |

**Called from:** [api/tasks/reorder.php](/code/files/api/tasks/reorder.php.md), [api/tasks/toggle_subtask.php](/code/files/api/tasks/toggle_subtask.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md)

### copyTaskChecklists

*public static* - line 765

Give a new occurrence of a recurring task fresh, unticked copies of the checklists the finished one had (TaskRecurrence::createOccurrence).

Re-copied from the TEMPLATE where it still exists, so a monthly check
picks up this month's version of the procedure; a checklist whose template
has since been deleted is copied from the finished task's own steps
instead, rather than silently vanishing from the series.

```php
function copyTaskChecklists(PDO $conn, int $fromTaskId, int $toTaskId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$fromTaskId` | `int` |  |  |
| `$toTaskId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 769 | `ChecklistsService::copyTaskChecklists` | read [task_checklists](/code/tables/task_checklists.md), read [checklist_templates](/code/tables/checklist_templates.md) |  |
| 781 | `ChecklistsService::copyTaskChecklists` | **insert** [task_checklists](/code/tables/task_checklists.md) (`task_id`, `template_id`, `title`, `closure_mode`, `sort_order`, `created_by_id`, `created_datetime`) |  |
| 786 | `ChecklistsService::copyTaskChecklists` | **insert** [task_checklist_items](/code/tables/task_checklist_items.md) (`task_checklist_id`, `title`, `suggested_role`, `is_mandatory`, `requires_input`, `input_placeholder`, `sort_order`) |  |

**Called from:** [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md)

