# api/system/debug-tools/D001_demo_core_import.php

> API endpoint - 530 lines

Debug Tool D001 — Demo Core Data Import

Captures everything we might want to know when a user reports that clicking
"Import Core Data" on the Demo Data screen doesn't work. Designed to be run
once and emailed back — assumes nothing about the surrounding code, so it
works even if the import script, JSON file, config, DB or schema is broken.

Output: plain text, section-delimited with === HEADERS === for easy skimming.

## The endpoint

| | |
|---|---|
| URL | `api/system/debug-tools/D001_demo_core_import.php` |
| Protected by | Signed-in analyst (session check) |
| Reads | `POST module` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [addSection()](/code/functions/addSection.md) | 23 |  |
| [bool_str()](/code/functions/bool_str.md) | 27 |  |
| [safe_size()](/code/functions/safe_size.md) | 28 |  |
| [redact_row()](/code/functions/redact_row.md) | 33 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 360 |  | **insert** [analyst_teams](/code/tables/analyst_teams.md) (`analyst_id`, `team_id`) |  |
| 371 |  | **insert** [department_teams](/code/tables/department_teams.md) (`department_id`, `team_id`) |  |

## How it hangs together

**Includes:** [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [analystIsAdmin()](/code/functions/analystIsAdmin.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [dbConnectionOptions()](/code/functions/dbConnectionOptions.md)

