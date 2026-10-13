# leases

The agreement. Scoped data like assets: NULL tenant = the Default company.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `tenant_id` | `INT NULL` |  |
| `name` | `VARCHAR(200) NOT NULL` |  |
| `reference` | `VARCHAR(100) NULL` |  |
| `supplier_id` | `INT NULL` |  |
| `cost_centre_id` | `INT NULL` |  |
| `contract_id` | `INT NULL` |  |
| `notice_days` | `INT NULL` |  |
| `notes` | `TEXT NULL` |  |
| `created_by` | `INT NULL` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/leases.php](/code/files/includes/leases.php.md):243 | `leaseSave` | update | `tenant_id`, `name`, `reference`, `supplier_id`, `cost_centre_id`, `contract_id`, `notice_days`, `notes`, `updated_datetime` |  |
| [includes/leases.php](/code/files/includes/leases.php.md):249 | `leaseSave` | insert | `tenant_id`, `name`, `reference`, `supplier_id`, `cost_centre_id`, `contract_id`, `notice_days`, `notes`, `created_by`, `created_datetime` |  |
| [includes/leases.php](/code/files/includes/leases.php.md):266 | `leaseDelete` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/leases/asset_search.php](/code/files/api/assets/leases/asset_search.php.md) | L22 |  |
| [includes/leases.php](/code/files/includes/leases.php.md) | leaseCanView L66, leaseLoad L75, leaseList L286, leaseAssetsAdd L501, leaseHistoryForAsset L662, leaseDueBack L690 ... |  |
| [includes/services/assets.php](/code/files/includes/services/assets.php.md) | AssetsService::moveToCompany L642 |  |

