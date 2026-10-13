# contacts

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `supplier_id` | `INT NULL` |  |
| `first_name` | `VARCHAR(100) NOT NULL` |  |
| `surname` | `VARCHAR(100) NOT NULL` |  |
| `email` | `VARCHAR(255) NULL` |  |
| `mobile` | `VARCHAR(50) NULL` |  |
| `job_title` | `VARCHAR(100) NULL` |  |
| `direct_dial` | `VARCHAR(50) NULL` |  |
| `switchboard` | `VARCHAR(50) NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/contracts/delete_contact.php](/code/files/api/contracts/delete_contact.php.md):25 |  | delete |  |  |
| [api/contracts/save_contact.php](/code/files/api/contracts/save_contact.php.md):35 |  | update | `supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active` |  |
| [api/contracts/save_contact.php](/code/files/api/contracts/save_contact.php.md):39 |  | insert | `supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active` |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md):469 | `apiSupplierContactsCreate` | insert | `supplier_id`, `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active`, `created_datetime` |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md):504 | `apiSupplierContactsUpdate` | update | `first_name`, `surname`, `email`, `mobile`, `job_title`, `direct_dial`, `switchboard`, `is_active` |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md):517 | `apiSupplierContactsDelete` | delete |  |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md):222 | `ContractsService::deleteSupplier` | update | `supplier_id` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/contracts/delete_contact.php](/code/files/api/contracts/delete_contact.php.md) | L24 |  |
| [api/contracts/get_contacts.php](/code/files/api/contracts/get_contacts.php.md) | L18 |  |
| [api/contracts/get_dashboard_stats.php](/code/files/api/contracts/get_dashboard_stats.php.md) | L37 |  |
| [api/system/global_search.php](/code/files/api/system/global_search.php.md) | L380 |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) | apiSupplierSelect L140, apiSuppliersGet L400, apiSupplierContactsList L450, apiSupplierContactsCreate L477, apiSupplierContactsUpdate L485, apiSupplierContactsUpdate L509 |  |
| [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md) | apiDomainSelect L40, apiDomainSelect L44 |  |
| [includes/domains/customer.php](/code/files/includes/domains/customer.php.md) | domainCustomerSupplierSearch L76 |  |
| [includes/domains/read.php](/code/files/includes/domains/read.php.md) | domainListSelect L32, domainListSelect L39, domainApiLookups L201 |  |
| [includes/people.php](/code/files/includes/people.php.md) | peopleSupplierRows L613, peopleSupplierRows L619, supplierDetail L666, supplierContactDetail L687, peopleContractorTasks L729, peopleSupplierDomains L817 |  |
| [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md) | projectChatTurn L363 |  |
| [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) | recentTrailLabelsForType L504 |  |
| [includes/services/domains.php](/code/files/includes/services/domains.php.md) | DomainsService::normaliseParties L747, DomainsService::normaliseParties L762, DomainsService::auditDisplay L867, DomainsService::auditDisplay L870 |  |
| [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) | ProjectToolsService::contractorMemberSql L110 |  |
| [includes/task_contractors.php](/code/files/includes/task_contractors.php.md) | tasksContractors L55, tasksContractorValidate L88, tasksContractorChoices L108, tasksContractorEmail L135 |  |
| [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) | warbotToolSupplierContact L749 |  |

