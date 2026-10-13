# ProjectsService

> Class in [includes/services/projects.php](/code/files/includes/services/projects.php.md), line 41

## Methods

| Method | What it does |
|---|---|
| [fieldMap()](#fieldmap) | The fields a person (or an API key) may set, and how each is validated. |
| [saveProject()](#saveproject) | Create (no id) or update (id present). Returns ['id', 'created']. |
| [createProject()](#createproject) | Creates a project for a company and returns its id. |
| [updateProject()](#updateproject) | Changes a project's fields, records each change in its history, refreshes the calendar, fires project.updated and checks health and tolerances. |
| [deleteProject()](#deleteproject) | Delete a project. Its tasks are DETACHED, never deleted; its stages and history go with it. Returns ['id', 'tasks_detached']. |
| [applyMethodology()](#applymethodology) | Relabel the OPEN time boxes to the preset's kind. Closed ones are history and keep the name they were run under. |
| [saveStage()](#savestage) | Create or update a time box. Returns its id. |
| [deleteStage()](#deletestage) | Delete a time box. Its tasks stay in the project, unassigned to any stage. |
| [reorderStages()](#reorderstages) | Put the project's time boxes in the given order (ids not listed keep their place after). |
| [assignTask()](#assigntask) | Put a task in a project (and optionally a stage), or take it out (null). The task and the project must belong to the same company - a project is one company's work, and a task cannot carry another company's plan. |
| [createTaskInProject()](#createtaskinproject) | Create a task straight into a project (and optionally a stage). |
| [loadRow()](#loadrow) | Loads one project; throws not found when it does not exist. |
| [loadForActor()](#loadforactor) | Load a project the caller may touch - out of scope reads as not found. |
| [loadStage()](#loadstage) | Loads one project stage; throws not found when it does not exist. |
| [assertCanChange()](#assertcanchange) | May this caller change this project? Projects -> Settings -> General decides (its team, or everyone with the module); people who manage Projects always may. A system actor (actorId 0 - demo import, scheduled work) is not a person and is not asked. |
| [assertScope()](#assertscope) | Throws not found with `$notFound` when the row's company is outside the actor's companies. |
| [sameTenant()](#sametenant) | True when two company ids are the same company, treating NULL as the Default company. |
| [storeTenant()](#storetenant) | The Default company is stored as NULL, the way every scoped table does. |
| [validateField()](#validatefield) | Validates and cleans one project field according to its type in `fieldMap()`, and returns the value to store. |
| [date()](#date) | Validates an optional YYYY-MM-DD date; blank gives null. |
| [assertDates()](#assertdates) | Throws when the end date is before the start date. |
| [str()](#str) | Trimmed text cut to `$max` characters, or null when blank. |
| [same()](#same) | True when two values are equal as strings; null only equals null. |
| [source()](#source) | The history source for the actor: 'api' or 'app'. |
| [syncCalendar()](#synccalendar) | Keep the shared Calendar in step (includes/projects/calendar.php). Call it AFTER the write, outside any transaction; it never throws. |
| [afterChange()](#afterchange) | After a change to one project: fire what its health and tolerances now say (includes/projects/alerts.php). Runs as the person who made the change, so the bell does not tell them about it. Never throws. |
| [stageClosed()](#stageclosed) | project.stage_closed - by its gate (`$decision`) or by hand (null). |
| [raidEscalated()](#raidescalated) | project.raid_escalated - a RAID entry needs somebody above the project manager (3.3.0). |
| [signoffEvent()](#signoffevent) | project.signoff_requested (3.3.0): somebody is named to sign off an item at a stage gate. |
| [decideProposal()](#decideproposal) | Approve or reject a proposal (3.3.0, includes/projects/intake.php). Approving records who and when and - when project_proposal_on_approve is 'active' - starts the project; rejecting cancels it. Either way it is audited and the proposer is told. Compare-and-set, so two approvers decide it once. |
| [proposalEvent()](#proposalevent) | project.proposal_submitted (to the approvers) / project.proposal_decided (to whoever proposed it, when that was an analyst) - 3.3.0. The payload carries the proposer's email so a workflow can tell somebody who asked on a form and has no bell. |
| [changeEvent()](#changeevent) | project.change_raised / project.change_decided (3.3.0) - a change request was raised, or approved or rejected. includes/projects/control.php. |
| [milestoneReached()](#milestonereached) | project.milestone_reached - somebody marked a milestone done (3.3.0). |
| [eventFor()](#eventfor) | The project as its events carry it, with the health it shows; null if it is gone. |
| [dispatch()](#dispatch) | Fires a project workflow event with the project's details. |
| [touchProject()](#touchproject) | Sets the project's updated time to now, for the other project services. |
| [touch()](#touch) | Sets the project's updated time to now. |
| [audit()](#audit) | Records one change in a project's history; a failure is logged, never thrown. |
| [auditDisplay()](#auditdisplay) | What the history shows for a value: names, not ids; a line, not a paragraph. |

### fieldMap

*public static* - line 44

The fields a person (or an API key) may set, and how each is validated.

```php
function fieldMap(): array
```

**Called from:** [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### saveProject

*public static* - line 76

Create (no id) or update (id present). Returns ['id', 'created'].

```php
function saveProject(PDO $conn, ActorContext $ctx, array $in, ?int $tenantId = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |
| `$tenantId` | `?int` | `null` |  |

**Called from:** [api/projects/save.php](/code/files/api/projects/save.php.md)

### createProject

*public static* - line 91

Creates a project for a company and returns its id.

Fills in the default method, visibility and project manager from Projects -> Settings
and the creator, starts it as proposed when proposals need approval, records it in
the history and fires project.created.

```php
function createProject(PDO $conn, ActorContext $ctx, array $in, ?int $tenantId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 137 | `ProjectsService::createProject` | **insert** [projects](/code/tables/projects.md) |  |

**Called from:** [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/intake.php](/code/files/includes/projects/intake.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md)

### updateProject

*public static* - line 159

Changes a project's fields, records each change in its history, refreshes the calendar, fires project.updated and checks health and tolerances.

Only the team or a project manager may change who can see it; a proposal waiting for
approval cannot be started.

```php
function updateProject(PDO $conn, ActorContext $ctx, int $id, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 207 | `ProjectsService::updateProject` | **update** [projects](/code/tables/projects.md) |  |

**Called from:** [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteProject

*public static* - line 236

Delete a project. Its tasks are DETACHED, never deleted; its stages and history go with it. Returns ['id', 'tasks_detached'].

```php
function deleteProject(PDO $conn, ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 245 | `ProjectsService::deleteProject` | **update** [tasks](/code/tables/tasks.md) (`project_id`, `project_stage_id`) |  |
| 252 | `ProjectsService::deleteProject` | **delete** [project_benefit_measures](/code/tables/project_benefit_measures.md), read [project_benefits](/code/tables/project_benefits.md) |  |
| 254 | `ProjectsService::deleteProject` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md), read [project_raid](/code/tables/project_raid.md) |  |
| 268 | `ProjectsService::deleteProject` | **delete** [project_labour_rates](/code/tables/project_labour_rates.md) |  |
| 272 | `ProjectsService::deleteProject` | **update** [status_planned](/code/tables/status_planned.md) (`project_id`) |  |
| 273 | `ProjectsService::deleteProject` | **delete** [projects](/code/tables/projects.md) |  |

**Called from:** [api/projects/delete.php](/code/files/api/projects/delete.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### applyMethodology

*private static* - line 291

Relabel the OPEN time boxes to the preset's kind. Closed ones are history and keep the name they were run under.

```php
function applyMethodology(PDO $conn, int $projectId, string $method): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$method` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 295 | `ProjectsService::applyMethodology` | **update** [project_stages](/code/tables/project_stages.md) (`kind`, `updated_datetime`) |  |
| 301 | `ProjectsService::applyMethodology` | read [project_stages](/code/tables/project_stages.md) |  |
| 307 | `ProjectsService::applyMethodology` | **update** [project_stages](/code/tables/project_stages.md) (`status`) |  |

### saveStage

*public static* - line 317

Create or update a time box. Returns its id.

```php
function saveStage(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 340 | `ProjectsService::saveStage` | read [project_stages](/code/tables/project_stages.md) |  |
| 348 | `ProjectsService::saveStage` | **update** [project_stages](/code/tables/project_stages.md) (`name`, `goal`, `start_date`, `end_date`, `status`, `updated_datetime`) |  |
| 361 | `ProjectsService::saveStage` | read [project_stages](/code/tables/project_stages.md) |  |
| 362 | `ProjectsService::saveStage` | **insert** [project_stages](/code/tables/project_stages.md) (`project_id`, `kind`, `name`, `goal`, `start_date`, `end_date`, `position`, `status`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/stage_save.php](/code/files/api/projects/stage_save.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteStage

*public static* - line 375

Delete a time box. Its tasks stay in the project, unassigned to any stage.

```php
function deleteStage(PDO $conn, ActorContext $ctx, int $projectId, int $stageId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 382 | `ProjectsService::deleteStage` | **update** [tasks](/code/tables/tasks.md) (`project_stage_id`) |  |
| 384 | `ProjectsService::deleteStage` | **update** [project_milestones](/code/tables/project_milestones.md) (`stage_id`) |  |
| 386 | `ProjectsService::deleteStage` | **delete** [project_gate_items](/code/tables/project_gate_items.md) |  |
| 387 | `ProjectsService::deleteStage` | **delete** [project_stages](/code/tables/project_stages.md) |  |

**Called from:** [api/projects/stage_delete.php](/code/files/api/projects/stage_delete.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### reorderStages

*public static* - line 400

Put the project's time boxes in the given order (ids not listed keep their place after).

```php
function reorderStages(PDO $conn, ActorContext $ctx, int $projectId, array $ids): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$ids` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 403 | `ProjectsService::reorderStages` | **update** [project_stages](/code/tables/project_stages.md) (`position`) |  |

**Called from:** [api/projects/stage_reorder.php](/code/files/api/projects/stage_reorder.php.md)

### assignTask

*public static* - line 420

Put a task in a project (and optionally a stage), or take it out (null). The task and the project must belong to the same company - a project is one company's work, and a task cannot carry another company's plan.

```php
function assignTask(
    PDO $conn,
    ActorContext $ctx,
    int $taskId,
    ?int $projectId,
    ?int $stageId = null
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$taskId` | `int` |  |  |
| `$projectId` | `?int` |  |  |
| `$stageId` | `?int` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 422 | `ProjectsService::assignTask` | read [tasks](/code/tables/tasks.md) |  |
| 438 | `ProjectsService::assignTask` | **update** [tasks](/code/tables/tasks.md) (`project_id`, `project_stage_id`, `updated_datetime`) |  |
| 453 | `ProjectsService::assignTask` | **update** [tasks](/code/tables/tasks.md) (`project_id`, `project_stage_id`, `updated_datetime`) |  |

**Called from:** [api/projects/task_assign.php](/code/files/api/projects/task_assign.php.md)

### createTaskInProject

*public static* - line 466

Create a task straight into a project (and optionally a stage).

🔑 The task is made by TasksService - the ONE create path - so the assigned
email, the bell, workflows and everything else that happens for a new task
happens here too. Only then is it filed under the project, and it takes the
project's company: a project is one company's work.

```php
function createTaskInProject(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    ?int $stageId,
    array $in
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `?int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 492 | `ProjectsService::createTaskInProject` | **update** [tasks](/code/tables/tasks.md) (`tenant_id`, `project_id`, `project_stage_id`) |  |

**Called from:** [api/projects/task_create.php](/code/files/api/projects/task_create.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### loadRow

*public static* - line 504

Loads one project; throws not found when it does not exist.

```php
function loadRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 506 | `ProjectsService::loadRow` | read [projects](/code/tables/projects.md) |  |

**Called from:** [api/projects/assistant_chat.php](/code/files/api/projects/assistant_chat.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md)

### loadForActor

*public static* - line 514

Load a project the caller may touch - out of scope reads as not found.

```php
function loadForActor(PDO $conn, ActorContext $ctx, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Called from:** [api/projects/assistant_chat.php](/code/files/api/projects/assistant_chat.php.md), [api/projects/export.php](/code/files/api/projects/export.php.md), [api/projects/get.php](/code/files/api/projects/get.php.md), [api/projects/reports.php](/code/files/api/projects/reports.php.md), [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### loadStage

*public static* - line 525

Loads one project stage; throws not found when it does not exist.

```php
function loadStage(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 527 | `ProjectsService::loadStage` | read [project_stages](/code/tables/project_stages.md) |  |

### assertCanChange

*public static* - line 540

May this caller change this project? Projects -> Settings -> General decides (its team, or everyone with the module); people who manage Projects always may. A system actor (actorId 0 - demo import, scheduled work) is not a person and is not asked.

```php
function assertCanChange(PDO $conn, ActorContext $ctx, array $project): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$project` | `array` |  |  |

**Called from:** [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### assertScope

*private static* - line 549

Throws not found with `$notFound` when the row's company is outside the actor's companies.

```php
function assertScope(PDO $conn, ActorContext $ctx, array $row, string $notFound): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$row` | `array` |  |  |
| `$notFound` | `string` |  |  |

### sameTenant

*private static* - line 559

True when two company ids are the same company, treating NULL as the Default company.

```php
function sameTenant(PDO $conn, $a, $b): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$a` |  |  |  |
| `$b` |  |  |  |

### storeTenant

*private static* - line 569

The Default company is stored as NULL, the way every scoped table does.

```php
function storeTenant(PDO $conn, ?int $tenantId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `?int` |  |  |

### validateField

*private static* - line 583

Validates and cleans one project field according to its type in `fieldMap()`, and returns the value to store.

```php
function validateField(PDO $conn, string $field, $v, array $def)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$field` | `string` |  |  |
| `$v` |  |  |  |
| `$def` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 622 | `ProjectsService::validateField` | read [analysts](/code/tables/analysts.md) |  |

### date

*private static* - line 631

Validates an optional YYYY-MM-DD date; blank gives null.

```php
function date($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### assertDates

*private static* - line 641

Throws when the end date is before the start date.

```php
function assertDates(?string $start, ?string $end): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$start` | `?string` |  |  |
| `$end` | `?string` |  |  |

### str

*private static* - line 649

Trimmed text cut to `$max` characters, or null when blank.

```php
function str($v, int $max): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

### same

*private static* - line 658

True when two values are equal as strings; null only equals null.

```php
function same($a, $b): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$a` |  |  |  |
| `$b` |  |  |  |

### source

*private static* - line 665

The history source for the actor: 'api' or 'app'.

```php
function source(ActorContext $ctx): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ctx` | `ActorContext` |  |  |

### syncCalendar

*public static* - line 674

Keep the shared Calendar in step (includes/projects/calendar.php). Call it AFTER the write, outside any transaction; it never throws.

```php
function syncCalendar(PDO $conn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Called from:** [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### afterChange

*public static* - line 689

After a change to one project: fire what its health and tolerances now say (includes/projects/alerts.php). Runs as the person who made the change, so the bell does not tell them about it. Never throws.

```php
function afterChange(PDO $conn, int $projectId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### stageClosed

*public static* - line 700

project.stage_closed - by its gate (`$decision`) or by hand (null).

```php
function stageClosed(
    PDO $conn,
    int $projectId,
    int $stageId,
    ?string $decision,
    ?string $next
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `int` |  |  |
| `$decision` | `?string` |  |  |
| `$next` | `?string` |  |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### raidEscalated

*public static* - line 724

project.raid_escalated - a RAID entry needs somebody above the project manager (3.3.0).

```php
function raidEscalated(PDO $conn, int $projectId, array $r): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$r` | `array` |  |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### signoffEvent

*public static* - line 742

project.signoff_requested (3.3.0): somebody is named to sign off an item at a stage gate.

```php
function signoffEvent(PDO $conn, int $projectId, int $itemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 747 | `ProjectsService::signoffEvent` | read [project_gate_items](/code/tables/project_gate_items.md), read [project_stages](/code/tables/project_stages.md) |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### decideProposal

*public static* - line 769

Approve or reject a proposal (3.3.0, includes/projects/intake.php). Approving records who and when and - when project_proposal_on_approve is 'active' - starts the project; rejecting cancels it. Either way it is audited and the proposer is told. Compare-and-set, so two approvers decide it once.

```php
function decideProposal(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    string $decision,
    $notes
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$decision` | `string` |  |  |
| `$notes` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 780 | `ProjectsService::decideProposal` | **update** [projects](/code/tables/projects.md) (`approval_status`, `approval_by_id`, `approval_datetime`, `approval_notes`, `status`, `closed_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### proposalEvent

*public static* - line 800

project.proposal_submitted (to the approvers) / project.proposal_decided (to whoever proposed it, when that was an analyst) - 3.3.0. The payload carries the proposer's email so a workflow can tell somebody who asked on a form and has no bell.

```php
function proposalEvent(PDO $conn, int $projectId, string $event): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$event` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 807 | `ProjectsService::proposalEvent` | read [projects](/code/tables/projects.md) |  |

**Called from:** [includes/projects/intake.php](/code/files/includes/projects/intake.php.md)

### changeEvent

*public static* - line 839

project.change_raised / project.change_decided (3.3.0) - a change request was raised, or approved or rejected. includes/projects/control.php.

```php
function changeEvent(PDO $conn, int $projectId, string $event, array $cr): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$event` | `string` |  |  |
| `$cr` | `array` |  |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### milestoneReached

*public static* - line 861

project.milestone_reached - somebody marked a milestone done (3.3.0).

```php
function milestoneReached(PDO $conn, int $projectId, array $m): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$m` | `array` |  |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### eventFor

*private static* - line 879

The project as its events carry it, with the health it shows; null if it is gone.

```php
function eventFor(PDO $conn, int $id): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

### dispatch

*private static* - line 892

Fires a project workflow event with the project's details.

```php
function dispatch(PDO $conn, string $event, int $id, array $extra = []): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$event` | `string` |  |  |
| `$id` | `int` |  |  |
| `$extra` | `array` | `[]` |  |

### touchProject

*public static* - line 899

Sets the project's updated time to now, for the other project services.

```php
function touchProject(PDO $conn, int $projectId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Called from:** [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### touch

*private static* - line 905

Sets the project's updated time to now.

```php
function touch(PDO $conn, int $projectId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 907 | `ProjectsService::touch` | **update** [projects](/code/tables/projects.md) (`updated_datetime`) |  |

### audit

*public static* - line 915

Records one change in a project's history; a failure is logged, never thrown.

```php
function audit(
    PDO $conn,
    int $projectId,
    ?int $analystId,
    string $field,
    $old,
    $new,
    string $source = 'app'
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$analystId` | `?int` |  |  |
| `$field` | `string` |  |  |
| `$old` |  |  |  |
| `$new` |  |  |  |
| `$source` | `string` | `'app'` |  |

**Writes:** project_audit - the project's history

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 918 | `ProjectsService::audit` | **insert** [project_audit](/code/tables/project_audit.md) (`project_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `source`, `created_datetime`) |  |

**Called from:** [includes/projects/control.php](/code/files/includes/projects/control.php.md), [includes/projects/links.php](/code/files/includes/projects/links.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md), [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md)

### auditDisplay

*private static* - line 929

What the history shows for a value: names, not ids; a line, not a paragraph.

```php
function auditDisplay(PDO $conn, string $field, $v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$field` | `string` |  |  |
| `$v` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 933 | `ProjectsService::auditDisplay` | read [analysts](/code/tables/analysts.md) |  |

