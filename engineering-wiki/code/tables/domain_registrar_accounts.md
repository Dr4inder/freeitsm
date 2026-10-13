# domain_registrar_accounts

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `tenant_id` | `INT NULL` |  |
| `supplier_id` | `INT NULL` |  |
| `account_name` | `VARCHAR(150) NOT NULL` |  |
| `account_reference` | `VARCHAR(150) NULL` |  |
| `login_url` | `VARCHAR(500) NULL` |  |
| `owner_analyst_id` | `INT NULL` |  |
| `two_factor_holder` | `VARCHAR(255) NULL` |  |
| `notes` | `TEXT NULL` |  |
| `created_by` | `INT NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/domains.php](/code/files/includes/services/domains.php.md):546 | `DomainsService::saveRegistrarAccount` | update | `supplier_id`, `account_name`, `account_reference`, `login_url`, `owner_analyst_id`, `two_factor_holder`, `notes` |  |
| [includes/services/domains.php](/code/files/includes/services/domains.php.md):554 | `DomainsService::saveRegistrarAccount` | insert | `supplier_id`, `account_name`, `account_reference`, `login_url`, `owner_analyst_id`, `two_factor_holder`, `notes`, `tenant_id`, `created_by`, `created_datetime` |  |
| [includes/services/domains.php](/code/files/includes/services/domains.php.md):564 | `DomainsService::deleteRegistrarAccount` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/domains/accounts.php](/code/files/api/domains/accounts.php.md) | L20 |  |
| [api/v1/resources/domains.php](/code/files/api/v1/resources/domains.php.md) | apiDomainSelect L44, apiDomainAccountsList L395 |  |
| [includes/domains/read.php](/code/files/includes/domains/read.php.md) | domainListSelect L39, domainApiLookups L185 |  |
| [includes/services/domains.php](/code/files/includes/services/domains.php.md) | DomainsService::loadAccountForActor L590, DomainsService::validateField L634, DomainsService::auditDisplay L865 |  |

