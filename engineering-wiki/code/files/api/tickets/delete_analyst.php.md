# api/tickets/delete_analyst.php

> API endpoint - 70 lines

API Endpoint: Delete an analyst

## The endpoint

| | |
|---|---|
| URL | `api/tickets/delete_analyst.php` |
| Protected by | Administrators only (admin_api_guard.php) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 |  | read [analysts](/code/tables/analysts.md) |  |
| 49 |  | read [analysts](/code/tables/analysts.md) |  |
| 51 |  | read [analysts](/code/tables/analysts.md) |  |
| 59 |  | **delete** [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/admin_api_guard.php](/code/files/includes/admin_api_guard.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md)

