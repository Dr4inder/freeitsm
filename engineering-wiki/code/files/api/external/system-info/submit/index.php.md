# api/external/system-info/submit/index.php

> API endpoint - 563 lines

External API: System Info / Asset Inventory Ingest

Accepts a JSON POST with full hardware inventory from the PowerShell
collection script and upserts the asset record plus related tables
(disks, network adapters, software inventory).

Auth: Authorization header with API key (validated against apikeys table).

## The endpoint

| | |
|---|---|
| URL | `api/external/system-info/submit/index.php` |
| Protected by | Signed-in analyst (session check) (via includes/service_context.php); Signed-in analyst (session check) (via includes/notifications_router.php) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [strOrNull()](/code/functions/strOrNull.md) | 102 |  |
| [intOrNull()](/code/functions/intOrNull.md) | 111 |  |
| [reportHas()](/code/functions/reportHas.md) | 270 | Is there anything in this part of the report? |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 51 |  | read [apikeys](/code/tables/apikeys.md) |  |
| 55 |  | read [apikeys](/code/tables/apikeys.md) |  |
| 170 |  | **update** [assets](/code/tables/assets.md) (`manufacturer`, `model`, `memory`, `service_tag`, `operating_system`, `feature_release`, `build_number`, `cpu_name`, `speed`, `bios_version`, `last_seen`, `domain`) |  |
| 280 |  | **delete** [asset_disks](/code/tables/asset_disks.md) |  |
| 281 |  | **insert** [asset_disks](/code/tables/asset_disks.md) (`asset_id`, `drive`, `label`, `file_system`, `size_bytes`, `free_bytes`, `used_percent`, `source`) |  |
| 328 |  | **delete** [asset_physical_disks](/code/tables/asset_physical_disks.md) |  |
| 329 |  | **insert** [asset_physical_disks](/code/tables/asset_physical_disks.md) (`asset_id`, `model`, `serial`, `size_bytes`, `media_type`, `interface_type`) |  |
| 373 |  | **delete** [asset_network_adapters](/code/tables/asset_network_adapters.md) |  |
| 374 |  | **insert** [asset_network_adapters](/code/tables/asset_network_adapters.md) (`asset_id`, `name`, `mac_address`, `ip_address`, `subnet_mask`, `gateway`, `dhcp_enabled`) |  |
| 436 |  | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 464 |  | read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 474 |  | **insert** [software_inventory_apps](/code/tables/software_inventory_apps.md) (`display_name`, `publisher`) |  |
| 490 |  | read [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |
| 495 |  | **update** [software_inventory_detail](/code/tables/software_inventory_detail.md) (`display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `last_seen`) |  |
| 505 |  | **insert** [software_inventory_detail](/code/tables/software_inventory_detail.md) (`host_id`, `app_id`, `display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `created_at`, `last_seen`, `source`) |  |
| 520 |  | **delete** [software_inventory_detail](/code/tables/software_inventory_detail.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md)

