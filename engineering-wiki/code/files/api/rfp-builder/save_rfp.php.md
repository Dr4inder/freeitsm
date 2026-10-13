# api/rfp-builder/save_rfp.php

> API endpoint - 99 lines

## The endpoint

| | |
|---|---|
| URL | `api/rfp-builder/save_rfp.php` |
| Protected by | Module access: contracts (requireModuleAccessJson) |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 70 |  | **update** [rfps](/code/tables/rfps.md) (`name`, `status`, `style_guide`, `contract_id`, `chosen_supplier_id`, `updated_datetime`) |  |
| 81 |  | **update** [rfps](/code/tables/rfps.md) (`tenant_id`) |  |
| 83 |  | **insert** [rfps](/code/tables/rfps.md) (`name`, `status`, `style_guide`, `contract_id`, `chosen_supplier_id`, `created_by_analyst_id`) |  |
| 92 |  | **update** [rfps](/code/tables/rfps.md) (`tenant_id`) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rfp_scope.php](/code/files/includes/rfp_scope.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md)

**Calls:** [analystCanAccessTenant()](/code/functions/analystCanAccessTenant.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [contractCanView()](/code/functions/contractCanView.md), [contractTenantOf()](/code/functions/contractTenantOf.md), [contractTenantReady()](/code/functions/contractTenantReady.md), [getActiveTenantId()](/code/functions/getActiveTenantId.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [rfpGate()](/code/functions/rfpGate.md), [rfpTenantOf()](/code/functions/rfpTenantOf.md), [rfpTenantReady()](/code/functions/rfpTenantReady.md)

