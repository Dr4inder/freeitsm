# suppliers

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `legal_name` | `VARCHAR(255) NOT NULL` |  |
| `trading_name` | `VARCHAR(255) NULL` |  |
| `reg_number` | `VARCHAR(50) NULL` |  |
| `vat_number` | `VARCHAR(50) NULL` |  |
| `supplier_type_id` | `INT NULL` |  |
| `supplier_status_id` | `INT NULL` |  |
| `address_line_1` | `VARCHAR(255) NULL` |  |
| `address_line_2` | `VARCHAR(255) NULL` |  |
| `city` | `VARCHAR(100) NULL` |  |
| `county` | `VARCHAR(100) NULL` |  |
| `postcode` | `VARCHAR(20) NULL` |  |
| `country` | `VARCHAR(100) NULL` |  |
| `questionnaire_date_issued` | `DATE NULL` |  |
| `questionnaire_date_received` | `DATE NULL` |  |
| `comments` | `LONGTEXT NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `supplies_assets` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/assets/quick_add_supplier.php](/code/files/api/assets/quick_add_supplier.php.md):41 |  | update | `supplies_assets`, `is_active` |  |
| [api/assets/quick_add_supplier.php](/code/files/api/assets/quick_add_supplier.php.md):44 |  | insert | `legal_name`, `supplies_assets`, `is_active` |  |
| [api/assets/toggle_supplier_assets.php](/code/files/api/assets/toggle_supplier_assets.php.md):29 |  | update | `supplies_assets` |  |
| [api/contracts/delete_supplier_status.php](/code/files/api/contracts/delete_supplier_status.php.md):30 |  | update | `supplier_status_id` |  |
| [api/contracts/delete_supplier_type.php](/code/files/api/contracts/delete_supplier_type.php.md):30 |  | update | `supplier_type_id` |  |
| [api/rfp-builder/create_prospective_supplier.php](/code/files/api/rfp-builder/create_prospective_supplier.php.md):64 |  | insert | `legal_name`, `trading_name`, `supplier_status_id`, `comments`, `is_active` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3535 |  | insert | `legal_name`, `supplies_assets`, `is_active` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3539 |  | update | `supplies_assets` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):195 | `ContractsService::saveSupplier` | update | `legal_name`, `trading_name`, `reg_number`, `vat_number`, `supplier_type_id`, `supplier_status_id`, `address_line_1`, `address_line_2`, `city`, `county` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):205 | `ContractsService::saveSupplier` | insert | `legal_name`, `trading_name`, `reg_number`, `vat_number`, `supplier_type_id`, `supplier_status_id`, `address_line_1`, `address_line_2`, `city`, `county` |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):234 | `ContractsService::deleteSupplier` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/get_asset_suppliers.php](/code/files/api/assets/get_asset_suppliers.php.md) | L22 |  |
| [api/assets/get_assets.php](/code/files/api/assets/get_assets.php.md) | L287 |  |
| [api/assets/leases/options.php](/code/files/api/assets/leases/options.php.md) | L30 |  |
| [api/assets/quick_add_supplier.php](/code/files/api/assets/quick_add_supplier.php.md) | L36 |  |
| [api/assets/search_linkable_contracts.php](/code/files/api/assets/search_linkable_contracts.php.md) | L62 |  |
| [api/assets/search_suppliers.php](/code/files/api/assets/search_suppliers.php.md) | L23 |  |
| [api/contracts/get_contacts.php](/code/files/api/contracts/get_contacts.php.md) | L24 |  |
| [api/contracts/get_contract.php](/code/files/api/contracts/get_contract.php.md) | L39 |  |
| [api/contracts/get_contracts.php](/code/files/api/contracts/get_contracts.php.md) | L37 |  |
| [api/contracts/get_dashboard_stats.php](/code/files/api/contracts/get_dashboard_stats.php.md) | L45 |  |
| [api/contracts/get_suppliers.php](/code/files/api/contracts/get_suppliers.php.md) | L22 |  |
| [api/domains/accounts.php](/code/files/api/domains/accounts.php.md) | L20 |  |
| [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md) | domainImportResolveNames L59 |  |
| [api/rfp-builder/get_available_suppliers.php](/code/files/api/rfp-builder/get_available_suppliers.php.md) | L31 |  |
| [api/rfp-builder/get_compare_data.php](/code/files/api/rfp-builder/get_compare_data.php.md) | L67 |  |
| [api/rfp-builder/get_invited_suppliers.php](/code/files/api/rfp-builder/get_invited_suppliers.php.md) | L32 |  |
| [api/rfp-builder/get_rfp.php](/code/files/api/rfp-builder/get_rfp.php.md) | L38 |  |
| [api/rfp-builder/get_rfps.php](/code/files/api/rfp-builder/get_rfps.php.md) | L35 |  |
| [api/rfp-builder/get_scores.php](/code/files/api/rfp-builder/get_scores.php.md) | L40 |  |
| [api/rfp-builder/invite_supplier.php](/code/files/api/rfp-builder/invite_supplier.php.md) | L43 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L3531 |  |
| [api/system/global_search.php](/code/files/api/system/global_search.php.md) | L369, L380 |  |
| [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) | apiAssetSelect L52, apiSuppliersList L679 |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) | apiContractSelect L65, apiSupplierSelect L151, apiContractsList L312 |  |
| [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md) | apiDomainSelect L44, apiDomainSelect L48, apiDomainAccountsList L412 |  |
| [includes/contract_assets.php](/code/files/includes/contract_assets.php.md) | contractsForAsset L109 |  |
| [includes/contract_report.php](/code/files/includes/contract_report.php.md) | contractReportLoad L150 |  |
| [includes/domains/customer.php](/code/files/includes/domains/customer.php.md) | domainCustomerSupplierSearch L69, domainCustomerSupplierSearch L76 |  |
| [includes/domains/read.php](/code/files/includes/domains/read.php.md) | domainListSelect L32, domainListSelect L39, domainApiLookups L190, domainApiLookups L201 |  |
| [includes/leases.php](/code/files/includes/leases.php.md) | leaseSave L199, leaseList L286, leaseGet L327, leaseDueBack L690 |  |
| [includes/people.php](/code/files/includes/people.php.md) | peopleSupplierRows L622, supplierDetail L650, supplierContactDetail L690 |  |
| [includes/projects/ai.php](/code/files/includes/projects/ai.php.md) | projectAiFacts L150, projectAiFacts L282 |  |
| [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) | projectChatRead L231, projectChatTurn L360 |  |
| [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md) | projectCapacity L128 |  |
| [includes/projects/links.php](/code/files/includes/projects/links.php.md) | projectLinkDescribe L194 |  |
| [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md) | projectAlertsOverdueDigest L38 |  |
| [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) | recentTrailLabelsForType L499 |  |
| [includes/record_preview.php](/code/files/includes/record_preview.php.md) | recordPreviewContract L351, recordPreviewDomain L387 |  |
| [includes/services/assets.php](/code/files/includes/services/assets.php.md) | AssetsService::validateField L750, AssetsService::auditDisplay L812 |  |
| [includes/services/domains.php](/code/files/includes/services/domains.php.md) | DomainsService::matchSupplier L839, DomainsService::auditDisplay L900, DomainsService::auditDisplay L905 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::contractorMemberSql L103, ProjectToolsService::contractorMemberSql L110 |  |
| [includes/task_contractors.php](/code/files/includes/task_contractors.php.md) | tasksContractors L57, tasksContractorValidate L99, tasksContractorChoices L109, tasksContractorEmail L137 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolSupplierContact L749 |  |
| [includes/workflow_scheduled.php](/code/files/includes/workflow_scheduled.php.md) | workflowEmitContractExpiries L130 |  |

