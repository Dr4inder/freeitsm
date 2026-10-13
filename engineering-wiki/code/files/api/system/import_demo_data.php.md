# api/system/import_demo_data.php

> API endpoint - 450 lines

API Endpoint: Import Demo Data Imports sample data for a specific module from database/demo-data/{module}.json Accepts POST parameter: module (required)

## The endpoint

| | |
|---|---|
| URL | `api/system/import_demo_data.php` |
| Protected by | Administrators only (admin_api_guard.php) |
| Reads | `POST module` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [getPrimaryKeyColumn()](/code/functions/getPrimaryKeyColumn.md) | 27 |  |
| [resolveReferences()](/code/functions/resolveReferences.md) | 37 |  |
| [resolveTokens()](/code/functions/resolveTokens.md) | 51 |  |
| [processMapperDefaultSize()](/code/functions/processMapperDefaultSize.md) | 83 |  |
| [autoLayoutProcessMapper()](/code/functions/autoLayoutProcessMapper.md) | 96 |  |
| [generateDemoTicketNumber()](/code/functions/generateDemoTicketNumber.md) | 202 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 208 | `generateDemoTicketNumber` | read [tickets](/code/tables/tickets.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/admin_api_guard.php](/code/files/includes/admin_api_guard.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/demo_data.php](/code/files/includes/demo_data.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [demoAfterImport()](/code/functions/demoAfterImport.md), [demoBlockingModules()](/code/functions/demoBlockingModules.md), [demoDuplicateExplanation()](/code/functions/demoDuplicateExplanation.md), [demoTablesWithInserts()](/code/functions/demoTablesWithInserts.md)

