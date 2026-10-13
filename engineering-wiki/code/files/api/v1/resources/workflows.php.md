# api/v1/resources/workflows.php

> API endpoint - 452 lines

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
| [apiWorkflowSelect()](/code/functions/apiWorkflowSelect.md) | 40 | The SELECT for workflows, with the creator's name. |
| [apiSerializeWorkflow()](/code/functions/apiSerializeWorkflow.md) | 51 | Shapes a workflow row for the API - trigger, active flag, people, dates, last run and run count, plus the full conditions and actions when `$full` (only their counts otherwise). |
| [apiLoadWorkflow()](/code/functions/apiLoadWorkflow.md) | 82 | Loads one workflow row, or answers 404 and stops. |
| [apiWorkflowExecutionSelect()](/code/functions/apiWorkflowExecutionSelect.md) | 96 | The SELECT for workflow executions, keeping the workflow's name from the snapshot when the workflow has since been deleted. |
| [apiSerializeWorkflowExecution()](/code/functions/apiSerializeWorkflowExecution.md) | 108 | Shapes a workflow execution for the API - workflow, trigger, status, times and error, plus the trigger payload and step log when `$full`. |
| [apiValidateWorkflowConditions()](/code/functions/apiValidateWorkflowConditions.md) | 133 | Validate a conditions array. Returns it normalised (list of objects). |
| [apiValidateWorkflowActions()](/code/functions/apiValidateWorkflowActions.md) | 157 | Validate an actions array against the engine's action catalogue. |
| [apiValidateWorkflowTrigger()](/code/functions/apiValidateWorkflowTrigger.md) | 181 | Validate a trigger event name against the engine's catalogue. |
| [apiWorkflowsList()](/code/functions/apiWorkflowsList.md) | 193 | GET /workflows |
| [apiWorkflowsGet()](/code/functions/apiWorkflowsGet.md) | 223 | GET /workflows/{id} |
| [apiWorkflowsCreate()](/code/functions/apiWorkflowsCreate.md) | 228 | POST /workflows |
| [apiWorkflowsUpdate()](/code/functions/apiWorkflowsUpdate.md) | 254 | PATCH /workflows/{id} |
| [apiWorkflowsDelete()](/code/functions/apiWorkflowsDelete.md) | 294 | DELETE /workflows/{id} — executions survive (the module's audit-trail intent) but are detached explicitly: name snapshot filled, workflow_id NULLed. Explicit rather than FK-reliant so grown installs that haven't re-run Database Verification behave identically. |
| [apiWorkflowsFire()](/code/functions/apiWorkflowsFire.md) | 315 | POST /workflows/{id}/fire — manual test fire with a synthetic payload. |
| [apiWorkflowExecutionsRespondList()](/code/functions/apiWorkflowExecutionsRespondList.md) | 333 | Shared list plumbing for both execution list routes. |
| [apiWorkflowExecutionsList()](/code/functions/apiWorkflowExecutionsList.md) | 371 | GET /workflows/{id}/executions |
| [apiWorkflowExecutionsListAll()](/code/functions/apiWorkflowExecutionsListAll.md) | 378 | GET /workflow-executions — install-wide, including orphaned runs whose workflow has been deleted (filter with ?workflow_id or ?orphaned=true). |
| [apiWorkflowExecutionsGet()](/code/functions/apiWorkflowExecutionsGet.md) | 392 | GET /workflow-executions/{id} — full detail with payload + step log. |
| [apiWorkflowTriggersList()](/code/functions/apiWorkflowTriggersList.md) | 409 | GET /workflow-triggers — every trigger with its condition fields, each field's type and the operators valid for it. |
| [apiWorkflowActionsList()](/code/functions/apiWorkflowActionsList.md) | 428 | GET /workflow-actions — every action type with its args spec (labels, required flags, lookup sources, template-variable support). |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 41 | `apiWorkflowSelect` | read [workflows](/code/tables/workflows.md), read [analysts](/code/tables/analysts.md) |  |
| 99 | `apiWorkflowExecutionSelect` | read [workflow_executions](/code/tables/workflow_executions.md), read [workflows](/code/tables/workflows.md) |  |
| 238 | `apiWorkflowsCreate` | **insert** [workflows](/code/tables/workflows.md) (`name`, `description`, `trigger_event`, `conditions`, `actions`, `is_active`, `created_by`, `created_datetime`, `updated_datetime`) |  |
| 281 | `apiWorkflowsUpdate` | **update** [workflows](/code/tables/workflows.md) (`name`, `description`, `trigger_event`, `conditions`, `actions`, `is_active`, `updated_datetime`) |  |
| 299 | `apiWorkflowsDelete` | **update** [workflow_executions](/code/tables/workflow_executions.md) (`workflow_name`, `workflow_id`) |  |
| 303 | `apiWorkflowsDelete` | **delete** [workflows](/code/tables/workflows.md) |  |
| 350 | `apiWorkflowExecutionsRespondList` | read [workflow_executions](/code/tables/workflow_executions.md) |  |

## How it hangs together

**Includes:** [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDate()](/code/functions/apiParseDate.md), [apiRespond()](/code/functions/apiRespond.md)

