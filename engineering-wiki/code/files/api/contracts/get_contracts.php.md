# api/contracts/get_contracts.php

> API endpoint - 83 lines

## The endpoint

| | |
|---|---|
| URL | `api/contracts/get_contracts.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |
| Reads | `GET search`, `GET limit`, `GET party` |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 24 |  | read [contracts](/code/tables/contracts.md), read [suppliers](/code/tables/suppliers.md), read [analysts](/code/tables/analysts.md), read [contract_statuses](/code/tables/contract_statuses.md), read [payment_schedules](/code/tables/payment_schedules.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [contractListSql()](/code/functions/contractListSql.md), [contractOwnerSql()](/code/functions/contractOwnerSql.md), [contractPartyLabel()](/code/functions/contractPartyLabel.md), [contractPartyReady()](/code/functions/contractPartyReady.md), [contractPartySql()](/code/functions/contractPartySql.md), [costCentreSelectSql()](/code/functions/costCentreSelectSql.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

