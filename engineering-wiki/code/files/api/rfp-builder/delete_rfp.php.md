# api/rfp-builder/delete_rfp.php

> API endpoint - 48 lines

## The endpoint

| | |
|---|---|
| URL | `api/rfp-builder/delete_rfp.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 30 |  | read [rfp_documents](/code/tables/rfp_documents.md) |  |
| 35 |  | **delete** [rfps](/code/tables/rfps.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rfp_scope.php](/code/files/includes/rfp_scope.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [rfpGate()](/code/functions/rfpGate.md)

