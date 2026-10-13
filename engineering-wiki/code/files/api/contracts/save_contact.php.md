# api/contracts/save_contact.php

> API endpoint - 51 lines

## The endpoint

| | |
|---|---|
| URL | `api/contracts/save_contact.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 35 |  | **update** [contacts](/code/tables/contacts.md) (`supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`) |  |
| 39 |  | **insert** [contacts](/code/tables/contacts.md) (`supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [wf_emit()](/code/functions/wf_emit.md)

