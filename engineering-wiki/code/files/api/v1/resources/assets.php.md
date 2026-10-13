# api/v1/resources/assets.php

> API endpoint - 686 lines

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
| [apiAssetSelect()](/code/functions/apiAssetSelect.md) | 42 | The SELECT for assets, with type, status, location, company and supplier names, how many people it is assigned to and, once Database Verification has added the column, its cost centre. |
| [apiAssetLocations()](/code/functions/apiAssetLocations.md) | 68 | All locations keyed by id — used to build full "UK › London › Office 1" paths. |
| [apiAssetLocationPath()](/code/functions/apiAssetLocationPath.md) | 80 | The full path of a location, top level first, or null when there is no location. |
| [apiSerializeAsset()](/code/functions/apiSerializeAsset.md) | 99 | Shapes an asset row for the API - identity, company, type, status, location with its path, hardware, operating system and the rest of the record. |
| [apiAssetCustomFields()](/code/functions/apiAssetCustomFields.md) | 179 | Custom field values for one asset, as { field_key: value }. |
| [apiLoadAsset()](/code/functions/apiLoadAsset.md) | 200 | Load one asset (with joins); 404 if unknown OR outside the key's companies (multi-tenancy — the key's company scope gates every by-id read/write; a NULL tenant_id normalises to the Default company; no-op at N=1 / all-access key). |
| [apiParseDateOnly()](/code/functions/apiParseDateOnly.md) | 215 | Validate a DATE field (YYYY-MM-DD); 422 naming the field on garbage. Null/'' clears. Kept here (not in AssetsService) because contracts.php + tasks.php share it as a generic API date-parameter validator. |
| [apiAssetsList()](/code/functions/apiAssetsList.md) | 233 | GET /assets |
| [apiAssetsGet()](/code/functions/apiAssetsGet.md) | 333 | GET /assets/{id} |
| [apiAssetsCreate()](/code/functions/apiAssetsCreate.md) | 370 | POST /assets |
| [apiAssetsUpdate()](/code/functions/apiAssetsUpdate.md) | 395 | PATCH /assets/{id} |
| [apiAssetAssignmentsList()](/code/functions/apiAssetAssignmentsList.md) | 405 | Assignments — POST/GET /assets/{id}/assignments, DELETE .../{user_id} |
| [apiAssetAssignmentsCreate()](/code/functions/apiAssetAssignmentsCreate.md) | 430 | POST /assets/{id}/assignments - assigns a person to the asset through AssetsService. |
| [apiAssetAssignmentsDelete()](/code/functions/apiAssetAssignmentsDelete.md) | 438 | DELETE /assets/{id}/assignments/{userId} - removes a person from the asset through AssetsService. |
| [apiAssetHistoryList()](/code/functions/apiAssetHistoryList.md) | 448 | GET /assets/{id}/history + /custody |
| [apiAssetCustodyList()](/code/functions/apiAssetCustodyList.md) | 470 | GET /assets/{id}/custody - the asset's check-out and check-in history, newest first. |
| [apiAssetDisksList()](/code/functions/apiAssetDisksList.md) | 496 | Inventory reads — disks, network adapters, devices, software |
| [apiAssetPhysicalDisksList()](/code/functions/apiAssetPhysicalDisksList.md) | 529 | The physical drives, as opposed to the lettered volumes above (#97). |
| [apiAssetNetworkAdaptersList()](/code/functions/apiAssetNetworkAdaptersList.md) | 557 | GET /assets/{id}/network-adapters - the network adapters the inventory agent reported for the asset. |
| [apiAssetDevicesList()](/code/functions/apiAssetDevicesList.md) | 581 | GET /assets/{id}/devices - the hardware devices and drivers the inventory agent reported for the asset. |
| [apiAssetSoftwareList()](/code/functions/apiAssetSoftwareList.md) | 605 | GET /assets/{id}/software - the software installed on the asset, by name. System components are left out unless ?include_components=true. |
| [apiAssetTypesList()](/code/functions/apiAssetTypesList.md) | 638 | Reference lookups The reference lists resolve for the key's default company (globals + that company's own; every row at N=1). Suppliers stay a shared registry. |
| [apiAssetStatusesList()](/code/functions/apiAssetStatusesList.md) | 647 | GET /asset-statuses - the asset statuses for the key's default company. |
| [apiAssetLocationsList()](/code/functions/apiAssetLocationsList.md) | 659 | GET /asset-locations - the asset locations for the key's default company, top level first, each with its full path. |
| [apiSuppliersList()](/code/functions/apiSuppliersList.md) | 677 | GET /suppliers - every supplier's id, display name (trading name, else legal name) and whether it supplies assets. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 49 | `apiAssetSelect` | read [cost_centres](/code/tables/cost_centres.md) |  |
| 52 | `apiAssetSelect` | read [users_assets](/code/tables/users_assets.md), read [assets](/code/tables/assets.md), read [asset_types](/code/tables/asset_types.md), read [asset_status_types](/code/tables/asset_status_types.md), read [asset_locations](/code/tables/asset_locations.md), read [tenants](/code/tables/tenants.md), read [suppliers](/code/tables/suppliers.md) |  |
| 72 | `apiAssetLocations` | read [asset_locations](/code/tables/asset_locations.md) |  |
| 263 | `apiAssetsList` | read [users_assets](/code/tables/users_assets.md) |  |
| 267 | `apiAssetsList` | read [users_assets](/code/tables/users_assets.md) |  |
| 312 | `apiAssetsList` | read [assets](/code/tables/assets.md) |  |
| 342 | `apiAssetsGet` | read [users_assets](/code/tables/users_assets.md), read [users](/code/tables/users.md), read [analysts](/code/tables/analysts.md) |  |
| 408 | `apiAssetAssignmentsList` | read [users_assets](/code/tables/users_assets.md), read [users](/code/tables/users.md), read [analysts](/code/tables/analysts.md) |  |
| 451 | `apiAssetHistoryList` | read [asset_history](/code/tables/asset_history.md), read [analysts](/code/tables/analysts.md) |  |
| 473 | `apiAssetCustodyList` | read [asset_checkout_log](/code/tables/asset_checkout_log.md), read [analysts](/code/tables/analysts.md) |  |
| 499 | `apiAssetDisksList` | read [asset_disks](/code/tables/asset_disks.md) |  |
| 533 | `apiAssetPhysicalDisksList` | read [asset_physical_disks](/code/tables/asset_physical_disks.md) |  |
| 560 | `apiAssetNetworkAdaptersList` | read [asset_network_adapters](/code/tables/asset_network_adapters.md) |  |
| 584 | `apiAssetDevicesList` | read [asset_devices](/code/tables/asset_devices.md) |  |
| 608 | `apiAssetSoftwareList` | read [software_inventory_detail](/code/tables/software_inventory_detail.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |
| 679 | `apiSuppliersList` | read [suppliers](/code/tables/suppliers.md) |  |

## How it hangs together

**Includes:** [includes/service_context.php](/code/files/includes/service_context.php.md), [includes/services/assets.php](/code/files/includes/services/assets.php.md), [includes/timezone.php](/code/files/includes/timezone.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), [includes/services/asset_fields.php](/code/files/includes/services/asset_fields.php.md)

**Included by:** [api/v1/index.php](/code/files/api/v1/index.php.md)

**Calls:** [apiError()](/code/functions/apiError.md), [apiFailFromService()](/code/functions/apiFailFromService.md), [apiIsoDate()](/code/functions/apiIsoDate.md), [apiKeyCanAccessTenant()](/code/functions/apiKeyCanAccessTenant.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md), [apiKeyDefaultTenantId()](/code/functions/apiKeyDefaultTenantId.md), [apiKeyTenantFilter()](/code/functions/apiKeyTenantFilter.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [costCentreReady()](/code/functions/costCentreReady.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [getTenantConfigRows()](/code/functions/getTenantConfigRows.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

