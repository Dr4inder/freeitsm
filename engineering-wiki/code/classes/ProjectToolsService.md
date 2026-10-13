# ProjectToolsService

> Class in [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), line 20

## Methods

| Method | What it does |
|---|---|
| [addMember()](#addmember) | Add a member: exactly one of analyst_id / team_id / user_id / supplier_id (+ contact_id). Returns its id. |
| [addContractorMember()](#addcontractormember) | A contractor on the team (3.3.0): a supplier, or one person there (which brings its supplier). Suppliers live in Contracts, so adding one needs it. |
| [contractorMemberSql()](#contractormembersql) | The member columns for a contractor (3.3.0), or NULLs before Database Verification. |
| [updateMember()](#updatemember) | Changes a project member's role, notes and stakeholder map details (power, interest, stance, how they are kept informed), and records the change in the project's history. |
| [stakeReady()](#stakeready) | Has Database Verification added the stakeholder columns (3.3.0)? |
| [stakeColumns()](#stakecolumns) | The stakeholder columns for a member query, or NULL placeholders before Database Verification has added them. |
| [removeMember()](#removemember) | Remove a member. Their RACI letters go with them (FK cascade, and by hand). |
| [saveItem()](#saveitem) | Adds or updates a deliverable or requirement (title, description, acceptance criteria, MoSCoW priority, stage, status) and returns its id. |
| [deleteItem()](#deleteitem) | Deletes a deliverable with its RACI rows; any child items lose their parent. Recorded in the project's history. |
| [moveItem()](#moveitem) | Move an item to a MoSCoW column, in the given order within it (the drag on the board). |
| [setRaci()](#setraci) | Set one cell: R, A, C, I or '' to clear. Returns the row's letters after the change ({member_id: letter}), so the screen can redraw a demoted A. |
| [saveRaid()](#saveraid) | Create or update a RAID entry. Probability is for risks only and impact for risks and issues (both 1-5); a risk's score is probability x impact (1-25), which is what the heat map and the risk tolerance read. |
| [deleteRaid()](#deleteraid) | Deletes a RAID log entry; its follow-up tasks are unlinked but kept. Recorded in the project's history. |
| [raidLogReady()](#raidlogready) | Has Database Verification added the 3.3.0 RAID columns (escalation, decision log)? |
| [escalateRaid()](#escalateraid) | Escalate an open entry (3.3.0): it needs somebody above the project manager - a sponsor, the board - to act. Stamped with who and when and a note saying what is needed; shown on the Overview until it is de-escalated or the entry is closed; fires project.raid_escalated, so the project manager's bell rings (unless they escalated it) and a workflow can email the sponsor. Escalating again replaces the note and fires again. |
| [deescalateRaid()](#deescalateraid) | Clears a RAID entry's escalation; does nothing when it is not escalated. Recorded in the project's history. |
| [addRaidAction()](#addraidaction) | A follow-up action on a RAID entry (3.3.0): a NEW project task, made by `createTaskInProject()` (TasksService - so the assigned email, the bell and task events happen as for any task), then joined to the entry. It is put in no stage - where it sits in the plan is the Plan's job. Returns the task id. |
| [removeRaidAction()](#removeraidaction) | Unlink an action. The task itself stays - it is somebody's work. |
| [raidActionsReady()](#raidactionsready) | True when the project_raid_tasks table exists (after Database Verification). Cached per request. |
| [lessonToKnowledge()](#lessontoknowledge) | A lesson becomes a Knowledge article, in one click (3.2.0). |
| [issueToTicket()](#issuetoticket) | Raise a NEW ticket from an issue (3.2.0) - before, an issue could only be linked to a ticket that already existed. |
| [raidRow()](#raidrow) | One RAID entry of this project, or not found. |
| [linkQuietly()](#linkquietly) | Link the new record on the Connections tab too. The record is already made and remembered on the entry, so a link that cannot be added (the tables not verified yet) must not undo it. |
| [saveTolerances()](#savetolerances) | The project's tolerances - how far it may drift before it is an exception (PRINCE2's "manage by exception", in our own words). time = days past the target finish (or the active stage's end) with work still open; risk = the highest open risk score allowed (1-25). null removes one. |
| [tolerances()](#tolerances) | {time: int\|null, risk: int\|null} |
| [decideGate()](#decidegate) | Record the gate at the end of a stage. Go (or go with conditions) closes the stage and starts the next planned one, so the decision IS the hand-over; Stop records the decision and leaves the plan alone - what to do next is the board's call, not the software's. |
| [raid()](#raid) | The project's RAID log - each entry with its owner, ticket, risk score, escalation, lesson article and follow-up tasks. |
| [saveTarget()](#savetarget) | Add or change an asset target. Needs the project to be changeable AND Assets access: the rule names asset types, statuses and models, and the dialog's live count would otherwise tell somebody without Assets what is in the estate. Returns its id. |
| [deleteTarget()](#deletetarget) | Deletes an asset target from a project and records it; health and tolerances are checked again. |
| [assertAssets()](#assertassets) | Assets access, for anything that reads the estate through a target. |
| [target()](#target) | Loads one asset target of the project; throws not found otherwise. |
| [date()](#date) | Validates an optional YYYY-MM-DD date; blank gives null. |
| [saveMilestone()](#savemilestone) | Add or change a milestone: {id?, name, due_date, stage_id?, notes?, done?, done_date?}. Any field left out keeps its value, so the Timeline can move just the date. done = true stamps today (or done_date) and who; done = false clears both. Reaching one fires project.milestone_reached. Returns its id. |
| [deleteMilestone()](#deletemilestone) | Deletes a milestone from a project, records it, and refreshes the calendar, health and tolerances. |
| [milestone()](#milestone) | Loads one milestone of the project; throws not found otherwise. |
| [setTaskDates()](#settaskdates) | Move a project task's dates from the Timeline: {start_date?, due_date?}. |
| [setTaskEstimate()](#settaskestimate) | Set a project task's estimate from the Plan (3.3.0): {estimate_hours} (empty = not estimated). Through TasksService, like `setTaskDates()` - the task window and the REST API write the same column the same way. |
| [members()](#members) | Members with display names, roles and kinds, in order. |
| [items()](#items) | The project's deliverables and requirements, in order, with their stage names; empty before the table exists. |
| [raci()](#raci) | {item_id: {member_id: letter}} |
| [addTaskDependency()](#addtaskdependency) | `$taskId` waits for `$dependsOnId` to finish (+ lag days). Both in this project; no loops. Returns its id. |
| [removeTaskDependency()](#removetaskdependency) | Removes a dependency between two of the project's tasks and records it in the project's history. |
| [saveGateItem()](#savegateitem) | Add (no id) or change a gate item. Returns its id. |
| [deleteGateItem()](#deletegateitem) | Deletes a stage gate item and records it in the project's history. |
| [tickGateItem()](#tickgateitem) | Tick or untick an item. A check: anybody who may change the project. A sign-off: ONLY its named analyst. A document: choose one of the project's documents (document_id; empty unticks). A change cannot be ticked - it is done when the change is approved. |
| [setGateKind()](#setgatekind) | standard \| golive. Making a gate go-live adds the starter items it does not already have. |
| [gateItem()](#gateitem) | Loads one stage gate item of the project; throws not found otherwise. |
| [saveBenefit()](#savebenefit) | Create (no id) or update a benefit. Returns its id. |
| [deleteBenefit()](#deletebenefit) | Deletes a benefit with its measurements and records it in the project's history. |
| [addBenefitMeasure()](#addbenefitmeasure) | Record a measurement. One on or after (review date - 14 days) is the review: the next one moves on by the benefit's review_months (none when 0). Returns the measurement's id. |
| [deleteBenefitMeasure()](#deletebenefitmeasure) | Deletes one measurement of a benefit; throws not found when it is not that benefit's. |
| [benefit()](#benefit) | Loads one benefit of the project; throws not found otherwise. |
| [takeBaseline()](#takebaseline) | Take a baseline of the plan as it is now, by hand. Returns its id. |
| [saveChangeRequest()](#savechangerequest) | Raise a change request (no id), or edit one still waiting for a decision - by whoever raised it, or anybody who may change the project. Returns its id. |
| [decideChangeRequest()](#decidechangerequest) | Approve or reject a change request. Approving takes a new baseline - the changed plan becomes the agreed one - and, when project_change_apply is "plan", first moves the target finish by the days and adds the cost as a budget line, recording both in `applied`. Rejecting changes nothing. |
| [withdrawChangeRequest()](#withdrawchangerequest) | Withdraw a request still waiting for a decision: whoever raised it, or the project's team. |
| [changeRequest()](#changerequest) | Loads one change request of the project; throws not found otherwise. |
| [changeable()](#changeable) | Loads the project for the actor and checks they may change it; throws otherwise. |
| [member()](#member) | Loads one member row of the project; throws not found otherwise. |
| [item()](#item) | Loads one deliverable of the project; throws not found otherwise. |
| [moscow()](#moscow) | A validated MoSCoW value in lower case, or null for none. |
| [stageOf()](#stageof) | A validated stage id of this project, or null for none. |
| [roleId()](#roleid) | A validated project role id, or null for none. |
| [roleName()](#rolename) | The name of a project role, or null. |
| [memberName()](#membername) | The name of a project member - analyst, team, portal user or contractor - or #id. |
| [mustExist()](#mustexist) | Runs a one-id lookup query and throws a validation error with `$msg` when it finds nothing. |
| [str()](#str) | Trimmed text cut to `$max` characters, or null when blank. |
| [src()](#src) | The history source for the actor: 'api' or 'app'. |
| [saveBudgetLine()](#savebudgetline) | Create (no id) or update a budget line. Returns its id. |
| [budgetLineWhen()](#budgetlinewhen) | The 3.3.0 columns, on their own: before Database Verification adds them the rest of the line still saves. |
| [deleteBudgetLine()](#deletebudgetline) | Deletes a budget line, records it in the project's history, and checks health and tolerances again. |
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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 103 | `ProjectToolsService::contractorMemberSql` | read [project_members](/code/tables/project_members.md) |  |
| 103 | `ProjectToolsService::contractorMemberSql` | read [suppliers](/code/tables/suppliers.md) |  |
| 110 | `ProjectToolsService::contractorMemberSql` | read [suppliers](/code/tables/suppliers.md), read [contacts](/code/tables/contacts.md) |  |

### updateMember

*public static* - line 118

Changes a project member's role, notes and stakeholder map details (power, interest, stance, how they are kept informed), and records the change in the project's history.

```php
function updateMember(PDO $conn, ActorContext $ctx, int $projectId, int $memberId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$memberId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 143 | `ProjectToolsService::updateMember` | **update** [project_members](/code/tables/project_members.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### stakeReady

*public static* - line 153

Has Database Verification added the stakeholder columns (3.3.0)?

```php
function stakeReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 157 | `ProjectToolsService::stakeReady` | read [project_members](/code/tables/project_members.md) |  |

**Called from:** [api/projects/lookups.php](/code/files/api/projects/lookups.php.md)

### stakeColumns

*private static* - line 167

The stakeholder columns for a member query, or NULL placeholders before Database Verification has added them.

```php
function stakeColumns(PDO $conn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

### removeMember

*public static* - line 173

Remove a member. Their RACI letters go with them (FK cascade, and by hand).

```php
function removeMember(PDO $conn, ActorContext $ctx, int $projectId, int $memberId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$memberId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 178 | `ProjectToolsService::removeMember` | **delete** [project_raci](/code/tables/project_raci.md) |  |
| 179 | `ProjectToolsService::removeMember` | **delete** [project_members](/code/tables/project_members.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveItem

*public static* - line 194

Adds or updates a deliverable or requirement (title, description, acceptance criteria, MoSCoW priority, stage, status) and returns its id.

A new item goes to the end of the list; adding one, or changing its MoSCoW priority,
is recorded in the project's history.

```php
function saveItem(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 209 | `ProjectToolsService::saveItem` | **update** [project_items](/code/tables/project_items.md) (`title`, `description`, `acceptance_criteria`, `moscow`, `stage_id`, `status`, `updated_datetime`) |  |
| 216 | `ProjectToolsService::saveItem` | read [project_items](/code/tables/project_items.md) |  |
| 217 | `ProjectToolsService::saveItem` | **insert** [project_items](/code/tables/project_items.md) (`project_id`, `title`, `description`, `acceptance_criteria`, `moscow`, `stage_id`, `status`, `position`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteItem

*public static* - line 229

Deletes a deliverable with its RACI rows; any child items lose their parent. Recorded in the project's history.

```php
function deleteItem(PDO $conn, ActorContext $ctx, int $projectId, int $itemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 233 | `ProjectToolsService::deleteItem` | **delete** [project_raci](/code/tables/project_raci.md) |  |
| 234 | `ProjectToolsService::deleteItem` | **update** [project_items](/code/tables/project_items.md) (`parent_id`) |  |
| 235 | `ProjectToolsService::deleteItem` | **delete** [project_items](/code/tables/project_items.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### moveItem

*public static* - line 240

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |
| `$moscow` |  |  |  |
| `$orderedIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 245 | `ProjectToolsService::moveItem` | **update** [project_items](/code/tables/project_items.md) (`moscow`, `updated_datetime`) |  |
| 246 | `ProjectToolsService::moveItem` | **update** [project_items](/code/tables/project_items.md) (`position`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### setRaci

*public static* - line 262

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |
| `$memberId` | `int` |  |  |
| `$letter` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 270 | `ProjectToolsService::setRaci` | **delete** [project_raci](/code/tables/project_raci.md) |  |
| 274 | `ProjectToolsService::setRaci` | **update** [project_raci](/code/tables/project_raci.md) (`letter`) |  |
| 276 | `ProjectToolsService::setRaci` | **insert** [project_raci](/code/tables/project_raci.md) (`project_id`, `item_id`, `member_id`, `letter`) |  |
| 280 | `ProjectToolsService::setRaci` | read [project_raci](/code/tables/project_raci.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveRaid

*public static* - line 309

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 315 | `ProjectToolsService::saveRaid` | read [project_raid](/code/tables/project_raid.md) |  |
| 333 | `ProjectToolsService::saveRaid` | read [analysts](/code/tables/analysts.md) |  |
| 362 | `ProjectToolsService::saveRaid` | **update** [project_raid](/code/tables/project_raid.md) (`type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `owner_analyst_id`, `status`, `due_date`, `ticket_id`, `updated_datetime`) |  |
| 373 | `ProjectToolsService::saveRaid` | **insert** [project_raid](/code/tables/project_raid.md) (`type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `owner_analyst_id`, `status`, `due_date`, `ticket_id`, `project_id`) |  |
| 378 | `ProjectToolsService::saveRaid` | **update** [project_raid](/code/tables/project_raid.md) (`decided_by`, `decided_date`, `rationale`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteRaid

*public static* - line 389

Deletes a RAID log entry; its follow-up tasks are unlinked but kept. Recorded in the project's history.

```php
function deleteRaid(PDO $conn, ActorContext $ctx, int $projectId, int $raidId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 392 | `ProjectToolsService::deleteRaid` | read [project_raid](/code/tables/project_raid.md) |  |
| 397 | `ProjectToolsService::deleteRaid` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md) |  |
| 398 | `ProjectToolsService::deleteRaid` | **delete** [project_raid](/code/tables/project_raid.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### raidLogReady

*public static* - line 404

Has Database Verification added the 3.3.0 RAID columns (escalation, decision log)?

```php
function raidLogReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 408 | `ProjectToolsService::raidLogReady` | read [project_raid](/code/tables/project_raid.md) |  |

### escalateRaid

*public static* - line 422

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |
| `$note` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 430 | `ProjectToolsService::escalateRaid` | **update** [project_raid](/code/tables/project_raid.md) (`escalated_datetime`, `escalated_by_id`, `escalation_note`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deescalateRaid

*public static* - line 441

Clears a RAID entry's escalation; does nothing when it is not escalated. Recorded in the project's history.

```php
function deescalateRaid(PDO $conn, ActorContext $ctx, int $projectId, int $raidId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 447 | `ProjectToolsService::deescalateRaid` | **update** [project_raid](/code/tables/project_raid.md) (`escalated_datetime`, `escalated_by_id`, `escalation_note`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### addRaidAction

*public static* - line 458

A follow-up action on a RAID entry (3.3.0): a NEW project task, made by `createTaskInProject()` (TasksService - so the assigned email, the bell and task events happen as for any task), then joined to the entry. It is put in no stage - where it sits in the plan is the Plan's job. Returns the task id.

```php
function addRaidAction(PDO $conn, ActorContext $ctx, int $projectId, int $raidId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 471 | `ProjectToolsService::addRaidAction` | **insert** [project_raid_tasks](/code/tables/project_raid_tasks.md) (`raid_id`, `task_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### removeRaidAction

*public static* - line 477

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 482 | `ProjectToolsService::removeRaidAction` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### raidActionsReady

*public static* - line 486

True when the project_raid_tasks table exists (after Database Verification). Cached per request.

```php
function raidActionsReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 490 | `ProjectToolsService::raidActionsReady` | read [project_raid_tasks](/code/tables/project_raid_tasks.md) |  |

### lessonToKnowledge

*public static* - line 507

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 536 | `ProjectToolsService::lessonToKnowledge` | **update** [project_raid](/code/tables/project_raid.md) (`knowledge_article_id`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### issueToTicket

*public static* - line 555

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 564 | `ProjectToolsService::issueToTicket` | read [analysts](/code/tables/analysts.md) |  |
| 589 | `ProjectToolsService::issueToTicket` | **update** [project_raid](/code/tables/project_raid.md) (`ticket_id`, `updated_datetime`) |  |
| 591 | `ProjectToolsService::issueToTicket` | read [tickets](/code/tables/tickets.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### raidRow

*private static* - line 600

One RAID entry of this project, or not found.

```php
function raidRow(PDO $conn, int $projectId, int $raidId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$raidId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 602 | `ProjectToolsService::raidRow` | read [project_raid](/code/tables/project_raid.md) |  |

### linkQuietly

*private static* - line 614

Link the new record on the Connections tab too. The record is already made and remembered on the entry, so a link that cannot be added (the tables not verified yet) must not undo it.

```php
function linkQuietly(PDO $conn, ActorContext $ctx, int $projectId, string $kind, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$kind` | `string` |  |  |
| `$id` | `int` |  |  |

### saveTolerances

*public static* - line 636

The project's tolerances - how far it may drift before it is an exception (PRINCE2's "manage by exception", in our own words). time = days past the target finish (or the active stage's end) with work still open; risk = the highest open risk score allowed (1-25). null removes one.

```php
function saveTolerances(PDO $conn, ActorContext $ctx, int $projectId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 644 | `ProjectToolsService::saveTolerances` | **delete** [project_tolerances](/code/tables/project_tolerances.md) |  |
| 650 | `ProjectToolsService::saveTolerances` | read [project_tolerances](/code/tables/project_tolerances.md) |  |
| 653 | `ProjectToolsService::saveTolerances` | **update** [project_tolerances](/code/tables/project_tolerances.md) (`value`) |  |
| 655 | `ProjectToolsService::saveTolerances` | **insert** [project_tolerances](/code/tables/project_tolerances.md) (`project_id`, `stage_id`, `dimension`, `value`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### tolerances

*public static* - line 664

{time: int|null, risk: int|null}

```php
function tolerances(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 668 | `ProjectToolsService::tolerances` | read [project_tolerances](/code/tables/project_tolerances.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/projects/templates.php](/code/files/includes/projects/templates.php.md)

### decideGate

*public static* - line 683

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$stageId` | `int` |  |  |
| `$decision` | `string` |  |  |
| `$notes` | `?string` |  |  |

**Returns:** array{closed:bool, next:?string}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 687 | `ProjectToolsService::decideGate` | read [project_stages](/code/tables/project_stages.md) |  |
| 710 | `ProjectToolsService::decideGate` | **update** [project_stages](/code/tables/project_stages.md) (`gate_decision`, `gate_notes`, `gate_decided_by`, `gate_decided_datetime`, `updated_datetime`) |  |
| 717 | `ProjectToolsService::decideGate` | **update** [project_stages](/code/tables/project_stages.md) (`status`) |  |
| 719 | `ProjectToolsService::decideGate` | read [project_stages](/code/tables/project_stages.md) |  |
| 722 | `ProjectToolsService::decideGate` | **update** [project_stages](/code/tables/project_stages.md) (`status`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### raid

*public static* - line 751

The project's RAID log - each entry with its owner, ticket, risk score, escalation, lesson article and follow-up tasks.

Highest risk score first, closed entries last. Empty when the tables are not there.

```php
function raid(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 757 | `ProjectToolsService::raid` | read [project_raid](/code/tables/project_raid.md), read [analysts](/code/tables/analysts.md) |  |
| 760 | `ProjectToolsService::raid` | read [analysts](/code/tables/analysts.md) |  |
| 760 | `ProjectToolsService::raid` | read [tickets](/code/tables/tickets.md) |  |
| 773 | `ProjectToolsService::raid` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 779 | `ProjectToolsService::raid` | read [project_raid_tasks](/code/tables/project_raid_tasks.md), read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/projects/export.php](/code/files/api/projects/export.php.md), [api/projects/get.php](/code/files/api/projects/get.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/projects/assistant.php](/code/files/includes/projects/assistant.php.md)

### saveTarget

*public static* - line 813

Add or change an asset target. Needs the project to be changeable AND Assets access: the rule names asset types, statuses and models, and the dialog's live count would otherwise tell somebody without Assets what is in the estate. Returns its id.

```php
function saveTarget(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 827 | `ProjectToolsService::saveTarget` | **update** [project_asset_targets](/code/tables/project_asset_targets.md) (`name`, `scope`, `scope_type_id`, `scope_field`, `scope_value`, `done_field`, `done_op`, `done_value`, `target_date`, `updated_datetime`) |  |
| 831 | `ProjectToolsService::saveTarget` | **delete** [project_asset_target_snapshots](/code/tables/project_asset_target_snapshots.md) |  |
| 833 | `ProjectToolsService::saveTarget` | read [project_asset_targets](/code/tables/project_asset_targets.md) |  |
| 835 | `ProjectToolsService::saveTarget` | **insert** [project_asset_targets](/code/tables/project_asset_targets.md) (`project_id`, `name`, `scope`, `scope_type_id`, `scope_field`, `scope_value`, `done_field`, `done_op`, `done_value`, `target_date`, `position`, `created_by_analyst_id`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteTarget

*public static* - line 847

Deletes an asset target from a project and records it; health and tolerances are checked again.

```php
function deleteTarget(PDO $conn, ActorContext $ctx, int $projectId, int $targetId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$targetId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 851 | `ProjectToolsService::deleteTarget` | **delete** [project_asset_targets](/code/tables/project_asset_targets.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### assertAssets

*public static* - line 858

Assets access, for anything that reads the estate through a target.

```php
function assertAssets(PDO $conn, ActorContext $ctx): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### target

*public static* - line 866

Loads one asset target of the project; throws not found otherwise.

```php
function target(PDO $conn, int $projectId, int $targetId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$targetId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 868 | `ProjectToolsService::target` | read [project_asset_targets](/code/tables/project_asset_targets.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### date

*private static* - line 877

Validates an optional YYYY-MM-DD date; blank gives null.

```php
function date($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### saveMilestone

*public static* - line 897

Add or change a milestone: {id?, name, due_date, stage_id?, notes?, done?, done_date?}. Any field left out keeps its value, so the Timeline can move just the date. done = true stamps today (or done_date) and who; done = false clears both. Reaching one fires project.milestone_reached. Returns its id.

```php
function saveMilestone(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 926 | `ProjectToolsService::saveMilestone` | **update** [project_milestones](/code/tables/project_milestones.md) (`name`, `due_date`, `stage_id`, `notes`, `done_date`, `done_by_analyst_id`, `updated_datetime`) |  |
| 932 | `ProjectToolsService::saveMilestone` | read [project_milestones](/code/tables/project_milestones.md) |  |
| 934 | `ProjectToolsService::saveMilestone` | **insert** [project_milestones](/code/tables/project_milestones.md) (`project_id`, `stage_id`, `name`, `due_date`, `done_date`, `done_by_analyst_id`, `notes`, `position`, `created_by_analyst_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteMilestone

*public static* - line 950

Deletes a milestone from a project, records it, and refreshes the calendar, health and tolerances.

```php
function deleteMilestone(PDO $conn, ActorContext $ctx, int $projectId, int $milestoneId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$milestoneId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 955 | `ProjectToolsService::deleteMilestone` | **delete** [project_milestones](/code/tables/project_milestones.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### milestone

*private static* - line 963

Loads one milestone of the project; throws not found otherwise.

```php
function milestone(PDO $conn, int $projectId, int $milestoneId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$milestoneId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 966 | `ProjectToolsService::milestone` | read [project_milestones](/code/tables/project_milestones.md) |  |

### setTaskDates

*public static* - line 982

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 985 | `ProjectToolsService::setTaskDates` | read [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### setTaskEstimate

*public static* - line 1004

Set a project task's estimate from the Plan (3.3.0): {estimate_hours} (empty = not estimated). Through TasksService, like `setTaskDates()` - the task window and the REST API write the same column the same way.

```php
function setTaskEstimate(PDO $conn, ActorContext $ctx, int $projectId, int $taskId, $hours): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |
| `$hours` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1007 | `ProjectToolsService::setTaskEstimate` | read [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### members

*public static* - line 1020

Members with display names, roles and kinds, in order.

```php
function members(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1029 | `ProjectToolsService::members` | read [project_members](/code/tables/project_members.md), read [project_roles](/code/tables/project_roles.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md), read [users](/code/tables/users.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md)

### items

*public static* - line 1047

The project's deliverables and requirements, in order, with their stage names; empty before the table exists.

```php
function items(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1050 | `ProjectToolsService::items` | read [project_items](/code/tables/project_items.md), read [project_stages](/code/tables/project_stages.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md)

### raci

*public static* - line 1060

{item_id: {member_id: letter}}

```php
function raci(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1064 | `ProjectToolsService::raci` | read [project_raci](/code/tables/project_raci.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md)

### addTaskDependency

*public static* - line 1076

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |
| `$dependsOnId` | `int` |  |  |
| `$lag` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1083 | `ProjectToolsService::addTaskDependency` | read [tasks](/code/tables/tasks.md) |  |
| 1092 | `ProjectToolsService::addTaskDependency` | **insert** [task_dependencies](/code/tables/task_dependencies.md) (`task_id`, `depends_on_id`, `lag_days`, `created_by_id`, `created_datetime`) |  |
| 1095 | `ProjectToolsService::addTaskDependency` | read [task_dependencies](/code/tables/task_dependencies.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### removeTaskDependency

*public static* - line 1103

Removes a dependency between two of the project's tasks and records it in the project's history.

```php
function removeTaskDependency(PDO $conn, ActorContext $ctx, int $projectId, int $depId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$depId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1109 | `ProjectToolsService::removeTaskDependency` | **delete** [task_dependencies](/code/tables/task_dependencies.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveGateItem

*public static* - line 1119

Add (no id) or change a gate item. Returns its id.

```php
function saveGateItem(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1134 | `ProjectToolsService::saveGateItem` | read [analysts](/code/tables/analysts.md) |  |
| 1143 | `ProjectToolsService::saveGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`title`, `analyst_id`, `change_id`, `notes`) |  |
| 1147 | `ProjectToolsService::saveGateItem` | read [project_gate_items](/code/tables/project_gate_items.md) |  |
| 1148 | `ProjectToolsService::saveGateItem` | **insert** [project_gate_items](/code/tables/project_gate_items.md) (`project_id`, `stage_id`, `kind`, `title`, `analyst_id`, `change_id`, `notes`, `position`, `created_by_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteGateItem

*public static* - line 1160

Deletes a stage gate item and records it in the project's history.

```php
function deleteGateItem(PDO $conn, ActorContext $ctx, int $projectId, int $itemId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1164 | `ProjectToolsService::deleteGateItem` | **delete** [project_gate_items](/code/tables/project_gate_items.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### tickGateItem

*public static* - line 1175

Tick or untick an item. A check: anybody who may change the project. A sign-off: ONLY its named analyst. A document: choose one of the project's documents (document_id; empty unticks). A change cannot be ticked - it is done when the change is approved.

```php
function tickGateItem(PDO $conn, ActorContext $ctx, int $projectId, int $itemId, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1187 | `ProjectToolsService::tickGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`done_by_id`, `done_datetime`) |  |
| 1196 | `ProjectToolsService::tickGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`document_id`, `done_by_id`, `done_datetime`) |  |
| 1202 | `ProjectToolsService::tickGateItem` | **update** [project_gate_items](/code/tables/project_gate_items.md) (`done_by_id`, `done_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### setGateKind

*public static* - line 1210

standard | golive. Making a gate go-live adds the starter items it does not already have.

```php
function setGateKind(PDO $conn, ActorContext $ctx, int $projectId, int $stageId, string $kind): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$stageId` | `int` |  |  |
| `$kind` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1217 | `ProjectToolsService::setGateKind` | **update** [project_stages](/code/tables/project_stages.md) (`gate_kind`, `updated_datetime`) |  |
| 1220 | `ProjectToolsService::setGateKind` | read [project_gate_items](/code/tables/project_gate_items.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### gateItem

*private static* - line 1237

Loads one stage gate item of the project; throws not found otherwise.

```php
function gateItem(PDO $conn, int $projectId, int $itemId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1240 | `ProjectToolsService::gateItem` | read [project_gate_items](/code/tables/project_gate_items.md) |  |

### saveBenefit

*public static* - line 1255

Create (no id) or update a benefit. Returns its id.

```php
function saveBenefit(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1275 | `ProjectToolsService::saveBenefit` | read [analysts](/code/tables/analysts.md) |  |
| 1284 | `ProjectToolsService::saveBenefit` | **update** [project_benefits](/code/tables/project_benefits.md) (`title`, `measure`, `unit`, `direction`, `baseline_value`, `target_value`, `target_date`, `owner_analyst_id`, `review_date`, `review_months`, `status`, `notes`) |  |
| 1291 | `ProjectToolsService::saveBenefit` | read [project_benefits](/code/tables/project_benefits.md) |  |
| 1292 | `ProjectToolsService::saveBenefit` | **insert** [project_benefits](/code/tables/project_benefits.md) (`title`, `measure`, `unit`, `direction`, `baseline_value`, `target_value`, `target_date`, `owner_analyst_id`, `review_date`, `review_months`, `status`, `notes`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### deleteBenefit

*public static* - line 1304

Deletes a benefit with its measurements and records it in the project's history.

```php
function deleteBenefit(PDO $conn, ActorContext $ctx, int $projectId, int $benefitId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$benefitId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1308 | `ProjectToolsService::deleteBenefit` | **delete** [project_benefit_measures](/code/tables/project_benefit_measures.md) |  |
| 1309 | `ProjectToolsService::deleteBenefit` | **delete** [project_benefits](/code/tables/project_benefits.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### addBenefitMeasure

*public static* - line 1319

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$benefitId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1328 | `ProjectToolsService::addBenefitMeasure` | **insert** [project_benefit_measures](/code/tables/project_benefit_measures.md) (`benefit_id`, `value`, `measured_date`, `note`, `recorded_by_id`, `created_datetime`) |  |
| 1334 | `ProjectToolsService::addBenefitMeasure` | **update** [project_benefits](/code/tables/project_benefits.md) (`review_date`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteBenefitMeasure

*public static* - line 1342

Deletes one measurement of a benefit; throws not found when it is not that benefit's.

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$benefitId` | `int` |  |  |
| `$measureId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1346 | `ProjectToolsService::deleteBenefitMeasure` | **delete** [project_benefit_measures](/code/tables/project_benefit_measures.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### benefit

*private static* - line 1353

Loads one benefit of the project; throws not found otherwise.

```php
function benefit(PDO $conn, int $projectId, int $benefitId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$benefitId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1356 | `ProjectToolsService::benefit` | read [project_benefits](/code/tables/project_benefits.md) |  |

### takeBaseline

*public static* - line 1373

Take a baseline of the plan as it is now, by hand. Returns its id.

```php
function takeBaseline(PDO $conn, ActorContext $ctx, int $projectId, $label): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$label` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1380 | `ProjectToolsService::takeBaseline` | read [project_baselines](/code/tables/project_baselines.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### saveChangeRequest

*public static* - line 1390

Raise a change request (no id), or edit one still waiting for a decision - by whoever raised it, or anybody who may change the project. Returns its id.

```php
function saveChangeRequest(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1418 | `ProjectToolsService::saveChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`title`, `description`, `reason`, `impact_days`, `impact_cost`, `impact_scope`, `updated_datetime`) |  |
| 1424 | `ProjectToolsService::saveChangeRequest` | read [project_change_requests](/code/tables/project_change_requests.md) |  |
| 1425 | `ProjectToolsService::saveChangeRequest` | **insert** [project_change_requests](/code/tables/project_change_requests.md) (`project_id`, `number`, `title`, `description`, `reason`, `impact_days`, `impact_cost`, `impact_scope`, `status`, `raised_by_id`, `raised_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### decideChangeRequest

*public static* - line 1443

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$crId` | `int` |  |  |
| `$decision` | `string` |  |  |
| `$notes` |  |  |  |

**Returns:** array{baseline_id:?int, applied:?array}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1460 | `ProjectToolsService::decideChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`status`, `decided_by_id`, `decided_datetime`, `decision_notes`, `updated_datetime`) |  |
| 1470 | `ProjectToolsService::decideChangeRequest` | **update** [projects](/code/tables/projects.md) (`target_end_date`) |  |
| 1479 | `ProjectToolsService::decideChangeRequest` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1480 | `ProjectToolsService::decideChangeRequest` | **insert** [project_budget_lines](/code/tables/project_budget_lines.md) (`project_id`, `title`, `category`, `planned_amount`, `notes`, `position`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 1489 | `ProjectToolsService::decideChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`baseline_id`, `applied`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### withdrawChangeRequest

*public static* - line 1506

Withdraw a request still waiting for a decision: whoever raised it, or the project's team.

```php
function withdrawChangeRequest(PDO $conn, ActorContext $ctx, int $projectId, int $crId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$crId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1512 | `ProjectToolsService::withdrawChangeRequest` | **update** [project_change_requests](/code/tables/project_change_requests.md) (`status`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### changeRequest

*private static* - line 1518

Loads one change request of the project; throws not found otherwise.

```php
function changeRequest(PDO $conn, int $projectId, int $crId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$crId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1521 | `ProjectToolsService::changeRequest` | read [project_change_requests](/code/tables/project_change_requests.md) |  |

### changeable

*private static* - line 1536

Loads the project for the actor and checks they may change it; throws otherwise.

```php
function changeable(PDO $conn, ActorContext $ctx, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

### member

*private static* - line 1544

Loads one member row of the project; throws not found otherwise.

```php
function member(PDO $conn, int $projectId, int $memberId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$memberId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1546 | `ProjectToolsService::member` | read [project_members](/code/tables/project_members.md) |  |

### item

*private static* - line 1554

Loads one deliverable of the project; throws not found otherwise.

```php
function item(PDO $conn, int $projectId, int $itemId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$itemId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1556 | `ProjectToolsService::item` | read [project_items](/code/tables/project_items.md) |  |

### moscow

*private static* - line 1564

A validated MoSCoW value in lower case, or null for none.

```php
function moscow($v): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |

### stageOf

*private static* - line 1573

A validated stage id of this project, or null for none.

```php
function stageOf(PDO $conn, int $projectId, $stageId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$stageId` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1576 | `ProjectToolsService::stageOf` | read [project_stages](/code/tables/project_stages.md) |  |

### roleId

*private static* - line 1583

A validated project role id, or null for none.

```php
function roleId(PDO $conn, $v): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$v` |  |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1586 | `ProjectToolsService::roleId` | read [project_roles](/code/tables/project_roles.md) |  |

### roleName

*private static* - line 1593

The name of a project role, or null.

```php
function roleName(PDO $conn, ?int $id): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1596 | `ProjectToolsService::roleName` | read [project_roles](/code/tables/project_roles.md) |  |

### memberName

*private static* - line 1602

The name of a project member - analyst, team, portal user or contractor - or #id.

```php
function memberName(PDO $conn, int $memberId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$memberId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1605 | `ProjectToolsService::memberName` | read [project_members](/code/tables/project_members.md), read [analysts](/code/tables/analysts.md), read [teams](/code/tables/teams.md), read [users](/code/tables/users.md) |  |

### mustExist

*private static* - line 1613

Runs a one-id lookup query and throws a validation error with `$msg` when it finds nothing.

```php
function mustExist(PDO $conn, string $sql, int $id, string $msg): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$sql` | `string` |  |  |
| `$id` | `int` |  |  |
| `$msg` | `string` |  |  |

### str

*private static* - line 1621

Trimmed text cut to `$max` characters, or null when blank.

```php
function str($v, int $max): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

### src

*private static* - line 1629

The history source for the actor: 'api' or 'app'.

```php
function src(ActorContext $ctx): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |

### saveBudgetLine

*public static* - line 1639

Create (no id) or update a budget line. Returns its id.

```php
function saveBudgetLine(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1672 | `ProjectToolsService::saveBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1678 | `ProjectToolsService::saveBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1681 | `ProjectToolsService::saveBudgetLine` | **update** [project_budget_lines](/code/tables/project_budget_lines.md) (`title`, `category`, `planned_amount`, `actual_amount`, `contract_id`, `cost_centre_id`, `notes`, `updated_datetime`) |  |
| 1686 | `ProjectToolsService::saveBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1687 | `ProjectToolsService::saveBudgetLine` | **insert** [project_budget_lines](/code/tables/project_budget_lines.md) (`project_id`, `title`, `category`, `planned_amount`, `actual_amount`, `contract_id`, `cost_centre_id`, `notes`, `position`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md)

### budgetLineWhen

*private static* - line 1700

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
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$lineId` | `int` |  |  |
| `$plannedDate` | `?string` |  |  |
| `$spentDate` | `?string` |  |  |
| `$forecast` | `?float` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1703 | `ProjectToolsService::budgetLineWhen` | **update** [project_budget_lines](/code/tables/project_budget_lines.md) (`planned_date`, `spent_date`, `forecast_amount`) |  |

### deleteBudgetLine

*public static* - line 1710

Deletes a budget line, records it in the project's history, and checks health and tolerances again.

```php
function deleteBudgetLine(PDO $conn, ActorContext $ctx, int $projectId, int $lineId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$lineId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1713 | `ProjectToolsService::deleteBudgetLine` | read [project_budget_lines](/code/tables/project_budget_lines.md) |  |
| 1717 | `ProjectToolsService::deleteBudgetLine` | **delete** [project_budget_lines](/code/tables/project_budget_lines.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### addProjectRate

*public static* - line 1728

The project's own hourly rate from a date (labour mode "rate"), in the project's currency. Each rate is a new row: the old one still prices the time logged before the new one's date.

```php
function addProjectRate(PDO $conn, ActorContext $ctx, int $projectId, $rate, ?string $from): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$rate` |  |  |  |
| `$from` | `?string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1738 | `ProjectToolsService::addProjectRate` | **insert** [project_labour_rates](/code/tables/project_labour_rates.md) (`scope`, `ref_id`, `hourly_rate`, `effective_from`, `created_by_id`, `created_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### deleteProjectRate

*public static* - line 1746

Remove one of the project's own rates (entered by mistake).

```php
function deleteProjectRate(PDO $conn, ActorContext $ctx, int $projectId, string $from): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$from` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1750 | `ProjectToolsService::deleteProjectRate` | **delete** [project_labour_rates](/code/tables/project_labour_rates.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### setCurrency

*public static* - line 1761

Change the project's currency - a RELABEL: amounts are not converted, and the page says so before anyone presses Save. Only when Projects -> Settings -> Budget lets projects choose.

```php
function setCurrency(PDO $conn, ActorContext $ctx, int $projectId, string $code): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$code` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1770 | `ProjectToolsService::setCurrency` | **update** [projects](/code/tables/projects.md) (`currency`, `updated_datetime`) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### announce

*public static* - line 1789

Announce planned disruption from a project - "Move day: phones down Saturday". How depends on Projects -> Settings -> General: planned planned maintenance: upcoming until its start, then an incident now the same, starting now - an incident straight away off refused (the button is not shown) Needs Service Status as well as being allowed to change the project. Service Status is install-wide, like contracts: no company check on the services. Returns the planned maintenance id.

```php
function announce(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1793 | `ProjectToolsService::announce` | read [projects](/code/tables/projects.md) |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### withdrawAnnouncement

*public static* - line 1814

Withdraw an announcement that has not started. It must belong to this project.

```php
function withdrawAnnouncement(PDO $conn, ActorContext $ctx, int $projectId, int $plannedId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$plannedId` | `int` |  |  |

**Called from:** [api/projects/tools.php](/code/files/api/projects/tools.php.md)

### announcements

*public static* - line 1832

What the Connections tab needs: the mode, this project's announcements, and the services and impact levels for the dialog. null when the analyst cannot open Service Status - then the panel is not drawn at all.

```php
function announcements(PDO $conn, int $analystId, int $projectId): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1841 | `ProjectToolsService::announcements` | read [status_services](/code/tables/status_services.md) |  |
| 1842 | `ProjectToolsService::announcements` | read [service_impact_levels](/code/tables/service_impact_levels.md) |  |

**Called from:** [api/projects/get.php](/code/files/api/projects/get.php.md), [api/projects/tools.php](/code/files/api/projects/tools.php.md)

