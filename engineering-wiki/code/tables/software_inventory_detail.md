# software_inventory_detail

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `host_id` | `INT NOT NULL` |  |
| `app_id` | `INT NOT NULL` |  |
| `display_version` | `VARCHAR(100) NULL` |  |
| `install_date` | `VARCHAR(50) NULL` |  |
| `uninstall_string` | `LONGTEXT NULL` |  |
| `install_location` | `LONGTEXT NULL` |  |
| `estimated_size` | `VARCHAR(100) NULL` |  |
| `system_component` | `TINYINT(1) NOT NULL DEFAULT 0` |  |
| `created_at` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `last_seen` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `source` | `VARCHAR(20) NOT NULL DEFAULT 'agent'` |  |
| `is_demo` | `TINYINT(1) NOT NULL DEFAULT 0` | set by the demo data importer (#1297) |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/external/software-inventory/submit/index.php](/code/files/api/external/software-inventory/submit/index.php.md):356 |  | update | `display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `last_seen` |  |
| [api/external/software-inventory/submit/index.php](/code/files/api/external/software-inventory/submit/index.php.md):381 |  | insert | `host_id`, `app_id`, `display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `created_at`, `last_seen` |  |
| [api/external/software-inventory/submit/index.php](/code/files/api/external/software-inventory/submit/index.php.md):430 |  | delete |  |  |
| [api/external/system-info/submit/index.php](/code/files/api/external/system-info/submit/index.php.md):495 |  | update | `display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `last_seen` |  |
| [api/external/system-info/submit/index.php](/code/files/api/external/system-info/submit/index.php.md):505 |  | insert | `host_id`, `app_id`, `display_version`, `install_date`, `uninstall_string`, `install_location`, `estimated_size`, `system_component`, `created_at`, `last_seen` |  |
| [api/external/system-info/submit/index.php](/code/files/api/external/system-info/submit/index.php.md):520 |  | delete |  |  |
| [includes/intune.php](/code/files/includes/intune.php.md):704 | `intuneUpsertSoftwareForAsset` | delete |  |  |
| [includes/intune.php](/code/files/includes/intune.php.md):718 | `intuneUpsertSoftwareForAsset` | insert | `host_id`, `app_id`, `display_version`, `estimated_size`, `system_component`, `created_at`, `last_seen`, `source` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/get_asset_software.php](/code/files/api/assets/get_asset_software.php.md) | L34 |  |
| [api/external/software-inventory/submit/index.php](/code/files/api/external/software-inventory/submit/index.php.md) | L166, L350 |  |
| [api/external/system-info/submit/index.php](/code/files/api/external/system-info/submit/index.php.md) | L436, L490 |  |
| [api/intune/app_sync_freshness.php](/code/files/api/intune/app_sync_freshness.php.md) | L31 |  |
| [api/intune/list_app_sync_jobs.php](/code/files/api/intune/list_app_sync_jobs.php.md) | L39 |  |
| [api/software/delete_app.php](/code/files/api/software/delete_app.php.md) | L56 |  |
| [api/software/get_app_machines.php](/code/files/api/software/get_app_machines.php.md) | L28 |  |
| [api/software/get_apps.php](/code/files/api/software/get_apps.php.md) | L46 |  |
| [api/software/get_software_drilldown.php](/code/files/api/software/get_software_drilldown.php.md) | L33, L46, L59 |  |
| [api/software/get_software_widget_data.php](/code/files/api/software/get_software_widget_data.php.md) | L51, L68, L87 |  |
| [api/v1/resources/assets.php](/code/files/api/v1/resources/assets.php.md) | apiAssetSoftwareList L608 |  |
| [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md) | apiSoftwareAppsList L78, apiSoftwareAppsList L88, apiSoftwareInstallCount L132, apiSoftwareAppMachinesList L194, apiSoftwareLicenceSelect L221 |  |
| [includes/intune.php](/code/files/includes/intune.php.md) | intuneGetAppSyncCandidates L604 |  |
| [includes/report_packs/blocks_software.php](/code/files/includes/report_packs/blocks_software.php.md) | rpSoftwareByPublisher L27, rpSoftwareTopApps L42, rpSoftwareKpis L65 |  |

