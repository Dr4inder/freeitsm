# lease_schedules

A group of kit on one agreement with its own dates and cost.

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `lease_id` | `INT NOT NULL` |  |
| `name` | `VARCHAR(200) NULL` |  |
| `reference` | `VARCHAR(100) NULL` |  |
| `start_date` | `DATE NULL` |  |
| `end_date` | `DATE NULL` |  |
| `cost` | `DECIMAL(18,2) NULL` |  |
| `cost_period` | `VARCHAR(10) NOT NULL DEFAULT 'month'` |  |
| `currency` | `VARCHAR(3) NULL` |  |
| `order_number` | `VARCHAR(100) NULL` |  |
| `notes` | `TEXT NULL` |  |
| `display_order` | `INT NOT NULL DEFAULT 0` |  |
| `created_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [includes/leases.php](/code/files/includes/leases.php.md):254 | `leaseSave` | insert | `lease_id`, `name`, `display_order` |  |
| [includes/leases.php](/code/files/includes/leases.php.md):436 | `leaseScheduleSave` | update | `name`, `reference`, `start_date`, `end_date`, `cost`, `cost_period`, `currency`, `order_number`, `notes` |  |
| [includes/leases.php](/code/files/includes/leases.php.md):451 | `leaseScheduleSave` | insert | `lease_id`, `name`, `reference`, `start_date`, `end_date`, `cost`, `cost_period`, `currency`, `order_number`, `notes` |  |
| [includes/leases.php](/code/files/includes/leases.php.md):468 | `leaseScheduleDelete` | delete |  |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/leases/asset_search.php](/code/files/api/assets/leases/asset_search.php.md) | L22 |  |
| [includes/leases.php](/code/files/includes/leases.php.md) | leaseLoadSchedule L91, leaseSave L185, leaseList L286, leaseGet L348, leaseScheduleSave L444, leaseScheduleSave L447 ... |  |
| [includes/services/assets.php](/code/files/includes/services/assets.php.md) | AssetsService::moveToCompany L642 |  |

