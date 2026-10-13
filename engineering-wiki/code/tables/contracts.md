# contracts

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `tenant_id` | `INT NULL` | The company that OWNS the contract (3.5.0) - scoped data, like assets: NULL = the Default company, never "shared". Who it is WITH is the separate party below. See includes/contract_party.php. |
| `contract_number` | `VARCHAR(50) NOT NULL` |  |
| `title` | `VARCHAR(255) NOT NULL` |  |
| `description` | `LONGTEXT NULL` |  |
| `supplier_id` | `INT NULL` |  |
| `party_type` | `VARCHAR(10) NOT NULL DEFAULT 'supplier'` | Who the contract is WITH (#153). 'supplier' = we buy (supplier_id), as every contract was before; 'customer' = we sell, to a company and/or a person. Who may SEE a contract is decided by its owning company (tenant_id) since 3.5.0; until then a customer contract was hidden by its customer's company. |
| `customer_tenant_id` | `INT NULL` |  |
| `customer_user_id` | `INT NULL` |  |
| `contract_owner_id` | `INT NULL` |  |
| `contract_status_id` | `INT NULL` |  |
| `contract_start` | `DATE NULL` |  |
| `contract_end` | `DATE NULL` |  |
| `notice_period_days` | `INT NULL` |  |
| `notice_date` | `DATE NULL` |  |
| `contract_value` | `DECIMAL(18,2) NULL` |  |
| `currency` | `VARCHAR(3) NULL` |  |
| `payment_schedule_id` | `INT NULL` |  |
| `cost_centre` | `VARCHAR(100) NULL` |  |
| `cost_centre_id` | `INT NULL` | 'cost_centre' above is the free text from before 3.5.0, shown until a cost centre is chosen. GH #160: the cost centre it is charged to - see includes/cost_centre_assign.php |
| `dms_link` | `VARCHAR(500) NULL` |  |
| `terms_status` | `VARCHAR(20) NULL` |  |
| `personal_data_transferred` | `TINYINT(1) NULL` |  |
| `dpia_required` | `TINYINT(1) NULL` |  |
| `dpia_completed_date` | `DATE NULL` |  |
| `dpia_dms_link` | `VARCHAR(500) NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/contracts/delete_contract_status.php](/code/files/api/contracts/delete_contract_status.php.md):30 |  | update | `contract_status_id` |  |
| [api/contracts/delete_payment_schedule.php](/code/files/api/contracts/delete_payment_schedule.php.md):30 |  | update | `payment_schedule_id` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):1668 |  | update | `tenant_id` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):1673 |  | update | `tenant_id` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):1689 |  | update | `cost_centre_id`, `cost_centre` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):59 | `ContractsService::saveContract` | update | `contract_number`, `title`, `description`, `supplier_id`, `contract_owner_id`, `contract_status_id`, `contract_start`, `contract_end`, `notice_period_days`, `notice_date` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):81 | `ContractsService::saveContract` | insert | `contract_number`, `title`, `description`, `supplier_id`, `contract_owner_id`, `contract_status_id`, `contract_start`, `contract_end`, `notice_period_days`, `notice_date` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):109 | `ContractsService::deleteContract` | delete |  |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):223 | `ContractsService::deleteSupplier` | update | `supplier_id` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):371 | `ContractsService::writeCostCentre` | update | `cost_centre_id` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):377 | `ContractsService::writeTenant` | update | `tenant_id` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):424 | `ContractsService::writeParty` | update | `party_type`, `customer_tenant_id`, `customer_user_id` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/get_assets.php](/code/files/api/assets/get_assets.php.md) | L225 |  |
| [api/assets/leases/options.php](/code/files/api/assets/leases/options.php.md) | L42 |  |
| [api/assets/search_linkable_contracts.php](/code/files/api/assets/search_linkable_contracts.php.md) | L62 |  |
| [api/contracts/get_contract.php](/code/files/api/contracts/get_contract.php.md) | L28 |  |
| [api/contracts/get_contracts.php](/code/files/api/contracts/get_contracts.php.md) | L24 |  |
| [api/contracts/get_dashboard_stats.php](/code/files/api/contracts/get_dashboard_stats.php.md) | L25 |  |
| [api/rfp-builder/get_rfp.php](/code/files/api/rfp-builder/get_rfp.php.md) | L28 |  |
| [api/rfp-builder/get_rfps.php](/code/files/api/rfp-builder/get_rfps.php.md) | L27 |  |
| [api/system/global_search.php](/code/files/api/system/global_search.php.md) | L303 |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) | apiContractSelect L60, apiSupplierSelect L140, apiContractsList L296 |  |
| [includes/contract_assets.php](/code/files/includes/contract_assets.php.md) | contractsForAsset L109 |  |
| [includes/contract_party.php](/code/files/includes/contract_party.php.md) | contractTenantReady L36, contractTenantOf L44, contractPartyReady L63, contractCanView L128 |  |
| [includes/contract_report.php](/code/files/includes/contract_report.php.md) | contractReportLoad L147 |  |
| [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md) | costCentreUsage L133 |  |
| [includes/domains/read.php](/code/files/includes/domains/read.php.md) | domainDetail L150, domainApiLookups L181 |  |
| [includes/leases.php](/code/files/includes/leases.php.md) | leaseGet L333 |  |
| [includes/people.php](/code/files/includes/people.php.md) | peopleContracts L390, peopleSupplierRows L619, peopleSupplierContracts L755 |  |
| [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) | projectBudgetTotals L168, projectBudgetDetail L399, projectBudgetContracts L481 |  |
| [includes/projects/links.php](/code/files/includes/projects/links.php.md) | projectLinkDescribe L190, projectLinkSearch L318 |  |
| [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) | recentTrailLabelsForType L512 |  |
| [includes/record_preview.php](/code/files/includes/record_preview.php.md) | recordPreviewContract L351 |  |
| [includes/services/calendar.php](/code/files/includes/services/calendar.php.md) | CalendarService::collectEventFields L225 |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md) | ContractsService::assertNumberFree L287, ContractsService::assertNumberFree L290, ContractsService::assertVisible L388 |  |
| [includes/services/domains.php](/code/files/includes/services/domains.php.md) | DomainsService::assertContractVisible L846, DomainsService::auditDisplay L871 |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md) | TasksService::validateLink L1295 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolSupplierContact L719, warbotToolSupplierContact L736 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L481 |  |
| [includes/workflow_scheduled.php](/code/files/includes/workflow_scheduled.php.md) | workflowEmitContractExpiries L130 |  |

