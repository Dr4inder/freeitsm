# api/problem-management/save_problem_status.php

> API endpoint - 35 lines

## The endpoint

| | |
|---|---|
| URL | `api/problem-management/save_problem_status.php` |
| Protected by | Module access: problems (requireModuleAccessJson); Permission: Cap::PROBLEMS_STATUSES (requireCapabilityJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 21 |  | **update** [problem_statuses](/code/tables/problem_statuses.md) (`is_default`) |  |
| 23 |  | **update** [problem_statuses](/code/tables/problem_statuses.md) (`name`, `is_closed`, `colour`, `is_default`, `display_order`, `is_active`) |  |
| 28 |  | **insert** [problem_statuses](/code/tables/problem_statuses.md) (`name`, `is_closed`, `colour`, `is_default`, `display_order`, `is_active`) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireCapabilityJson()](/code/functions/requireCapabilityJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [wf_emit()](/code/functions/wf_emit.md)

