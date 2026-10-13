# api/external/software-inventory/submit/index.php

> API endpoint - 454 lines

## The endpoint

| | |
|---|---|
| URL | `api/external/software-inventory/submit/index.php` |
| Protected by | Signed-in analyst (session check) (via includes/service_context.php); Signed-in analyst (session check) (via includes/notifications_router.php) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [logApiResponse()](/code/functions/logApiResponse.md) | 105 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 45 |  | read [apikeys](/code/tables/apikeys.md) |  |
| 49 |  | read [apikeys](/code/tables/apikeys.md) |  |
| 107 | `logApiResponse` | **insert** [software_inventory_log](/code/tables/software_inventory_log.md) (`host_id`, `api_response`) |  |
| 132 |  | **update** [assets](/code/tables/assets.md) (`last_seen`) |  |
| 151 |  | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 217 |  | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 270 |  | **update** [software_inventory_apps](/code/tables/software_inventory_apps.md) (`display_name`, `publisher`) |  |
| 277 |  | **insert** [software_inventory_apps](/code/tables/software_inventory_apps.md) (`display_name`, `publisher`) |  |
| 281 |  | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 335 |  | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 341 |  | **update** [software_inventory_detail](/code/tables/software_inventory_detail.md) (`display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `last_seen`) |  |
| 366 |  | **insert** [software_inventory_detail](/code/tables/software_inventory_detail.md) (`host_id`, `app_id`, `display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `created_at`, `last_seen`) |  |
| 415 |  | **delete** [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md)

