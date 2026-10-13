# api/problem-management/delete_problem_status.php

> API endpoint - 23 lines

## The endpoint

| | |
|---|---|
| URL | `api/problem-management/delete_problem_status.php` |
| Protected by | Module access: problems (requireModuleAccessJson); Permission: Cap::PROBLEMS_STATUSES (requireCapabilityJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 15 |  | read [problems](/code/tables/problems.md) |  |
| 18 |  | read [problem_statuses](/code/tables/problem_statuses.md) |  |
| 19 |  | **delete** [problem_statuses](/code/tables/problem_statuses.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireCapabilityJson()](/code/functions/requireCapabilityJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [wf_emit()](/code/functions/wf_emit.md)

