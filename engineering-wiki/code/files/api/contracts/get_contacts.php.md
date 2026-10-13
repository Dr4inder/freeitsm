# api/contracts/get_contacts.php

> API endpoint - 45 lines

## The endpoint

| | |
|---|---|
| URL | `api/contracts/get_contacts.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |
| Reads | `GET supplier_id` |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 18 |  | read [contacts](/code/tables/contacts.md), read [suppliers](/code/tables/suppliers.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

