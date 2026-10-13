# api/problem-management/save_problem_priority.php

> API endpoint - 34 lines

## The endpoint

| | |
|---|---|
| URL | `api/problem-management/save_problem_priority.php` |
| Protected by | Module access: problems (requireModuleAccessJson); Permission: Cap::PROBLEMS_PRIORITIES (requireCapabilityJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 20 |  | **update** [problem_priorities](/code/tables/problem_priorities.md) (`is_default`) |  |
| 22 |  | **update** [problem_priorities](/code/tables/problem_priorities.md) (`name`, `colour`, `is_default`, `display_order`, `is_active`) |  |
| 27 |  | **insert** [problem_priorities](/code/tables/problem_priorities.md) (`name`, `colour`, `is_default`, `display_order`, `is_active`) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireCapabilityJson()](/code/functions/requireCapabilityJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [wf_emit()](/code/functions/wf_emit.md)

