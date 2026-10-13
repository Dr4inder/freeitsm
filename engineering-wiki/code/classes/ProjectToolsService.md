# ProjectToolsService

> Class in [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), line 20

## Methods

| Method | What it does |
|---|---|
| [addMember()](#addmember) | Add a member: exactly one of analyst_id / team_id / user_id / supplier_id (+ contact_id). Returns its id. |
| [addContractorMember()](#addcontractormember) | A contractor on the team (3.3.0): a supplier, or one person there (which brings its supplier). Suppliers live in Contracts, so adding one needs it. |
| [contractorMemberSql()](#contractormembersql) | The member columns for a contractor (3.3.0), or NULLs before Database Verification. |
| [updateMember()](#updatemember) |  |
| [stakeReady()](#stakeready) | Has Database Verification added the stakeholder columns (3.3.0)? |
| [stakeColumns()](#stakecolumns) |  |
| [removeMember()](#removemember) | Remove a member. Their RACI letters go with them (FK cascade, and by hand). |
| [saveItem()](#saveitem) |  |
| [deleteItem()](#deleteitem) |  |
| [moveItem()](#moveitem) | Move an item to a MoSCoW column, in the given order within it (the drag on the board). |
| [setRaci()](#setraci) | Set one cell: R, A, C, I or '' to clear. Returns the row's letters after the change ({member_id: letter}), so the screen can redraw a demoted A. |
| [saveRaid()](#saveraid) | Create or update a RAID entry. Probability is for risks only and impact for risks and issues (both 1-5); a risk's score is probability x impact (1-25), which is what the heat map and the risk tolerance read. |
| [deleteRaid()](#deleteraid) |  |
| [raidLogReady()](#raidlogready) | Has Database Verification added the 3.3.0 RAID columns (escalation, decision log)? |
| [escalateRaid()](#escalateraid) | Escalate an open entry (3.3.0): it needs somebody above the project manager - a sponsor, the board - to act. Stamped with who and when and a note saying what is needed; shown on the Overview until it is de-escalated or the entry is closed; fires project.raid_escalated, so the project manager's bell rings (unless they escalated it) and a workflow can email the sponsor. Escalating again replaces the note and fires again. |
| [deescalateRaid()](#deescalateraid) |  |
| [addRaidAction()](#addraidaction) | A follow-up action on a RAID entry (3.3.0): a NEW project task, made by `createTaskInProject()` (TasksService - so the assigned email, the bell and task events happen as for any task), then joined to the entry. It is put in no stage - where it sits in the plan is the Plan's job. Returns the task id. |
| [removeRaidAction()](#removeraidaction) | Unlink an action. The task itself stays - it is somebody's work. |
| [raidActionsReady()](#raidactionsready) |  |
| [lessonToKnowledge()](#lessontoknowledge) | A lesson becomes a Knowledge article, in one click (3.2.0). |
| [issueToTicket()](#issuetoticket) | Raise a NEW ticket from an issue (3.2.0) - before, an issue could only be linked to a ticket that already existed. |
| [raidRow()](#raidrow) | One RAID entry of this project, or not found. |
| [linkQuietly()](#linkquietly) | Link the new record on the Connections tab too. The record is already made and remembered on the entry, so a link that cannot be added (the tables not verified yet) must not undo it. |
| [saveTolerances()](#savetolerances) | The project's tolerances - how far it may drift before it is an exception (PRINCE2's "manage by exception", in our own words). time = days past the target finish (or the active stage's end) with work still open; risk = the highest open risk score allowed (1-25). null removes one. |
| [tolerances()](#tolerances) | {time: int\|null, risk: int\|null} |
| [decideGate()](#decidegate) | Record the gate at the end of a stage. Go (or go with conditions) closes the stage and starts the next planned one, so the decision IS the hand-over; Stop records the decision and leaves the plan alone - what to do next is the board's call, not the software's. |
| [raid()](#raid) |  |
| [saveTarget()](#savetarget) | Add or change an asset target. Needs the project to be changeable AND Assets access: the rule names asset types, statuses and models, and the dialog's live count would otherwise tell somebody without Assets what is in the estate. Returns its id. |
| [deleteTarget()](#deletetarget) |  |
| [assertAssets()](#assertassets) | Assets access, for anything that reads the estate through a target. |
| [target()](#target) |  |
| [date()](#date) |  |
| [saveMilestone()](#savemilestone) | Add or change a milestone: {id?, name, due_date, stage_id?, notes?, done?, done_date?}. Any field left out keeps its value, so the Timeline can move just the date. done = true stamps today (or done_date) and who; done = false clears both. Reaching one fires project.milestone_reached. Returns its id. |
| [deleteMilestone()](#deletemilestone) |  |
| [milestone()](#milestone) |  |
| [setTaskDates()](#settaskdates) | Move a project task's dates from the Timeline: {start_date?, due_date?}. |
| [setTaskEstimate()](#settaskestimate) | Set a project task's estimate from the Plan (3.3.0): {estimate_hours} (empty = not estimated). Through TasksService, like `setTaskDates()` - the task window and the REST API write the same column the same way. |
| [members()](#members) | Members with display names, roles and kinds, in order. |
| [items()](#items) |  |
| [raci()](#raci) | {item_id: {member_id: letter}} |
| [addTaskDependency()](#addtaskdependency) | `$taskId` waits for `$dependsOnId` to finish (+ lag days). Both in this project; no loops. Returns its id. |
| [removeTaskDependency()](#removetaskdependency) |  |
| [saveGateItem()](#savegateitem) | Add (no id) or change a gate item. Returns its id. |
| [deleteGateItem()](#deletegateitem) |  |
| [tickGateItem()](#tickgateitem) | Tick or untick an item. A check: anybody who may change the project. A sign-off: ONLY its named analyst. A document: choose one of the project's documents (document_id; empty unticks). A change cannot be ticked - it is done when the change is approved. |
| [setGateKind()](#setgatekind) | standard \| golive. Making a gate go-live adds the starter items it does not already have. |
| [gateItem()](#gateitem) |  |
| [saveBenefit()](#savebenefit) | Create (no id) or update a benefit. Returns its id. |
| [deleteBenefit()](#deletebenefit) |  |
| [addBenefitMeasure()](#addbenefitmeasure) | Record a measurement. One on or after (review date - 14 days) is the review: the next one moves on by the benefit's review_months (none when 0). Returns the measurement's id. |
| [deleteBenefitMeasure()](#deletebenefitmeasure) |  |
| [benefit()](#benefit) |  |
| [takeBaseline()](#takebaseline) | Take a baseline of the plan as it is now, by hand. Returns its id. |
| [saveChangeRequest()](#savechangerequest) | Raise a change request (no id), or edit one still waiting for a decision - by whoever raised it, or anybody who may change the project. Returns its id. |
| [decideChangeRequest()](#decidechangerequest) | Approve or reject a change request. Approving takes a new baseline - the changed plan becomes the agreed one - and, when project_change_apply is "plan", first moves the target finish by the days and adds the cost as a budget line, recording both in `applied`. Rejecting changes nothing. |
| [withdrawChangeRequest()](#withdrawchangerequest) | Withdraw a request still waiting for a decision: whoever raised it, or the project's team. |
| [changeRequest()](#changerequest) |  |
| [changeable()](#changeable) |  |
| [member()](#member) |  |
| [item()](#item) |  |
| [moscow()](#moscow) |  |
| [stageOf()](#stageof) |  |
| [roleId()](#roleid) |  |
| [roleName()](#rolename) |  |
| [memberName()](#membername) |  |
| [mustExist()](#mustexist) |  |
| [str()](#str) |  |
| [src()](#src) |  |
| [saveBudgetLine()](#savebudgetline) | Create (no id) or update a budget line. Returns its id. |
| [budgetLineWhen()](#budgetlinewhen) | The 3.3.0 columns, on their own: before Database Verification adds them the rest of the line still saves. |
| [deleteBudgetLine()](#deletebudgetline) |  |
| [addProjectRate()](#addprojectrate) | The project's own hourly rate from a date (labour mode "rate"), in the project's currency. Each rate is a new row: the old one still prices the time logged before the new one's date. |
| [deleteProjectRate()](#deleteprojectrate) | Remove one of the project's own rates (entered by mistake). |
| [setCurrency()](#setcurrency) | Change the project's currency - a RELABEL: amounts are not converted, and the page says so before anyone presses Save. Only when Projects -> Settings -> Budget lets projects choose. |
| [announce()](#announce) | Announce planned disruption from a project - "Move day: phones down Saturday". How depends on Projects -> Settings -> General: planned planned maintenance: upcoming until its start, then an incident now the same, starting now - an incident straight away off refused (the button is not shown) Needs Service Status as well as being allowed to change the project. Service Status is install-wide, like contracts: no company check on the services. Returns the planned maintenance id. |
| [withdrawAnnouncement()](#withdrawannouncement) | Withdraw an announcement that has not started. It must belong to this project. |
| [announcements()](#announcements) | What the Connections tab needs: the mode, this project's announcements, and the services and impact levels for the dialog. null when the analyst cannot open Service Status - then the panel is not drawn at all. |

### addMember

*public static* - line 31

Add a member: exactly one of analyst_id / team_id / user_id / supplier_id (+ contact_id). Returns its id.

```php
function addMember(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 39 | `ProjectToolsService::addMember` | read [analysts](/code/tables/analysts.md) |  |
| 40 | `ProjectToolsService::addMember` | read [teams](/code/tables/teams.md) |  |
| 44 | `ProjectToolsService::addMember` | read [users](/code/tables/users.md) |  |
| 56 | `ProjectToolsService::addMember` | read [project_members](/code/tables/project_members.md) |  |
| 60 | `ProjectToolsService::addMember` | read [project_members](/code/tables/project_members.md) |  |
| 61 | `ProjectToolsService::addMember` | **insert** [project_members](/code/tables/project_members.md) (`project_id`, `$col`, `role_id`, `notes`, `position`, `created_by_analyst_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### addContractorMember

*private static* - line 73

A contractor on the team (3.3.0): a supplier, or one person there (which brings its supplier). Suppliers live in Contracts, so adding one needs it.

```php
function addContractorMember(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 77 | `ProjectToolsService::addContractorMember` | read [project_members](/code/tables/project_members.md) |  |
| 85 | `ProjectToolsService::addContractorMember` | read [project_members](/code/tables/project_members.md) |  |
| 89 | `ProjectToolsService::addContractorMember` | read [project_members](/code/tables/project_members.md) |  |
| 90 | `ProjectToolsService::addContractorMember` | **insert** [project_members](/code/tables/project_members.md) (`project_id`, `supplier_id`, `contact_id`, `role_id`, `notes`, `position`, `created_by_analyst_id`, `created_datetime`) |  |

### contractorMemberSql

*private static* - line 99

The member columns for a contractor (3.3.0), or NULLs before Database Verification.

```php
function contractorMemberSql(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 103 | `ProjectToolsService::contractorMemberSql` | read [project_members](/code/tables/project_members.md) |  |
| 103 | `ProjectToolsService::contractorMemberSql` | read [suppliers](/code/tables/suppliers.md) |  |
| 110 | `ProjectToolsService::contractorMemberSql` | read [suppliers](/code/tables/suppliers.md), read [contacts](/code/tables/contacts.md) |  |

### updateMember

*public static* - line 114

```php
function updateMember(PDO $conn, ActorContext $ctx, int $projectId, int $memberId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$memberId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 139 | `ProjectToolsService::updateMember` | **update** [project_members](/code/tables/project_members.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### stakeReady

*public static* - line 149

Has Database Verification added the stakeholder columns (3.3.0)?

```php
function stakeReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 153 | `ProjectToolsService::stakeReady` | read [project_members](/code/tables/project_members.md) |  |

**Called from:** [api/projects/lookups.php](/code/files/api/projects/lookups.php.md)

### stakeColumns

*private static* - line 159

```php
function stakeColumns(PDO $conn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

### removeMember

*public static* - line 165

Remove a member. Their RACI letters go with them (FK cascade, and by hand).

```php
function removeMember(PDO $conn, ActorContext $ctx, int $projectId, int $memberId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$memberId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 170 | `ProjectToolsService::removeMember` | **delete** [project_raci](/code/tables/project_raci.md) |  |
| 171 | `ProjectToolsService::removeMember` | **delete** [project_members](/code/tables/project_members.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveItem

*public static* - line 179

```php
function saveItem(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 194 | `ProjectToolsService::saveItem` | **update** [project_items](/code/tables/project_items.md) (`title`, `description`, `acceptance_criteria`, `moscow`, `stage_id`, `status`, `updated_datetime`) |  |
| 201 | `ProjectToolsService::saveItem` | read [project_items](/code/tables/project_items.md) |  |
| 202 | `ProjectToolsService::saveItem` | **insert** [project_items](/code/tables/project_items.md) (`project_id`, `title`, `description`, `acceptance_criteria`, `moscow`, `stage_id`, `status`, `position`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteItem

*public static* - line 210

```php
function deleteItem(PDO $conn, ActorContext $ctx, int $projectId, int $itemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 214 | `ProjectToolsService::deleteItem` | **delete** [project_raci](/code/tables/project_raci.md) |  |
| 215 | `ProjectToolsService::deleteItem` | **update** [project_items](/code/tables/project_items.md) (`parent_id`) |  |
| 216 | `ProjectToolsService::deleteItem` | **delete** [project_items](/code/tables/project_items.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### moveItem

*public static* - line 221

Move an item to a MoSCoW column, in the given order within it (the drag on the board).

```php
function moveItem(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $itemId,
    $moscow,
    array $orderedIds
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |
| `$moscow` |  |  |  |
| `$orderedIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 226 | `ProjectToolsService::moveItem` | **update** [project_items](/code/tables/project_items.md) (`moscow`, `updated_datetime`) |  |
| 227 | `ProjectToolsService::moveItem` | **update** [project_items](/code/tables/project_items.md) (`position`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### setRaci

*public static* - line 243

Set one cell: R, A, C, I or '' to clear. Returns the row's letters after the change ({member_id: letter}), so the screen can redraw a demoted A.

```php
function setRaci(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $itemId,
    int $memberId,
    string $letter
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |
| `$memberId` | `int` |  |  |
| `$letter` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 251 | `ProjectToolsService::setRaci` | **delete** [project_raci](/code/tables/project_raci.md) |  |
| 255 | `ProjectToolsService::setRaci` | **update** [project_raci](/code/tables/project_raci.md) (`letter`) |  |
| 257 | `ProjectToolsService::setRaci` | **insert** [project_raci](/code/tables/project_raci.md) (`project_id`, `item_id`, `member_id`, `letter`) |  |
| 261 | `ProjectToolsService::setRaci` | read [project_raci](/code/tables/project_raci.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveRaid

*public static* - line 290

Create or update a RAID entry. Probability is for risks only and impact for risks and issues (both 1-5); a risk's score is probability x impact (1-25), which is what the heat map and the risk tolerance read.

Decisions (3.3.0) also carry the DECISION LOG: decided_by (a name - the
person deciding is often a sponsor with no analyst account), decided_date
and rationale. Closing a decision means it was made, so a decision closed
with no date is stamped today. A decision still open past its due date,
like a dependency not arrived by its due date, turns health amber
(projectAutoHealth).

```php
function saveRaid(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 296 | `ProjectToolsService::saveRaid` | read [project_raid](/code/tables/project_raid.md) |  |
| 314 | `ProjectToolsService::saveRaid` | read [analysts](/code/tables/analysts.md) |  |
| 343 | `ProjectToolsService::saveRaid` | **update** [project_raid](/code/tables/project_raid.md) (`type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `owner_analyst_id`, `status`, `due_date`, `ticket_id`, `updated_datetime`) |  |
| 354 | `ProjectToolsService::saveRaid` | **insert** [project_raid](/code/tables/project_raid.md) (`type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `owner_analyst_id`, `status`, `due_date`, `ticket_id`, `project_id`) |  |
| 359 | `ProjectToolsService::saveRaid` | **update** [project_raid](/code/tables/project_raid.md) (`decided_by`, `decided_date`, `rationale`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteRaid

*public static* - line 366

```php
function deleteRaid(PDO $conn, ActorContext $ctx, int $projectId, int $raidId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 369 | `ProjectToolsService::deleteRaid` | read [project_raid](/code/tables/project_raid.md) |  |
| 374 | `ProjectToolsService::deleteRaid` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md) |  |
| 375 | `ProjectToolsService::deleteRaid` | **delete** [project_raid](/code/tables/project_raid.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### raidLogReady

*public static* - line 381

Has Database Verification added the 3.3.0 RAID columns (escalation, decision log)?

```php
function raidLogReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 385 | `ProjectToolsService::raidLogReady` | read [project_raid](/code/tables/project_raid.md) |  |

### escalateRaid

*public static* - line 399

Escalate an open entry (3.3.0): it needs somebody above the project manager - a sponsor, the board - to act. Stamped with who and when and a note saying what is needed; shown on the Overview until it is de-escalated or the entry is closed; fires project.raid_escalated, so the project manager's bell rings (unless they escalated it) and a workflow can email the sponsor. Escalating again replaces the note and fires again.

```php
function escalateRaid(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $raidId,
    ?string $note
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |
| `$note` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 407 | `ProjectToolsService::escalateRaid` | **update** [project_raid](/code/tables/project_raid.md) (`escalated_datetime`, `escalated_by_id`, `escalation_note`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deescalateRaid

*public static* - line 414

```php
function deescalateRaid(PDO $conn, ActorContext $ctx, int $projectId, int $raidId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 420 | `ProjectToolsService::deescalateRaid` | **update** [project_raid](/code/tables/project_raid.md) (`escalated_datetime`, `escalated_by_id`, `escalation_note`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### addRaidAction

*public static* - line 431

A follow-up action on a RAID entry (3.3.0): a NEW project task, made by `createTaskInProject()` (TasksService - so the assigned email, the bell and task events happen as for any task), then joined to the entry. It is put in no stage - where it sits in the plan is the Plan's job. Returns the task id.

```php
function addRaidAction(PDO $conn, ActorContext $ctx, int $projectId, int $raidId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 444 | `ProjectToolsService::addRaidAction` | **insert** [project_raid_tasks](/code/tables/project_raid_tasks.md) (`raid_id`, `task_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### removeRaidAction

*public static* - line 450

Unlink an action. The task itself stays - it is somebody's work.

```php
function removeRaidAction(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $raidId,
    int $taskId
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |
| `$taskId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 455 | `ProjectToolsService::removeRaidAction` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### raidActionsReady

*public static* - line 458

```php
function raidActionsReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 462 | `ProjectToolsService::raidActionsReady` | read [project_raid_tasks](/code/tables/project_raid_tasks.md) |  |

### lessonToKnowledge

*public static* - line 479

A lesson becomes a Knowledge article, in one click (3.2.0).

Saved as a DRAFT through KnowledgeService, like the Knowledge assistant's
write-ups: somebody reads it before anyone else can, and it gets the same
validation, search entry and history as any article. It belongs to the
project's company (an MSP's lesson is that client's until somebody shares
it), is linked on the project's Connections tab, and remembered on the
lesson so it is made once. Needs Knowledge as well as being allowed to
change the project. Returns ['id', 'url'].

```php
function lessonToKnowledge(PDO $conn, ActorContext $ctx, int $projectId, int $raidId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 508 | `ProjectToolsService::lessonToKnowledge` | **update** [project_raid](/code/tables/project_raid.md) (`knowledge_article_id`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### issueToTicket

*public static* - line 527

Raise a NEW ticket from an issue (3.2.0) - before, an issue could only be linked to a ticket that already existed.

Through TicketsService::createTicket(), so it numbers, routes, notifies and
fires ticket.created like any ticket. It is filed in the project's company,
raised by (requester) the analyst pressing the button - it is the IT team's
own work - and assigned to the issue's owner, else to them, as a ticket
made by hand is. The issue then points at it, and the project is linked to
it, so it shows on the ticket and on the Connections tab. Needs Tickets.
Returns ['id', 'number', 'url'].

```php
function issueToTicket(PDO $conn, ActorContext $ctx, int $projectId, int $raidId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 536 | `ProjectToolsService::issueToTicket` | read [analysts](/code/tables/analysts.md) |  |
| 561 | `ProjectToolsService::issueToTicket` | **update** [project_raid](/code/tables/project_raid.md) (`ticket_id`, `updated_datetime`) |  |
| 563 | `ProjectToolsService::issueToTicket` | read [tickets](/code/tables/tickets.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### raidRow

*private static* - line 572

One RAID entry of this project, or not found.

```php
function raidRow(PDO $conn, int $projectId, int $raidId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 574 | `ProjectToolsService::raidRow` | read [project_raid](/code/tables/project_raid.md) |  |

### linkQuietly

*private static* - line 586

Link the new record on the Connections tab too. The record is already made and remembered on the entry, so a link that cannot be added (the tables not verified yet) must not undo it.

```php
function linkQuietly(PDO $conn, ActorContext $ctx, int $projectId, string $kind, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$kind` | `string` |  |  |
| `$id` | `int` |  |  |

### saveTolerances

*public static* - line 608

The project's tolerances - how far it may drift before it is an exception (PRINCE2's "manage by exception", in our own words). time = days past the target finish (or the active stage's end) with work still open; risk = the highest open risk score allowed (1-25). null removes one.

```php
function saveTolerances(PDO $conn, ActorContext $ctx, int $projectId, array $in): void
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
| 616 | `ProjectToolsService::saveTolerances` | **delete** [project_tolerances](/code/tables/project_tolerances.md) |  |
| 622 | `ProjectToolsService::saveTolerances` | read [project_tolerances](/code/tables/project_tolerances.md) |  |
| 625 | `ProjectToolsService::saveTolerances` | **update** [project_tolerances](/code/tables/project_tolerances.md) (`value`) |  |
| 627 | `ProjectToolsService::saveTolerances` | **insert** [project_tolerances](/code/tables/project_tolerances.md) (`project_id`, `stage_id`, `dimension`, `value`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### tolerances

*public static* - line 636

{time: int|null, risk: int|null}

```php
function tolerances(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 640 | `ProjectToolsService::tolerances` | read [project_tolerances](/code/tables/project_tolerances.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/projects/templates.php](/code/files/includes/projects/templates.php.md)

### decideGate

*public static* - line 655

Record the gate at the end of a stage. Go (or go with conditions) closes the stage and starts the next planned one, so the decision IS the hand-over; Stop records the decision and leaves the plan alone - what to do next is the board's call, not the software's.

```php
function decideGate(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $stageId,
    string $decision,
    ?string $notes
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `int` |  |  |
| `$decision` | `string` |  |  |
| `$notes` | `?string` |  |  |

**Returns:** array{closed:bool, next:?string}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 659 | `ProjectToolsService::decideGate` | read [project_stages](/code/tables/project_stages.md) |  |
| 682 | `ProjectToolsService::decideGate` | **update** [project_stages](/code/tables/project_stages.md) (`gate_decision`, `gate_notes`, `gate_decided_by`, `gate_decided_datetime`, `updated_datetime`) |  |
| 689 | `ProjectToolsService::decideGate` | **update** [project_stages](/code/tables/project_stages.md) (`status`) |  |
| 691 | `ProjectToolsService::decideGate` | read [project_stages](/code/tables/project_stages.md) |  |
| 694 | `ProjectToolsService::decideGate` | **update** [project_stages](/code/tables/project_stages.md) (`status`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### raid

*public static* - line 717

```php
function raid(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 723 | `ProjectToolsService::raid` | read [project_raid](/code/tables/project_raid.md), read [analysts](/code/tables/analysts.md) |  |
| 726 | `ProjectToolsService::raid` | read [analysts](/code/tables/analysts.md) |  |
| 726 | `ProjectToolsService::raid` | read [tickets](/code/tables/tickets.md) |  |
| 739 | `ProjectToolsService::raid` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 745 | `ProjectToolsService::raid` | read [project_raid_tasks](/code/tables/project_raid_tasks.md), read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/projects/export.php](/code/files/api/projects/export.php.md), [api/projects/get.php](/code/files/api/projects/get.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md)

### saveTarget

*public static* - line 779

Add or change an asset target. Needs the project to be changeable AND Assets access: the rule names asset types, statuses and models, and the dialog's live count would otherwise tell somebody without Assets what is in the estate. Returns its id.

```php
function saveTarget(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 793 | `ProjectToolsService::saveTarget` | **update** [project_asset_targets](/code/tables/project_asset_targets.md) (`name`, `scope`, `scope_type_id`, `scope_field`, `scope_value`, `done_field`, `done_op`, `done_value`, `target_date`, `updated_datetime`) |  |
| 797 | `ProjectToolsService::saveTarget` | **delete** [project_asset_target_snapshots](/code/tables/project_asset_target_snapshots.md) |  |
| 799 | `ProjectToolsService::saveTarget` | read [project_asset_targets](/code/tables/project_asset_targets.md) |  |
| 801 | `ProjectToolsService::saveTarget` | **insert** [project_asset_targets](/code/tables/project_asset_targets.md) (`project_id`, `name`, `scope`, `scope_type_id`, `scope_field`, `scope_value`, `done_field`, `done_op`, `done_value`, `target_date`, `position`, `created_by_analyst_id`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteTarget

*public static* - line 812

```php
function deleteTarget(PDO $conn, ActorContext $ctx, int $projectId, int $targetId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$targetId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 816 | `ProjectToolsService::deleteTarget` | **delete** [project_asset_targets](/code/tables/project_asset_targets.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### assertAssets

*public static* - line 823

Assets access, for anything that reads the estate through a target.

```php
function assertAssets(PDO $conn, ActorContext $ctx): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### target

*public static* - line 830

```php
function target(PDO $conn, int $projectId, int $targetId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$targetId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 832 | `ProjectToolsService::target` | read [project_asset_targets](/code/tables/project_asset_targets.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### date

*private static* - line 840

```php
function date($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### saveMilestone

*public static* - line 860

Add or change a milestone: {id?, name, due_date, stage_id?, notes?, done?, done_date?}. Any field left out keeps its value, so the Timeline can move just the date. done = true stamps today (or done_date) and who; done = false clears both. Reaching one fires project.milestone_reached. Returns its id.

```php
function saveMilestone(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 889 | `ProjectToolsService::saveMilestone` | **update** [project_milestones](/code/tables/project_milestones.md) (`name`, `due_date`, `stage_id`, `notes`, `done_date`, `done_by_analyst_id`, `updated_datetime`) |  |
| 895 | `ProjectToolsService::saveMilestone` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 897 | `ProjectToolsService::saveMilestone` | **insert** [project_milestones](/code/tables/project_milestones.md) (`project_id`, `stage_id`, `name`, `due_date`, `done_date`, `done_by_analyst_id`, `notes`, `position`, `created_by_analyst_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteMilestone

*public static* - line 912

```php
function deleteMilestone(PDO $conn, ActorContext $ctx, int $projectId, int $milestoneId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$milestoneId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 917 | `ProjectToolsService::deleteMilestone` | **delete** [project_milestones](/code/tables/project_milestones.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### milestone

*private static* - line 924

```php
function milestone(PDO $conn, int $projectId, int $milestoneId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$milestoneId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 927 | `ProjectToolsService::milestone` | read [project_milestones](/code/tables/project_milestones.md) |  |

### setTaskDates

*public static* - line 943

Move a project task's dates from the Timeline: {start_date?, due_date?}.

🔑 Through TasksService - the one task write path - so the task's own
history, events and calendar sync happen as if it were moved on the Tasks
board. The Projects side only checks that the task IS in this project and
that the caller may change the project; Tasks access is not required, the
same as adding a task from the Plan.

```php
function setTaskDates(PDO $conn, ActorContext $ctx, int $projectId, int $taskId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$taskId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 946 | `ProjectToolsService::setTaskDates` | read [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### setTaskEstimate

*public static* - line 965

Set a project task's estimate from the Plan (3.3.0): {estimate_hours} (empty = not estimated). Through TasksService, like `setTaskDates()` - the task window and the REST API write the same column the same way.

```php
function setTaskEstimate(PDO $conn, ActorContext $ctx, int $projectId, int $taskId, $hours): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$taskId` | `int` |  |  |
| `$hours` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 968 | `ProjectToolsService::setTaskEstimate` | read [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### members

*public static* - line 981

Members with display names, roles and kinds, in order.

```php
function members(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 990 | `ProjectToolsService::members` | read [project_members](/code/tables/project_members.md), read [project_roles](/code/tables/project_roles.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md), read [users](/code/tables/users.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md)

### items

*public static* - line 1004

```php
function items(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1007 | `ProjectToolsService::items` | read [project_items](/code/tables/project_items.md), read [project_stages](/code/tables/project_stages.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md)

### raci

*public static* - line 1017

{item_id: {member_id: letter}}

```php
function raci(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1021 | `ProjectToolsService::raci` | read [project_raci](/code/tables/project_raci.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md)

### addTaskDependency

*public static* - line 1033

`$taskId` waits for `$dependsOnId` to finish (+ lag days). Both in this project; no loops. Returns its id.

```php
function addTaskDependency(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $taskId,
    int $dependsOnId,
    $lag
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$taskId` | `int` |  |  |
| `$dependsOnId` | `int` |  |  |
| `$lag` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1040 | `ProjectToolsService::addTaskDependency` | read [tasks](/code/tables/tasks.md) |  |
| 1049 | `ProjectToolsService::addTaskDependency` | **insert** [task_dependencies](/code/tables/task_dependencies.md) (`task_id`, `depends_on_id`, `lag_days`, `created_by_id`, `created_datetime`) |  |
| 1052 | `ProjectToolsService::addTaskDependency` | read [task_dependencies](/code/tables/task_dependencies.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### removeTaskDependency

*public static* - line 1059

```php
function removeTaskDependency(PDO $conn, ActorContext $ctx, int $projectId, int $depId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$depId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1065 | `ProjectToolsService::removeTaskDependency` | **delete** [task_dependencies](/code/tables/task_dependencies.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveGateItem

*public static* - line 1075

Add (no id) or change a gate item. Returns its id.

```php
function saveGateItem(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 1090 | `ProjectToolsService::saveGateItem` | read [analysts](/code/tables/analysts.md) |  |
| 1099 | `ProjectToolsService::saveGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`title`, `analyst_id`, `change_id`, `notes`) |  |
| 1103 | `ProjectToolsService::saveGateItem` | read [project_gate_items](/code/tables/project_gate_items.md) |  |
| 1104 | `ProjectToolsService::saveGateItem` | **insert** [project_gate_items](/code/tables/project_gate_items.md) (`project_id`, `stage_id`, `kind`, `title`, `analyst_id`, `change_id`, `notes`, `position`, `created_by_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteGateItem

*public static* - line 1115

```php
function deleteGateItem(PDO $conn, ActorContext $ctx, int $projectId, int $itemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1119 | `ProjectToolsService::deleteGateItem` | **delete** [project_gate_items](/code/tables/project_gate_items.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### tickGateItem

*public static* - line 1130

Tick or untick an item. A check: anybody who may change the project. A sign-off: ONLY its named analyst. A document: choose one of the project's documents (document_id; empty unticks). A change cannot be ticked - it is done when the change is approved.

```php
function tickGateItem(PDO $conn, ActorContext $ctx, int $projectId, int $itemId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1142 | `ProjectToolsService::tickGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`done_by_id`, `done_datetime`) |  |
| 1151 | `ProjectToolsService::tickGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`document_id`, `done_by_id`, `done_datetime`) |  |
| 1157 | `ProjectToolsService::tickGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`done_by_id`, `done_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### setGateKind

*public static* - line 1165

standard | golive. Making a gate go-live adds the starter items it does not already have.

```php
function setGateKind(PDO $conn, ActorContext $ctx, int $projectId, int $stageId, string $kind): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` | `int` |  |  |
| `$kind` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1172 | `ProjectToolsService::setGateKind` | **update** [project_stages](/code/tables/project_stages.md) (`gate_kind`, `updated_datetime`) |  |
| 1175 | `ProjectToolsService::setGateKind` | read [project_gate_items](/code/tables/project_gate_items.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### gateItem

*private static* - line 1191

```php
function gateItem(PDO $conn, int $projectId, int $itemId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1194 | `ProjectToolsService::gateItem` | read [project_gate_items](/code/tables/project_gate_items.md) |  |

### saveBenefit

*public static* - line 1209

Create (no id) or update a benefit. Returns its id.

```php
function saveBenefit(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 1229 | `ProjectToolsService::saveBenefit` | read [analysts](/code/tables/analysts.md) |  |
| 1238 | `ProjectToolsService::saveBenefit` | **update** [project_benefits](/code/tables/project_benefits.md) (`title`, `measure`, `unit`, `direction`, `baseline_value`, `target_value`, `target_date`, `owner_analyst_id`, `review_date`, `review_months`, `status`, `notes`) |  |
| 1245 | `ProjectToolsService::saveBenefit` | read [project_benefits](/code/tables/project_benefits.md) |  |
| 1246 | `ProjectToolsService::saveBenefit` | **insert** [project_benefits](/code/tables/project_benefits.md) (`title`, `measure`, `unit`, `direction`, `baseline_value`, `target_value`, `target_date`, `owner_analyst_id`, `review_date`, `review_months`, `status`, `notes`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteBenefit

*public static* - line 1257

```php
function deleteBenefit(PDO $conn, ActorContext $ctx, int $projectId, int $benefitId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$benefitId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1261 | `ProjectToolsService::deleteBenefit` | **delete** [project_benefit_measures](/code/tables/project_benefit_measures.md) |  |
| 1262 | `ProjectToolsService::deleteBenefit` | **delete** [project_benefits](/code/tables/project_benefits.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### addBenefitMeasure

*public static* - line 1272

Record a measurement. One on or after (review date - 14 days) is the review: the next one moves on by the benefit's review_months (none when 0). Returns the measurement's id.

```php
function addBenefitMeasure(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $benefitId,
    array $in
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$benefitId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1281 | `ProjectToolsService::addBenefitMeasure` | **insert** [project_benefit_measures](/code/tables/project_benefit_measures.md) (`benefit_id`, `value`, `measured_date`, `note`, `recorded_by_id`, `created_datetime`) |  |
| 1287 | `ProjectToolsService::addBenefitMeasure` | **update** [project_benefits](/code/tables/project_benefits.md) (`review_date`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteBenefitMeasure

*public static* - line 1294

```php
function deleteBenefitMeasure(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $benefitId,
    int $measureId
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$benefitId` | `int` |  |  |
| `$measureId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1298 | `ProjectToolsService::deleteBenefitMeasure` | **delete** [project_benefit_measures](/code/tables/project_benefit_measures.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### benefit

*private static* - line 1304

```php
function benefit(PDO $conn, int $projectId, int $benefitId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$benefitId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1307 | `ProjectToolsService::benefit` | read [project_benefits](/code/tables/project_benefits.md) |  |

### takeBaseline

*public static* - line 1324

Take a baseline of the plan as it is now, by hand. Returns its id.

```php
function takeBaseline(PDO $conn, ActorContext $ctx, int $projectId, $label): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$label` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1331 | `ProjectToolsService::takeBaseline` | read [project_baselines](/code/tables/project_baselines.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveChangeRequest

*public static* - line 1341

Raise a change request (no id), or edit one still waiting for a decision - by whoever raised it, or anybody who may change the project. Returns its id.

```php
function saveChangeRequest(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 1369 | `ProjectToolsService::saveChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`title`, `description`, `reason`, `impact_days`, `impact_cost`, `impact_scope`, `updated_datetime`) |  |
| 1375 | `ProjectToolsService::saveChangeRequest` | read [project_change_requests](/code/tables/project_change_requests.md) |  |
| 1376 | `ProjectToolsService::saveChangeRequest` | **insert** [project_change_requests](/code/tables/project_change_requests.md) (`project_id`, `number`, `title`, `description`, `reason`, `impact_days`, `impact_cost`, `impact_scope`, `status`, `raised_by_id`, `raised_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### decideChangeRequest

*public static* - line 1394

Approve or reject a change request. Approving takes a new baseline - the changed plan becomes the agreed one - and, when project_change_apply is "plan", first moves the target finish by the days and adds the cost as a budget line, recording both in `applied`. Rejecting changes nothing.

```php
function decideChangeRequest(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $crId,
    string $decision,
    $notes
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$crId` | `int` |  |  |
| `$decision` | `string` |  |  |
| `$notes` |  |  |  |

**Returns:** array{baseline_id:?int, applied:?array}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1411 | `ProjectToolsService::decideChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`status`, `decided_by_id`, `decided_datetime`, `decision_notes`, `updated_datetime`) |  |
| 1421 | `ProjectToolsService::decideChangeRequest` | **update** [projects](/code/tables/projects.md) (`target_end_date`) |  |
| 1430 | `ProjectToolsService::decideChangeRequest` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1431 | `ProjectToolsService::decideChangeRequest` | **insert** [project_budget_lines](/code/tables/project_budget_lines.md) (`project_id`, `title`, `category`, `planned_amount`, `notes`, `position`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 1440 | `ProjectToolsService::decideChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`baseline_id`, `applied`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### withdrawChangeRequest

*public static* - line 1457

Withdraw a request still waiting for a decision: whoever raised it, or the project's team.

```php
function withdrawChangeRequest(PDO $conn, ActorContext $ctx, int $projectId, int $crId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$crId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1463 | `ProjectToolsService::withdrawChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`status`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### changeRequest

*private static* - line 1468

```php
function changeRequest(PDO $conn, int $projectId, int $crId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$crId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1471 | `ProjectToolsService::changeRequest` | read [project_change_requests](/code/tables/project_change_requests.md) |  |

### changeable

*private static* - line 1485

```php
function changeable(PDO $conn, ActorContext $ctx, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |

### member

*private static* - line 1492

```php
function member(PDO $conn, int $projectId, int $memberId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$memberId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1494 | `ProjectToolsService::member` | read [project_members](/code/tables/project_members.md) |  |

### item

*private static* - line 1501

```php
function item(PDO $conn, int $projectId, int $itemId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1503 | `ProjectToolsService::item` | read [project_items](/code/tables/project_items.md) |  |

### moscow

*private static* - line 1510

```php
function moscow($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### stageOf

*private static* - line 1518

```php
function stageOf(PDO $conn, int $projectId, $stageId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$projectId` | `int` |  |  |
| `$stageId` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1521 | `ProjectToolsService::stageOf` | read [project_stages](/code/tables/project_stages.md) |  |

### roleId

*private static* - line 1527

```php
function roleId(PDO $conn, $v): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$v` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1530 | `ProjectToolsService::roleId` | read [project_roles](/code/tables/project_roles.md) |  |

### roleName

*private static* - line 1536

```php
function roleName(PDO $conn, ?int $id): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1539 | `ProjectToolsService::roleName` | read [project_roles](/code/tables/project_roles.md) |  |

### memberName

*private static* - line 1544

```php
function memberName(PDO $conn, int $memberId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$memberId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1547 | `ProjectToolsService::memberName` | read [project_members](/code/tables/project_members.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md), read [users](/code/tables/users.md) |  |

### mustExist

*private static* - line 1554

```php
function mustExist(PDO $conn, string $sql, int $id, string $msg): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$sql` | `string` |  |  |
| `$id` | `int` |  |  |
| `$msg` | `string` |  |  |

### str

*private static* - line 1561

```php
function str($v, int $max): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

### src

*private static* - line 1568

```php
function src(ActorContext $ctx): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ctx` | `ActorContext` |  |  |

### saveBudgetLine

*public static* - line 1578

Create (no id) or update a budget line. Returns its id.

```php
function saveBudgetLine(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 1611 | `ProjectToolsService::saveBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1617 | `ProjectToolsService::saveBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1620 | `ProjectToolsService::saveBudgetLine` | **update** [project_budget_lines](/code/tables/project_budget_lines.md) (`title`, `category`, `planned_amount`, `actual_amount`, `contract_id`, `cost_centre_id`, `notes`, `updated_datetime`) |  |
| 1625 | `ProjectToolsService::saveBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1626 | `ProjectToolsService::saveBudgetLine` | **insert** [project_budget_lines](/code/tables/project_budget_lines.md) (`project_id`, `title`, `category`, `planned_amount`, `actual_amount`, `contract_id`, `cost_centre_id`, `notes`, `position`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### budgetLineWhen

*private static* - line 1639

The 3.3.0 columns, on their own: before Database Verification adds them the rest of the line still saves.

```php
function budgetLineWhen(
    PDO $conn,
    int $lineId,
    ?string $plannedDate,
    ?string $spentDate,
    ?float $forecast
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$lineId` | `int` |  |  |
| `$plannedDate` | `?string` |  |  |
| `$spentDate` | `?string` |  |  |
| `$forecast` | `?float` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1642 | `ProjectToolsService::budgetLineWhen` | **update** [project_budget_lines](/code/tables/project_budget_lines.md) (`planned_date`, `spent_date`, `forecast_amount`) |  |

### deleteBudgetLine

*public static* - line 1648

```php
function deleteBudgetLine(PDO $conn, ActorContext $ctx, int $projectId, int $lineId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$lineId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1651 | `ProjectToolsService::deleteBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1655 | `ProjectToolsService::deleteBudgetLine` | **delete** [project_budget_lines](/code/tables/project_budget_lines.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### addProjectRate

*public static* - line 1666

The project's own hourly rate from a date (labour mode "rate"), in the project's currency. Each rate is a new row: the old one still prices the time logged before the new one's date.

```php
function addProjectRate(PDO $conn, ActorContext $ctx, int $projectId, $rate, ?string $from): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$rate` |  |  |  |
| `$from` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1676 | `ProjectToolsService::addProjectRate` | **insert** [project_labour_rates](/code/tables/project_labour_rates.md) (`scope`, `ref_id`, `hourly_rate`, `effective_from`, `created_by_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteProjectRate

*public static* - line 1684

Remove one of the project's own rates (entered by mistake).

```php
function deleteProjectRate(PDO $conn, ActorContext $ctx, int $projectId, string $from): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$from` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1688 | `ProjectToolsService::deleteProjectRate` | **delete** [project_labour_rates](/code/tables/project_labour_rates.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### setCurrency

*public static* - line 1699

Change the project's currency - a RELABEL: amounts are not converted, and the page says so before anyone presses Save. Only when Projects -> Settings -> Budget lets projects choose.

```php
function setCurrency(PDO $conn, ActorContext $ctx, int $projectId, string $code): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$code` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1708 | `ProjectToolsService::setCurrency` | **update** [projects](/code/tables/projects.md) (`currency`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### announce

*public static* - line 1727

Announce planned disruption from a project - "Move day: phones down Saturday". How depends on Projects -> Settings -> General: planned planned maintenance: upcoming until its start, then an incident now the same, starting now - an incident straight away off refused (the button is not shown) Needs Service Status as well as being allowed to change the project. Service Status is install-wide, like contracts: no company check on the services. Returns the planned maintenance id.

```php
function announce(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
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
| 1731 | `ProjectToolsService::announce` | read [projects](/code/tables/projects.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### withdrawAnnouncement

*public static* - line 1752

Withdraw an announcement that has not started. It must belong to this project.

```php
function withdrawAnnouncement(PDO $conn, ActorContext $ctx, int $projectId, int $plannedId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$plannedId` | `int` |  |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### announcements

*public static* - line 1770

What the Connections tab needs: the mode, this project's announcements, and the services and impact levels for the dialog. null when the analyst cannot open Service Status - then the panel is not drawn at all.

```php
function announcements(PDO $conn, int $analystId, int $projectId): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$projectId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1779 | `ProjectToolsService::announcements` | read [status_services](/code/tables/status_services.md) |  |
| 1780 | `ProjectToolsService::announcements` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [api/projects/tools.php](/code/files/api/projects/tools.php.md)

