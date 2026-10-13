# cost_centres

Cost centres (GH #160, stage 1). Always one company's (tenant_id NOT NULL); the code is TEXT so "0010" stays "0010", unique per company ignoring case.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `tenant_id` | `INT NOT NULL` |  |
| `code` | `VARCHAR(50) NOT NULL` |  |
| `name` | `VARCHAR(150) NOT NULL` |  |
| `description` | `VARCHAR(500) NULL` |  |
| `parent_id` | `INT NULL` |  |
| `is_active` | `TINYINT(1) NOT NULL DEFAULT 1` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):146 | `CostCentresService::create` | insert | `tenant_id`, `code`, `name`, `description`, `parent_id`, `is_active` |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):176 | `CostCentresService::update` | update |  |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):203 | `CostCentresService::delete` | delete |  |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):362 | `CostCentresService::sync` | insert | `tenant_id`, `code`, `name`, `description`, `is_active` |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):370 | `CostCentresService::sync` | update |  |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):377 | `CostCentresService::sync` | update | `parent_id` |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md):384 | `CostCentresService::sync` | update | `is_active` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/get_assets.php](/code/files/api/assets/get_assets.php.md) | L72 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L1689 |  |
| [api/tickets/save_user.php](/code/files/api/tickets/save_user.php.md) | L155 |  |
| [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) | apiAssetSelect L44 |  |
| [api/v1/resources/contracts.php](/code/files/api/v1/resources/contracts.php.md) | apiContractSelect L58 |  |
| [api/v1/resources/cost_centres.php](/code/files/api/v1/resources/cost_centres.php.md) | apiCostCentreSelect L29, apiCostCentresList L125 |  |
| [api/v1/resources/users.php](/code/files/api/v1/resources/users.php.md) | apiUserColumns L17, apiUsersUpdate L286 |  |
| [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md) | costCentreOptions L50, costCentreCheck L72, costCentreByCode L90, costCentreRef L100, costCentreSelectSql L113 |  |
| [includes/projects/budget.php](/code/files/includes/projects/budget.php.md) | projectBudgetDetail L399, projectBudgetCostCentres L471 |  |
| [includes/services/contracts.php](/code/files/includes/services/contracts.php.md) | ContractsService::costCentreFor L359 |  |
| [includes/services/cost_centres.php](/code/files/includes/services/cost_centres.php.md) | CostCentresService::ready L52, CostCentresService::listForCompany L98, CostCentresService::load L113, CostCentresService::assertCodeFree L446, CostCentresService::resolveParentInput L461, CostCentresService::resolveParentInput L466 ... |  |

