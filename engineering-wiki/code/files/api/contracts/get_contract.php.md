# api/contracts/get_contract.php

> API endpoint - 67 lines

## The endpoint

| | |
|---|---|
| URL | `api/contracts/get_contract.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |
| Reads | `GET id` |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 28 |  | read [contracts](/code/tables/contracts.md), read [suppliers](/code/tables/suppliers.md), read [analysts](/code/tables/analysts.md), read [contract_statuses](/code/tables/contract_statuses.md), read [payment_schedules](/code/tables/payment_schedules.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [contractOwnerSql()](/code/functions/contractOwnerSql.md), [contractPartyLabel()](/code/functions/contractPartyLabel.md), [contractPartySql()](/code/functions/contractPartySql.md), [contractVisibilitySql()](/code/functions/contractVisibilitySql.md), [costCentreSelectSql()](/code/functions/costCentreSelectSql.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md)

