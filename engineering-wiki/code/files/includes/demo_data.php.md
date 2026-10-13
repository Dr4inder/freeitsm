# includes/demo_data.php

> PHP - 208 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [demoAfterImport()](/code/functions/demoAfterImport.md) | 36 | After a module's rows are in, inside the import's transaction (3.3.0). |
| [demoDataPath()](/code/functions/demoDataPath.md) | 60 |  |
| [demoTablesWithInserts()](/code/functions/demoTablesWithInserts.md) | 73 | The tables a parsed demo module actually INSERTS into. |
| [demoModuleTables()](/code/functions/demoModuleTables.md) | 90 | As above, but reads the module's JSON from disk. Returns [] if unreadable. |
| [demoRowCount()](/code/functions/demoRowCount.md) | 104 | How many demo rows a module currently has in the database. |
| [demoBlockingModules()](/code/functions/demoBlockingModules.md) | 129 | Which other demo modules are holding a table down. |
| [demoDuplicateExplanation()](/code/functions/demoDuplicateExplanation.md) | 167 | Explain a unique-key collision during an import in terms of its actual cause. |
| [demoHasUntaggedImport()](/code/functions/demoHasUntaggedImport.md) | 199 | Does this installation hold demo data from BEFORE the rows were tagged? |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `demoAfterImport` | read [project_baselines](/code/tables/project_baselines.md) |  |
| 43 | `demoAfterImport` | **update** [project_baselines](/code/tables/project_baselines.md) (`snapshot`, `start_date`, `target_end_date`, `budget_planned`, `task_count`, `estimate_hours`, `must_count`) |  |
| 201 | `demoHasUntaggedImport` | read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [includes/projects/control.php](/code/files/includes/projects/control.php.md)

**Included by:** [api/system/check_demo_core.php](/code/files/api/system/check_demo_core.php.md), [api/system/import_demo_data.php](/code/files/api/system/import_demo_data.php.md)

**Calls:** [projectPlanSnapshot()](/code/functions/projectPlanSnapshot.md)

