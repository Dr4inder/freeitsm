# api/v1/resources/workflows.php

> API endpoint - 437 lines

FreeITSM REST API v1 — workflows resource (definitions + executions).

Mirrors the module's internal endpoints (api/workflow/*):
  - definitions are single rows with conditions/actions as JSON — the API
    accepts and returns them as real JSON arrays, validated against the
    engine's own catalogues (WorkflowEngine::availableTriggers/Actions)
    exactly like save.php, so nothing unexecutable can be stored;
  - POST /workflows/{id}/fire is the editor's "Test fire" button —
    WorkflowEngine::manualFire() with a synthetic payload. Like the UI,
    manual fires do NOT bump run_count / last_run_* (test runs don't
    pollute production counters) but DO write an execution row;
  - executions are the engine's audit trail and are read-only over the
    API — only the engine writes them.

Deliberate improvements over the internal endpoints, documented:
  - unknown condition operators are a 422 (save.php stores them; the
    engine then silently fails the condition at run time — machines
    deserve the error at write time);
  - zero actions is still allowed (parity with save.php's draft-friendly
    behaviour) but conditions/actions entries must be objects;
  - deleting a workflow keeps its executions (the module's intent) but
    detaches them cleanly: workflow_id goes NULL and the workflow_name
    snapshot preserves attribution — no more dangling ids.

Workflow tables carry no tenant_id (install-wide, same posture as tasks
and forms). NOTE for key admins: workflows.fire and workflows.create are
powerful grants — actions run with engine privileges (create tickets,
send email from the ticket's mailbox), so scope those to trusted keys.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/workflows.php` |
| Protected by | REST API key |
| Reads | `GET trigger_event`, `GET is_active`, `GET q`, `GET status`, `GET started_since`, `GET workflow_id`, `GET orphaned` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiWorkflowSelect()](/code/functions/apiWorkflowSelect.md) | 39 |  |
| [apiSerializeWorkflow()](/code/functions/apiSerializeWorkflow.md) | 45 |  |
| [apiLoadWorkflow()](/code/functions/apiLoadWorkflow.md) | 75 |  |
| [apiWorkflowExecutionSelect()](/code/functions/apiWorkflowExecutionSelect.md) | 85 |  |
| [apiSerializeWorkflowExecution()](/code/functions/apiSerializeWorkflowExecution.md) | 93 |  |
| [apiValidateWorkflowConditions()](/code/functions/apiValidateWorkflowConditions.md) | 118 | Validate a conditions array. Returns it normalised (list of objects). |
| [apiValidateWorkflowActions()](/code/functions/apiValidateWorkflowActions.md) | 142 | Validate an actions array against the engine's action catalogue. |
| [apiValidateWorkflowTrigger()](/code/functions/apiValidateWorkflowTrigger.md) | 166 | Validate a trigger event name against the engine's catalogue. |
| [apiWorkflowsList()](/code/functions/apiWorkflowsList.md) | 178 |  |
| [apiWorkflowsGet()](/code/functions/apiWorkflowsGet.md) | 208 |  |
| [apiWorkflowsCreate()](/code/functions/apiWorkflowsCreate.md) | 213 |  |
| [apiWorkflowsUpdate()](/code/functions/apiWorkflowsUpdate.md) | 239 |  |
| [apiWorkflowsDelete()](/code/functions/apiWorkflowsDelete.md) | 279 |  |
| [apiWorkflowsFire()](/code/functions/apiWorkflowsFire.md) | 300 |  |
| [apiWorkflowExecutionsRespondList()](/code/functions/apiWorkflowExecutionsRespondList.md) | 318 | Shared list plumbing for both execution list routes. |
| [apiWorkflowExecutionsList()](/code/functions/apiWorkflowExecutionsList.md) | 356 |  |
| [apiWorkflowExecutionsListAll()](/code/functions/apiWorkflowExecutionsListAll.md) | 363 |  |
| [apiWorkflowExecutionsGet()](/code/functions/apiWorkflowExecutionsGet.md) | 377 |  |
| [apiWorkflowTriggersList()](/code/functions/apiWorkflowTriggersList.md) | 394 |  |
| [apiWorkflowActionsList()](/code/functions/apiWorkflowActionsList.md) | 413 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 40 | `apiWorkflowSelect` | read [workflows](/code/tables/workflows.md), read [analysts](/code/tables/analysts.md) |  |
| 88 | `apiWorkflowExecutionSelect` | read [workflow_executions](/code/tables/workflow_executions.md), read [workflows](/code/tables/workflows.md) |  |
| 223 | `apiWorkflowsCreate` | **insert** [workflows](/code/tables/workflows.md) (`name`, `description`, `trigger_event`, `conditions`, `actions`, `is_active`, `created_by`, `created_datetime`, `updated_datetime`) |  |
| 266 | `apiWorkflowsUpdate` | **update** [workflows](/code/tables/workflows.md) (`name`, `description`, `trigger_event`, `conditions`, `actions`, `is_active`, `updated_datetime`) |  |
| 284 | `apiWorkflowsDelete` | **update** [workflow_executions](/code/tables/workflow_executions.md) (`workflow_name`, `workflow_id`) |  |
| 288 | `apiWorkflowsDelete` | **delete** [workflows](/code/tables/workflows.md) |  |
| 335 | `apiWorkflowExecutionsRespondList` | read [workflow_executions](/code/tables/workflow_executions.md) |  |

## How it hangs together

**Includes:** [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md)

