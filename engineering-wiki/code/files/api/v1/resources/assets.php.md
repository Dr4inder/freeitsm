# api/v1/resources/assets.php

> API endpoint - 652 lines

FreeITSM REST API v1 — assets resource.

Mirrors the Assets module's behaviour so an asset touched via the API is
indistinguishable from one touched in the UI or by the inventory agent:
  - field updates write asset_history rows with the SAME stable field keys
    the UI uses (update_asset_field.php), and display NAMES for lookups
  - assignment/unassignment mirror assign_asset_user.php /
    unassign_asset_user.php (users_assets + custody log + audit)
  - a warranty_expiry change re-syncs the calendar's warranty events

Notes on scope and identity:
  - Assets ARE company-scoped (assets.tenant_id, Phase 3): the key's company
    scope restricts every list + by-id read/write (apiKeyTenantFilter on the
    list, apiKeyCanAccessTenantRow via apiLoadAsset). An asset outside scope is
    a 404; NULL tenant_id normalises to the Default company. Invisible at N=1.
  - There is deliberately NO delete endpoint: nothing in the product
    deletes assets (they are agent-maintained records).
  - hostname is the de-facto identity every ingest path upserts on, and is now
    unique PER COMPANY, so a duplicate hostname within a company is a 409.

The WRITES (create / field update / assign / unassign) are delegated to
AssetsService — the same rules the UI's api/assets/*.php endpoints now call.
The reads, serialisers, list filters, and reference lookups below are API-only
and stay here.

## The endpoint

| | |
|---|---|
| URL | `api/v1/resources/assets.php` |
| Protected by | REST API key |
| Reads | `GET hostname`, `GET service_tag`, `GET q`, `GET assigned_user_id`, `GET unassigned`, `GET warranty_within_days`, `GET warranty_expired`, `GET not_seen_days`, `GET sort`, `GET company_id`, `GET include_components` |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [apiAssetSelect()](/code/functions/apiAssetSelect.md) | 37 |  |
| [apiAssetLocations()](/code/functions/apiAssetLocations.md) | 63 | All locations keyed by id — used to build full "UK › London › Office 1" paths. |
| [apiAssetLocationPath()](/code/functions/apiAssetLocationPath.md) | 74 |  |
| [apiSerializeAsset()](/code/functions/apiSerializeAsset.md) | 89 |  |
| [apiAssetCustomFields()](/code/functions/apiAssetCustomFields.md) | 169 | Custom field values for one asset, as { field_key: value }. |
| [apiLoadAsset()](/code/functions/apiLoadAsset.md) | 190 | Load one asset (with joins); 404 if unknown OR outside the key's companies (multi-tenancy — the key's company scope gates every by-id read/write; a NULL tenant_id normalises to the Default company; no-op at N=1 / all-access key). |
| [apiParseDateOnly()](/code/functions/apiParseDateOnly.md) | 205 | Validate a DATE field (YYYY-MM-DD); 422 naming the field on garbage. Null/'' clears. Kept here (not in AssetsService) because contracts.php + tasks.php share it as a generic API date-parameter validator. |
| [apiAssetsList()](/code/functions/apiAssetsList.md) | 223 | GET /assets |
| [apiAssetsGet()](/code/functions/apiAssetsGet.md) | 323 | GET /assets/{id} |
| [apiAssetsCreate()](/code/functions/apiAssetsCreate.md) | 360 | POST /assets |
| [apiAssetsUpdate()](/code/functions/apiAssetsUpdate.md) | 385 | PATCH /assets/{id} |
| [apiAssetAssignmentsList()](/code/functions/apiAssetAssignmentsList.md) | 395 | Assignments — POST/GET /assets/{id}/assignments, DELETE .../{user_id} |
| [apiAssetAssignmentsCreate()](/code/functions/apiAssetAssignmentsCreate.md) | 419 |  |
| [apiAssetAssignmentsDelete()](/code/functions/apiAssetAssignmentsDelete.md) | 426 |  |
| [apiAssetHistoryList()](/code/functions/apiAssetHistoryList.md) | 436 | GET /assets/{id}/history + /custody |
| [apiAssetCustodyList()](/code/functions/apiAssetCustodyList.md) | 457 |  |
| [apiAssetDisksList()](/code/functions/apiAssetDisksList.md) | 483 | Inventory reads — disks, network adapters, devices, software |
| [apiAssetPhysicalDisksList()](/code/functions/apiAssetPhysicalDisksList.md) | 516 | The physical drives, as opposed to the lettered volumes above (#97). |
| [apiAssetNetworkAdaptersList()](/code/functions/apiAssetNetworkAdaptersList.md) | 540 |  |
| [apiAssetDevicesList()](/code/functions/apiAssetDevicesList.md) | 560 |  |
| [apiAssetSoftwareList()](/code/functions/apiAssetSoftwareList.md) | 580 |  |
| [apiAssetTypesList()](/code/functions/apiAssetTypesList.md) | 613 | Reference lookups The reference lists resolve for the key's default company (globals + that company's own; every row at N=1). Suppliers stay a shared registry. |
| [apiAssetStatusesList()](/code/functions/apiAssetStatusesList.md) | 621 |  |
| [apiAssetLocationsList()](/code/functions/apiAssetLocationsList.md) | 629 |  |
| [apiSuppliersList()](/code/functions/apiSuppliersList.md) | 643 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 44 | `apiAssetSelect` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 47 | `apiAssetSelect` | read [users_assets](/code/tables/users_assets.md), read [assets](/code/tables/assets.md), read [asset_types](/code/tables/asset_types.md), read [asset_status_types](/code/tables/asset_status_types.md), read [asset_locations](/code/tables/asset_locations.md), read [tenants](/code/tables/tenants.md), read [suppliers](/code/tables/suppliers.md) |  |
| 67 | `apiAssetLocations` | read [asset_locations](/code/tables/asset_locations.md) |  |
| 253 | `apiAssetsList` | read [users_assets](/code/tables/users_assets.md) |  |
| 257 | `apiAssetsList` | read [users_assets](/code/tables/users_assets.md) |  |
| 302 | `apiAssetsList` | read [assets](/code/tables/assets.md) |  |
| 332 | `apiAssetsGet` | read [users_assets](/code/tables/users_assets.md), read [users](/code/tables/users.md), read [analysts](/code/tables/analysts.md) |  |
| 398 | `apiAssetAssignmentsList` | read [users_assets](/code/tables/users_assets.md), read [users](/code/tables/users.md), read [analysts](/code/tables/analysts.md) |  |
| 439 | `apiAssetHistoryList` | read [asset_history](/code/tables/asset_history.md), read [analysts](/code/tables/analysts.md) |  |
| 460 | `apiAssetCustodyList` | read [asset_checkout_log](/code/tables/asset_checkout_log.md), read [analysts](/code/tables/analysts.md) |  |
| 486 | `apiAssetDisksList` | read [asset_disks](/code/tables/asset_disks.md) |  |
| 520 | `apiAssetPhysicalDisksList` | read [asset_physical_disks](/code/tables/asset_physical_disks.md) |  |
| 543 | `apiAssetNetworkAdaptersList` | read [asset_network_adapters](/code/tables/asset_network_adapters.md) |  |
| 563 | `apiAssetDevicesList` | read [asset_devices](/code/tables/asset_devices.md) |  |
| 583 | `apiAssetSoftwareList` | read [software_inventory_detail](/code/tables/software_inventory_detail.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 645 | `apiSuppliersList` | read [suppliers](/code/tables/suppliers.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), [includes/services/asset_fields.php](/code/files/includes/services/asset_fields.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [costCentreReady()](/code/functions/costCentreReady.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [getTenantConfigRows()](/code/functions/getTenantConfigRows.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

