# api/v1/resources/contracts.php

> API endpoint - 557 lines

FreeITSM REST API v1 — contracts resource (contracts, suppliers, contacts, contract terms). The RFP Builder is deliberately NOT exposed (internal-only by design).

Mirrors the module's internal endpoints:
  - contract create/update mirror save_contract.php (contract_number +
    title mandatory, everything else nullable, is_active default 1);
  - supplier create/update mirror save_supplier.php — plus the API can set
    `supplies_assets` (the UI never writes it; it's the flag the Assets
    module filters suppliers by, so integrations need it);
  - contract terms mirror save_contract_terms.php's per-tab upsert;
  - supplier delete mirrors delete_supplier.php's explicit nullify-then-
    delete; contract delete FIXES the internal endpoint's orphan bug by
    removing contract_term_values explicitly (the contracts domain
    historically had no foreign keys at all — see changelog #691).

Deliberate API improvements, documented: duplicate contract_number on
create → 409 (no DB unique exists and the UI allows dupes — machines
shouldn't create them); lookup ids validated with friendly 422s; renewal
filters mirror the Watchtower/dashboard SQL shapes (expiring_within_days,
notice_within_days, expired).

Every contract belongs to a COMPANY (3.5.0) - `company` in the payload, NULL
stored as the Default company. A key sees only contracts in companies its
scope reaches (one not reached is a 404, never a 403, so ids cannot be
probed); a new contract lands in `company_id` (checked against the key) or the
key's default company; PATCH with `company_id` moves one, refused while it has
assets, projects or RFPs in its old company. Contract numbers are unique per
company. Who it is WITH is `party_type` / `customer`, set independently. No
audit trail exists in the product and none is invented here.

Contract / supplier / term WRITES are delegated to ContractsService
(includes/services/contracts.php); the read handlers + serializers, the
supplier CONTACTS endpoints, and the read-only lookup lists stay here.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/contracts.php` |
| Protected by | REST API key |
| Reads | `GET is_active`, `GET party_type`, `GET company_id`, `GET q`, `GET expiring_within_days`, `GET expired`, `GET notice_within_days`, `GET sort` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiContractSelect()](/code/functions/apiContractSelect.md) | 49 |  |
| [apiContractVisibility()](/code/functions/apiContractVisibility.md) | 75 | The key's view of customer contracts (#153): " AND (...)" + its args. |
| [apiSerializeContract()](/code/functions/apiSerializeContract.md) | 79 |  |
| [apiLoadContract()](/code/functions/apiLoadContract.md) | 128 |  |
| [apiSupplierSelect()](/code/functions/apiSupplierSelect.md) | 139 |  |
| [apiSerializeSupplier()](/code/functions/apiSerializeSupplier.md) | 150 |  |
| [apiLoadSupplier()](/code/functions/apiLoadSupplier.md) | 184 |  |
| [apiContractsList()](/code/functions/apiContractsList.md) | 197 | GET /contracts |
| [apiContractsGet()](/code/functions/apiContractsGet.md) | 310 |  |
| [apiContractCompany()](/code/functions/apiContractCompany.md) | 322 | `company_id` from a request body as the service's tenant_id: checked to exist and to be in the key's reach (403), or - on a create with none - the key's default company. On an update with none, nothing: the contract stays put. |
| [apiContractsCreate()](/code/functions/apiContractsCreate.md) | 336 |  |
| [apiContractsUpdate()](/code/functions/apiContractsUpdate.md) | 347 | PATCH /contracts/{id} |
| [apiContractsDelete()](/code/functions/apiContractsDelete.md) | 358 | DELETE /contracts/{id} — explicit children (the contracts domain had no FKs) |
| [apiContractTermsGet()](/code/functions/apiContractTermsGet.md) | 368 | Contract terms — GET + bulk upsert (mirrors save_contract_terms.php) |
| [apiContractTermsSave()](/code/functions/apiContractTermsSave.md) | 387 |  |
| [apiSuppliersGet()](/code/functions/apiSuppliersGet.md) | 397 | Suppliers — full CRUD (GET /suppliers stays the lite reference list) |
| [apiSuppliersCreate()](/code/functions/apiSuppliersCreate.md) | 408 |  |
| [apiSuppliersUpdate()](/code/functions/apiSuppliersUpdate.md) | 415 |  |
| [apiSuppliersDelete()](/code/functions/apiSuppliersDelete.md) | 423 | DELETE /suppliers/{id} — mirrors delete_supplier.php's explicit nullify-then-delete. |
| [apiSerializeContact()](/code/functions/apiSerializeContact.md) | 433 | Supplier contacts |
| [apiSupplierContactsList()](/code/functions/apiSupplierContactsList.md) | 447 |  |
| [apiSupplierContactsCreate()](/code/functions/apiSupplierContactsCreate.md) | 457 |  |
| [apiSupplierContactsUpdate()](/code/functions/apiSupplierContactsUpdate.md) | 482 |  |
| [apiSupplierContactsDelete()](/code/functions/apiSupplierContactsDelete.md) | 514 |  |
| [apiContractLookupList()](/code/functions/apiContractLookupList.md) | 528 | Reference lookups |
| [apiContractStatusesList()](/code/functions/apiContractStatusesList.md) | 542 |  |
| [apiPaymentSchedulesList()](/code/functions/apiPaymentSchedulesList.md) | 545 |  |
| [apiSupplierTypesList()](/code/functions/apiSupplierTypesList.md) | 548 |  |
| [apiSupplierStatusesList()](/code/functions/apiSupplierStatusesList.md) | 551 |  |
| [apiContractTermTabsList()](/code/functions/apiContractTermTabsList.md) | 554 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 58 | `apiContractSelect` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 60 | `apiContractSelect` | read [contracts](/code/tables/contracts.md), read [suppliers](/code/tables/suppliers.md), read [analysts](/code/tables/analysts.md), read [contract_statuses](/code/tables/contract_statuses.md), read [payment_schedules](/code/tables/payment_schedules.md) |  |
| 140 | `apiSupplierSelect` | read [contacts](/code/tables/contacts.md), read [contracts](/code/tables/contracts.md), read [suppliers](/code/tables/suppliers.md), read [supplier_types](/code/tables/supplier_types.md), read [supplier_statuses](/code/tables/supplier_statuses.md) |  |
| 296 | `apiContractsList` | read [contracts](/code/tables/contracts.md), read [suppliers](/code/tables/suppliers.md) |  |
| 371 | `apiContractTermsGet` | read [contract_term_tabs](/code/tables/contract_term_tabs.md), read [contract_term_values](/code/tables/contract_term_values.md) |  |
| 400 | `apiSuppliersGet` | read [contacts](/code/tables/contacts.md) |  |
| 450 | `apiSupplierContactsList` | read [contacts](/code/tables/contacts.md) |  |
| 469 | `apiSupplierContactsCreate` | **insert** [contacts](/code/tables/contacts.md) (`supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`, `created_datetime`) |  |
| 477 | `apiSupplierContactsCreate` | read [contacts](/code/tables/contacts.md) |  |
| 485 | `apiSupplierContactsUpdate` | read [contacts](/code/tables/contacts.md) |  |
| 504 | `apiSupplierContactsUpdate` | **update** [contacts](/code/tables/contacts.md) (`first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`) |  |
| 509 | `apiSupplierContactsUpdate` | read [contacts](/code/tables/contacts.md) |  |
| 517 | `apiSupplierContactsDelete` | **delete** [contacts](/code/tables/contacts.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/contracts.php](/code/files/includes/services/contracts.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiPagination()](/code/functions/apiPagination.md), [apiParseDateOnly()](/code/functions/apiParseDateOnly.md), [apiRespond()](/code/functions/apiRespond.md), [contractOwnerSql()](/code/functions/contractOwnerSql.md), [contractPartyReady()](/code/functions/contractPartyReady.md), [contractPartySql()](/code/functions/contractPartySql.md), [contractTenantReady()](/code/functions/contractTenantReady.md), [contractVisibilitySqlForScope()](/code/functions/contractVisibilitySqlForScope.md), [costCentreReady()](/code/functions/costCentreReady.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

