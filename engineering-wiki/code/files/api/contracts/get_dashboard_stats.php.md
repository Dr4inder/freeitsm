# api/contracts/get_dashboard_stats.php

> API endpoint - 47 lines

## The endpoint

| | |
|---|---|
| URL | `api/contracts/get_dashboard_stats.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 25 |  | read [contracts](/code/tables/contracts.md) |  |
| 34 |  | read [suppliers](/code/tables/suppliers.md) |  |
| 37 |  | read [contacts](/code/tables/contacts.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [contractListSql()](/code/functions/contractListSql.md), [contractPartyReady()](/code/functions/contractPartyReady.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

