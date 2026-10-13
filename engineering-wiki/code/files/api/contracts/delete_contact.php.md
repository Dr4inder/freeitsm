# api/contracts/delete_contact.php

> API endpoint - 33 lines

## The endpoint

| | |
|---|---|
| URL | `api/contracts/delete_contact.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 24 |  | read [contacts](/code/tables/contacts.md) |  |
| 25 |  | **delete** [contacts](/code/tables/contacts.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [wf_emit()](/code/functions/wf_emit.md)

